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

namespace Qaytmaydi\Backend\Controllers;

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Dispatcher;


/**
* ControllerBase
* This is the base controller for all controllers in the Backend
*/
class ControllerBase extends Controller
{


    protected function initialize()
    {

    }

    /**
    * Execute before the router so we can determine if this is a private controller, and must be authenticated, or a
    * public controller that is open to all.
    *
    * @param Dispatcher $dispatcher
    * @return boolean
    */
    protected function beforeExecuteRoute(Dispatcher $dispatcher)
    {
        // Get the current identity
        $identity = $this->auth->getIdentity();

        // If there is no identity available the user is redirected to index/index
        if (!is_array($identity)) {

            $this->flash->notice('You don\'t have access to this module: private');

            $dispatcher->forward([
                'controller' => 'session',
                'action' => 'login'
            ]);

            return false;
        }

    }

    /**
    * Execute before the router so we can determine if this is a private controller, and must be authenticated, or a
    * public controller that is open to all.
    *
    * @param Dispatcher $dispatcher
    * @return boolean
    */
    /*
    protected function beforeExecuteRoute(Dispatcher $dispatcher)
    {
        $controllerName = $dispatcher->getControllerName();
        // Only check permissions on private controllers
        if ($this->acl->isPrivate($controllerName)) {
            // Get the current identity
            $identity = $this->auth->getIdentity();
            // If there is no identity available the user is redirected to index/index
            if (!is_array($identity)) {
                $this->flash->notice('You don\'t have access to this module: private');
                $dispatcher->forward([
                'module' => 'backend',
                'controller' => 'index',
                'action' => 'index'
                ]);
                return false;
            }
            // Check if the user have permission to the current option
            $actionName = $dispatcher->getActionName();
            if (!$this->acl->isAllowed($identity['profile'], $controllerName, $actionName)) {
                $this->flash->notice('You don\'t have access to this module: ' . $controllerName . ':' . $actionName);
                if ($this->acl->isAllowed($identity['profile'], $controllerName, 'index')) {
                    $dispatcher->forward([
                    'module' => 'backend',
                    'controller' => $controllerName,
                    'action' => 'index'
                    ]);
                } else {
                    $dispatcher->forward([
                    'module' => 'backend',
                    'controller' => 'session',
                    'action' => 'login'
                    ]);
                }
                return false;
            }
        }
    }
    */

}