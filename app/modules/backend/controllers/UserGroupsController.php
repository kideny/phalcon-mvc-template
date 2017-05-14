<?php
/*
  +------------------------------------------------------------------------+
  | DragonPHP Website                                                      |
  +------------------------------------------------------------------------+
  | Copyright (c) 2016-2017 DragonPHP Team (https://www.dragonphp.com)      |
  +------------------------------------------------------------------------+
  | This source file is subject to the New BSD License that is bundled     |
  | with this package in the file LICENSE.txt.                             |
  |                                                                        |
  | If you did not receive a copy of the license and are unable to         |
  | obtain it through the world-wide-web, please send an email             |
  | to license@dragonphp.com so we can send you a copy immediately.       |
  +------------------------------------------------------------------------+
  | Authors: Frank Kennedy Yuan <kideny@gmail.com>                     |
  +------------------------------------------------------------------------+
*/

namespace DragonPHP\Backend\Controllers;

use Phalcon\Mvc\View;
use Phalcon\Paginator\Adapter\Model as Paginator;
use DragonPHP\Backend\Models\UserGroups;
use DragonPHP\Backend\Forms\UserGroupForm;

class UserGroupsController extends ControllerBase
{

    public function indexAction()
    {
        $numberPage = 1;

        $parameters = [];

        $usergroups = UserGroups::find($parameters);

        if (count($usergroups) == 0) {

            $this->flash->notice("The search did not find any users");

            return $this->dispatcher->forward([
                "controller" => "usergroups",
                "action" => "index"
            ]);
        }

        $paginator = new Paginator([
            "data" => $usergroups,
            "limit" => 10,
            "page" => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();

        $this->view->usergroups = $usergroups;

    }


    public function createAction()
    {
        $form = new UserGroupForm(null);

        if ($this->request->isPost()) {     //判断是否Post请求

            if ($form->isValid($this->request->getPost()) == false) {   //验证表达数据，判断是否错误

                foreach ($form->getMessages() as $message) {            //打印错误数据

                    $this->flash->error($message);

                }

            } else {

                $userGroup = new UserGroups(
                    [
                        'name' => $this->request->getPost('name', 'striptags'),
                        'code' => $this->request->getPost('code', 'striptags'),
                        'description' => $this->request->getPost('description', 'striptags'),
                        'isNewUserDefault' => $this->request->getPost('isNewUserDefault', 'int'),
                        'isActivated' => $this->request->getPost('isActivated', 'int'),
                    ]
                );

                if (!$userGroup->save()) {      //保存数据，并且判断保存数据是否出错

                    $this->flash->error($userGroup->getMessages());

                } else {

                    $this->flash->success("UserGroup was created successfully");

                    return $this->dispatcher->forward(
                        [
                            'controller' => 'usergroups',
                            'action' => 'index'
                        ]
                    );

                }
            }
        }

        $this->view->form = $form;

    }

    public function deleteAction()
    {

    }

    public function editAction()
    {

    }

}

