<?php
/*
  +------------------------------------------------------------------------+
  | DragonPHP Website                                                      |
  +------------------------------------------------------------------------+
  | Copyright (c) 2016-2017 DragonPHP Team (https://www.qaytmaydi.com)      |
  +------------------------------------------------------------------------+
  | This source file is subject to the New BSD License that is bundled     |
  | with this package in the file LICENSE.txt.                             |
  |                                                                        |
  | If you did not receive a copy of the license and are unable to         |
  | obtain it through the world-wide-web, please send an email             |
  | to license@qaytmaydi.com so we can send you a copy immediately.       |
  +------------------------------------------------------------------------+
  | Authors: Frank Kennedy Yuan <kideny@gmail.com>                     |
  +------------------------------------------------------------------------+
*/

namespace DragonPHP\Backend\Library\Auth;

use DragonPHP\Backend\Models\Users;
use Phalcon\Mvc\User\Component;
use DragonPHP\Backend\Models\SuccessLogins;
use DragonPHP\Backend\Models\RememberTokens;
use Phalcon\Logger;
use Phalcon\Logger\Adapter\File as FileAdapter;

class Auth extends Component
{
    /**
     * Checks the user credentials
     *
     * @param array $credentials
     * @return boolean
     * @throws Exception
     */
    public function check($credentials)
    {

        $user = Users::findFirst(
            [
                "loginName" => $credentials['loginName']     // Check if the user exist
            ]
        );

        /*
        $logger = new FileAdapter(BASE_PATH . '/logs/test.log');

        $logger->log($credentials['loginName'] ,Logger::INFO);
        $logger->log($credentials['password'] ,Logger::INFO);
        $logger->log($credentials['remember'] ,Logger::INFO);
        $logger->log("This is another error message" ,Logger::INFO);

        */


        //print_r($user);

        if ($user == false) {

            $this->registerUserThrottling(0);

            throw new Exception('Wrong email/password combination');

        }

        if (!$this->security->checkHash($credentials['password'], $user->password)) {   // Check the password

            $this->registerUserThrottling($user->id);

            throw new Exception('Wrong email/password combination');

        }

        //$this->checkUserFlags($user);          // Check if the user was flagged

        $this->saveSuccessLogin($user);             // Register the successful login

        if (isset($credentials['remember'])) {      // Check if the remember me was selected

            $this->createRememberEnvironment($user);
        }

        $this->session->set('auth-identity', [
            'id' => $user->id,
            'loginName' => $user->loginName,
            'firstName' => $user->firstName,
            'lastName' => $user->lastName,
        ]);
    }

    /**
     * Creates the remember me environment settings the related cookies and generating tokens
     *
     * @param \DragonPHP\Backend\Models\Users $user
     * @throws Exception
     */
    public function saveSuccessLogin($user)
    {
        $successLogin = new SuccessLogins();

        $successLogin->usersId = $user->id;

        $successLogin->ipAddress = $this->request->getClientAddress();

        $successLogin->userAgent = $this->request->getUserAgent();

        $successLogin->createdAt = date('Y-m-d H:i:s');

        if (!$successLogin->save()) {

            $messages = $successLogin->getMessages();

            throw new Exception($messages[0]);

        }
    }

    /**
     * Implements login throttling
     * Reduces the effectiveness of brute force attacks
     *
     * @param int $userId
     */
    public function registerUserThrottling($userId)
    {
        $failedLogin = new FailedLogins();

        $failedLogin->usersId = $userId;

        $failedLogin->ipAddress = $this->request->getClientAddress();

        $failedLogin->attempted = date('Y-m-d H:i:s');

        $failedLogin->save();

        $attempts = FailedLogins::count(
            [
                'ipAddress = ?0 AND attempted >= ?1',
                'bind' => [
                    $this->request->getClientAddress(),
                    time() - 3600 * 6
                ]
            ]
        );
        switch ($attempts) {
            case 1:
            case 2:
                break;      // no delay
            case 3:
            case 4:
                sleep(2);
                break;
            default:
                sleep(4);
                break;
        }
    }

    /**
     * Creates the remember me environment settings the related cookies and generating tokens
     *
     * @param \DragonPHP\Backend\Models\Users $user
     */
    public function createRememberEnvironment(Users $user)
    {
        $userAgent = $this->request->getUserAgent();

        $token = md5($user->loginName . $user->password . $userAgent);

        $remember = new RememberTokens();

        $remember->usersId = $user->id;

        $remember->token = $token;

        $remember->userAgent = $userAgent;

        if ($remember->save() != false) {

            $expire = time() + 86400 * 8;

            $this->cookies->set('RMU', $user->id, $expire);

            $this->cookies->set('RMT', $token, $expire);

        }
    }

    /**
     * Check if the session has a remember me cookie
     *
     * @return boolean
     */
    public function hasRememberMe()
    {
        return $this->cookies->has('RMU');
    }

    /**
     * Logs on using the information in the cookies
     *
     * @return \Phalcon\Http\Response
     */
    public function loginWithRememberMe()
    {
        $userId = $this->cookies->get('RMU')->getValue();

        $cookieToken = $this->cookies->get('RMT')->getValue();

        $user = Users::findFirstById($userId);

        if ($user) {

            $userAgent = $this->request->getUserAgent();

            $token = md5($user->email . $user->password . $userAgent);

            if ($cookieToken == $token) {

                $remember = RememberTokens::findFirst([
                    'usersId = ?0 AND token = ?1',
                    'bind' => [
                        $user->id,
                        $token
                    ]
                ]);

                if ($remember) {    // Check if the cookie has not expired

                    if ((time() - (86400 * 8)) < $remember->createdAt) {

                        $this->checkUserFlags($user);       // Check if the user was flagged

                        $this->session->set('auth-identity', [  // Register identity
                            'id' => $user->id,
                            'loginName' => $user->loginName,
                            'firstName' => $user->firstName,
                            'lastName' => $user->lastName,
                        ]);

                        $this->saveSuccessLogin($user);     // Register the successful login

                        return $this->response->redirect('users');
                    }
                }
            }
        }

        $this->cookies->get('RMU')->delete();

        $this->cookies->get('RMT')->delete();

        return $this->response->redirect('session/login');
    }

    /**
     * Checks if the user is banned/inactive/suspended
     *
     * @param \DragonPHP\Backend\Models\Users $user
     * @throws Exception
     */
    public function checkUserFlags(Users $user)
    {
        if ($user->active != 'Y') {
            throw new Exception('The user is inactive');
        }

        if ($user->banned != 'N') {
            throw new Exception('The user is banned');
        }

        if ($user->suspended != 'N') {
            throw new Exception('The user is suspended');
        }
    }

    /**
     * Returns the current identity
     *
     * @return array
     */
    public function getIdentity()
    {
        return $this->session->get('auth-identity');
    }

    /**
     * Returns the current identity
     *
     * @return string
     */
    public function getName()
    {
        $identity = $this->session->get('auth-identity');

        return $identity['loginName'];
    }

    /**
     * Removes the user identity information from session
     */
    public function remove()
    {
        if ($this->cookies->has('RMU')) {
            $this->cookies->get('RMU')->delete();
        }

        if ($this->cookies->has('RMT')) {
            $this->cookies->get('RMT')->delete();
        }

        $this->session->remove('auth-identity');
    }

    /**
     * Auths the user by his/her id
     *
     * @param int $id
     * @throws Exception
     */
    public function authUserById($id)
    {
        $user = Users::findFirstById($id);

        if ($user == false) {

            throw new Exception('The user does not exist');

        }

        $this->checkUserFlags($user);

        $this->session->set('auth-identity', [
            'id' => $user->id,
            'loginName' => $user->loginName,
            'firstName' => $user->firstName,
            'lastName' => $user->lastName,
        ]);
    }

    /**
     * Get the entity related to user in the active identity
     *
     * @return \DragonPHP\Backend\Models\Users
     * @throws Exception
     */
    public function getUser()
    {
        $identity = $this->session->get('auth-identity');

        if (isset($identity['id'])) {

            $user = Users::findFirstById($identity['id']);

            if ($user == false) {

                throw new Exception('The user does not exist');

            }

            return $user;
        }

        return false;
    }

}