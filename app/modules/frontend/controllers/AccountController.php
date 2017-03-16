<?php
/*
+------------------------------------------------------------------------+
| Qaytmaydi Website                                                      |
+------------------------------------------------------------------------+
| Copyright (c) 2016-2017 Qaytmaydi Team (https://www.qaytmaydi.com)      |
+------------------------------------------------------------------------+
| This source file is subject to the New BSD License that is bundled     |
| with this package in the file LICENSE.txt.                             |
|                                                                        |
| If you did not receive a copy of the license and are unable to         |
| obtain it through the world-wide-web, please send an email             |
| to license@qaytmaydi.com so we can send you a copy immediately.       |
+------------------------------------------------------------------------+
| Authors: Frank Kennedy Yuan <kideny@msn.com>                     |
+------------------------------------------------------------------------+
*/

namespace Qaytmaydi\Frontend\Controllers;

use Qaytmaydi\Frontend\Forms\SignUpForm;
use Qaytmaydi\Frontend\Forms\LoginForm;
use Qaytmaydi\Frontend\Models\Users;

class AccountController extends ControllerBase
{
    /**
     * Default action. Set the public layout (layouts/public.volt)
     */
    public function initialize()
    {
        //$this->view->setTemplateBefore('public');
    }

    public function indexAction()
    {

    }

    /**
     * 登陆
     */
    public function signinAction()
    {
        $form = new LoginForm();

        try{

            if (!$this->request->isPost()){                     //判断是否Post请求

                if ($this->auth->hasRememberMe()) {             //判断是否记住我

                    return $this->auth->loginWithRememberMe();
                }
            }else{

                if ($form->isValid($this->request->getPost()) == false) {

                    foreach ($form->getMessages() as $message) {
                        $this->flash->error($message);
                    }
                }else{
                    $this->auth->check(
                        [
                            'email' => $this->request->getPost('email'),
                            'password' => $this->request->getPost('password'),
                            'remember' => $this->request->getPost('remember')
                        ]
                    );

                    return $this->response->redirect('user/index');
                }
            }
        } catch(AuthException $e){

            $this->flash->error($e->getMessage());

        }

        $this->view->form = $form;

    }

    /**
     * 注册
     */
    public function signupAction()
    {

        $form = new SignUpForm(null);

        if ($this->request->isPost()) {

            if ($form->isValid($this->request->getPost()) == false) {

                foreach ($form->getMessages() as $message) {

                    $this->flash->error($message);
                }

            } else {

                $user = new Users([
                    'firstName' => $this->request->getPost('firstName', 'striptags'),
                    'lastName' => $this->request->getPost('lastName', 'striptags'),
                    'loginName' => $this->request->getPost('loginName', 'striptags'),
                    'email' => $this->request->getPost('email', 'email'),
                    'password' => $this->security->hash($this->request->getPost('password')),
                    'confirmPassword' => $this->security->hash($this->request->getPost('confirmPassword')),
                ]);

                if (!$user->save()) {

                    $this->flash->error($user->getMessages());

                } else {

                    $this->flash->success("User was created successfully");

                    return $this->dispatcher->forward(
                        [
                            'controller' => 'index',
                            'action' => 'index'
                        ]
                    );

                }
            }
        }

        $this->view->form = $form;
    }

    /**
     * Shows the forgot password form
     */
    public function forgotPasswordAction()
    {
        $form = new ForgotPasswordForm();

        if ($this->request->isPost()) {

            // Send emails only is config value is set to true
            if ($this->getDI()->get('config')->useMail) {

                if ($form->isValid($this->request->getPost()) == false) {
                    foreach ($form->getMessages() as $message) {
                        $this->flash->error($message);
                    }
                } else {
                    $user = Users::findFirstByEmail($this->request->getPost('email'));
                    if (!$user) {
                        $this->flash->success('There is no account associated to this email');
                    } else {
                        $resetPassword = new ResetPasswords();
                        $resetPassword->usersId = $user->id;
                        if ($resetPassword->save()) {
                            $this->flash->success('Success! Please check your messages for an email reset password');
                        } else {
                            foreach ($resetPassword->getMessages() as $message) {
                                $this->flash->error($message);
                            }
                        }
                    }
                }

            } else {
                $this->flash->warning('Emails are currently disabled. Change config key "useMail" to true to enable emails.');
            }
        }

        $this->view->form = $form;
    }

    /**
    * Finishes the active session redirecting to the index
    * 完成活动状态后返回到后台首页
    *
    * @return unknown
    */
    public function endAction()
    {
        $this->session->remove('user-identity');

        $this->flash->success('退出登录，再见!');

        return $this->dispatcher->forward(
            [
                "controller" => "account",
                "action"     => "signin",
            ]
        );
    }

}

