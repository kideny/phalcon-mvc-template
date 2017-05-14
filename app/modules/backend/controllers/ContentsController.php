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

namespace DragonPHP\Backend\Controllers;

use Phalcon\Paginator\Adapter\Model as Paginator;
use DragonPHP\Frontend\Forms\SignUpForm;
use DragonPHP\Frontend\Forms\UsersForm;
use DragonPHP\Frontend\Models\Users;

/**
 * DragonPHP\Backend\Controllers\MembersController
 * CRUD to manage Members
 */
class MembersController extends ControllerBase
{

    /**
     * 网站后台管理员列表
     */
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
     * 网站后台添加用户
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
                    'firstName' => $this->request->getPost('firstName', 'striptags'),
                    'lastName' => $this->request->getPost('lastName', 'striptags'),
                    'loginName' => $this->request->getPost('loginName', 'striptags'),
                    'email' => $this->request->getPost('email', 'email'),
                    'password' => $this->security->hash($this->request->getPost('password')),
                    'confirmPassword' => $this->security->hash($this->request->getPost('confirmPassword')),
                    'isVip' => $this->request->getPost('isVip', 'int'),
                    'isActivated' => $this->request->getPost('isActivated', 'int'),
                ]);

                if (!$user->save()) {

                    $this->flash->error($messages);

                } else {

                    $this->flash->success("User was created successfully");

                    return $this->dispatcher->forward(
                        [
                            'controller' => 'members',
                            'action' => 'index'
                        ]
                    );

                }
            }
        }

        $this->view->form = $form;
    }

    /**
     * Saves the member from the 'edit' action
     */
    public function editAction()
    {
        $id = $this->request->get('id', 'int');

        $user = Users::findFirstById($id);

        if (!$user) {

            $this->flash->error("用户没有找到");

            return $this->dispatcher->forward([
                'controller' => 'members',
                'action' => 'index'
            ]);

        }

        if ($this->request->isPost()) {

            $user->assign([
                'firstName' => $this->request->getPost('firstName', 'striptags'),
                'lastName' => $this->request->getPost('lastName', 'striptags'),
                'loginName' => $this->request->getPost('loginName', 'striptags'),
                'email' => $this->request->getPost('email', 'email'),
                'isActivated' => $this->request->getPost('isActivated', 'int'),
                'isVip' => $this->request->getPost('isVip', 'int'),
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
                        'controller' => 'members',
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
     * Deletes a Members
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
                'controller' => 'memberss',
                'action' => 'index'
            ]);
        }

        if (!$user->delete()) {

            $this->flash->error($user->getMessages());

        } else {

            $this->flash->success("User was deleted");

        }

        return $this->dispatcher->forward([
            'controller' => 'members',
            'action' => 'index'
        ]);
    }

    public function blankAction()
    {

    }

}

