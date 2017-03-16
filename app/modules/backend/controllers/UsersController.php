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
| Authors: Frank Kennedy Yuan <kideny@gmail.com>                     |
+------------------------------------------------------------------------+
*/

namespace Qaytmaydi\Backend\Controllers;

use Phalcon\Tag;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;
use Qaytmaydi\Backend\Models\Users;
use Qaytmaydi\Backend\Models\PasswordChanges;
use Qaytmaydi\Backend\Forms\SignUpForm;
use Qaytmaydi\Backend\Forms\UsersForm;
use Qaytmaydi\Backend\Forms\ChangePasswordForm;

use Phalcon\Logger;
use Phalcon\Logger\Adapter\File as FileAdapter;

/**
 * Qaytmaydi\Backend\Controllers\UsersController
 * CRUD to manage users
 */
class UsersController extends ControllerBase
{
    public function initialize()
    {

    }

    public function indexAction()
    {
        $numberPage = 1;

        $parameters = [];

        $users = Users::find($parameters);

        if (count($users) == 0) {

            $this->flash->notice("The search did not find any users");

            return $this->dispatcher->forward([
                "action" => "index"
            ]);
        }

        $paginator = new Paginator([
            "data" => $users,
            "limit" => 10,
            "page" => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();

        $this->view->users = $users;
    }

    /**
     * Searches for users
     */
    public function searchAction()
    {
        $numberPage = 1;

        if ($this->request->isPost()) {

            $query = Criteria::fromInput($this->di, 'Qaytmaydi\Backend\Models\Users', $this->request->getPost());

            $this->persistent->searchParams = $query->getParams();

        } else {

            $numberPage = $this->request->getQuery("page", "int");

        }

        $parameters = [];

        if ($this->persistent->searchParams) {

            $parameters = $this->persistent->searchParams;
        }

        $users = Users::find($parameters);

        if (count($users) == 0) {

            $this->flash->notice("The search did not find any users");

            return $this->dispatcher->forward([
                'controller' => 'users',
                "action" => "index"
            ]);
        }

        $paginator = new Paginator([
            "data" => $users,
            "limit" => 10,
            "page" => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();
    }

    /**
     * Creates a User
     */
    public function createAction()
    {

        $form = new SignUpForm(null);

        if ($this->request->isPost()) {

            if ($form->isValid($this->request->getPost()) == false) {

                foreach ($form->getMessages() as $message) {

                    $this->flash->error($message);

                }

            } else {

                $user = new Users([
                    'isSuperUser' => $this->request->getPost('isSuperUser', 'int'),
                    'firstName' => $this->request->getPost('firstName', 'striptags'),
                    'lastName' => $this->request->getPost('lastName', 'striptags'),
                    'loginName' => $this->request->getPost('loginName', 'striptags'),
                    'email' => $this->request->getPost('email', 'email'),
                    'password' => $this->security->hash($this->request->getPost('password')),
                    'confirmPassword' => $this->security->hash($this->request->getPost('confirmPassword')),
                ]);

                if (!$user->save()) {

                } else {

                    $this->flash->success("User was created successfully");

                    return $this->dispatcher->forward(
                        [
                            'controller' => 'users',
                            'action' => 'index'
                        ]
                    );

                }
            }
        }

        $this->view->form = $form;
    }

    /**
     * Saves the user from the 'edit' action
     */
    public function editAction()
    {
        $id = $this->request->get('id', 'int');

        $user = Users::findFirstById($id);

        $logger = new FileAdapter(BASE_PATH . '/logs/test.log');

        if (!$user) {

            $this->flash->error("用户没有找到");

            return $this->dispatcher->forward([
                'controller' => 'users',
                'action' => 'index'
            ]);

        }

        if ($this->request->isPost()) {

            $user->assign([
                'isSuperUser' => $this->request->getPost('isSuperUser', 'int'),
                'firstName' => $this->request->getPost('firstName', 'striptags'),
                'lastName' => $this->request->getPost('lastName', 'striptags'),
                'loginName' => $this->request->getPost('loginName', 'striptags'),
                'email' => $this->request->getPost('email', 'email'),
            ]);

            $form = new UsersForm($user, [
                'edit' => true
            ]);

            if ($form->isValid($this->request->getPost()) == false) {

                foreach ($form->getMessages() as $message) {

                    $this->flash->error($message);

                }

            } else {

                if (!$user->save()) {

                    $this->flash->error($user->getMessages());

                } else {

                    $this->flash->success("User was created successfully");

                    return $this->dispatcher->forward([
                        'controller' => 'users',
                        'action' => 'index'
                    ]);

                }
            }
        }

        $this->view->user = $user;

        $this->view->form = new UsersForm($user, [
            'edit' => true
        ]);
    }

    /**
     * Deletes a User
     *
     * @param int $id
     */
    public function deleteAction()
    {
        $id = $this->request->get('id', 'int');

        $user = Users::findFirstById($id);

        if (!$user) {

            $this->flash->error("User was not found");

            return $this->dispatcher->forward([
                'controller' => 'users',
                'action' => 'index'
            ]);
        }

        if (!$user->delete()) {

            $this->flash->error($user->getMessages());

        } else {

            $this->flash->success("User was deleted");

        }

        return $this->dispatcher->forward([
            'controller' => 'users',
            'action' => 'index'
        ]);
    }

    public function changePasswordAction()
    {
        $form = new ChangePasswordForm();

        if ($this->request->isPost()) {

            if (!$form->isValid($this->request->getPost())) {

                foreach ($form->getMessages() as $message) {

                    $this->flash->error($message);
                }

            } else {

                $user = $this->auth->getUser();

                $user->password = $this->security->hash($this->request->getPost('password'));

                $user->mustChangePassword = 'N';

                $passwordChange = new PasswordChanges();

                $passwordChange->user = $user;

                $passwordChange->ipAddress = $this->request->getClientAddress();

                $passwordChange->userAgent = $this->request->getUserAgent();

                if (!$passwordChange->save()) {

                    $this->flash->error($passwordChange->getMessages());

                } else {

                    $this->flash->success('Your password was successfully changed');

                    Tag::resetInput();
                }

            }

        }

        $this->view->form = $form;
    }

}