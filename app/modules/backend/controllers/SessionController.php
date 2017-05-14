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

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\View;
use DragonPHP\Backend\Forms\LoginForm;
use DragonPHP\Backend\Library\Auth\Exception as AuthException;
use DragonPHP\Backend\Models\Users;

use Phalcon\Logger;
use Phalcon\Logger\Adapter\File as FileAdapter;

class SessionController extends Controller
{

    public function loginAction()
    {
        $form = new LoginForm();

        //$logger = new FileAdapter(BASE_PATH . '/logs/test.log');

        try{

            if (!$this->request->isPost()){             //判断是否Post请求

                if ($this->auth->hasRememberMe()) {     //判断是否曾经记住我

                    return $this->auth->loginWithRememberMe();      //没有记住我的话，执行登陆附带记住我方法

                }
            }else{

                if ($form->isValid($this->request->getPost()) == false) {       //判断获取表单数据是否正确 ，验证表单数据

                    foreach ($form->getMessages() as $message) {

                        $this->flash->error($message);
                    }

                //$logger->debug("This is a isValid message");

                }else{

                    $this->auth->check(
                        [
                            'loginName' => $this->request->getPost('loginName', 'striptags'),
                            'password' => $this->request->getPost('password'),
                            'remember' => $this->request->getPost('remember')
                        ]
                    );

                    //$logger->debug("This is a check message");

                    return $this->response->redirect('backend/index/index');
                }
            }
        } catch(AuthException $e){

            $this->flash->error($e->getMessage());
        }

        $this->view->form = $form;
    }

    public function forgetPasswordAction()
    {

    }

    public function lockscreenwordAction()
    {

    }

    /**
    * Finishes the active session redirecting to the index
    * 完成活动状态后返回到后台首页
    *
    * @return unknown
    */
    public function endAction()
    {
        $this->session->remove('auth-identity');

        $this->flash->success('退出登录，再见!');

        return $this->dispatcher->forward(
            [
                "module"     => "backend",
                "controller" => "session",
                "action"     => "login",
            ]
        );
    }

}