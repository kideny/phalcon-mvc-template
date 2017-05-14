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
| Authors: Frank Kennedy Yuan <kideny@msn.com>                     |
+------------------------------------------------------------------------+
*/

namespace DragonPHP\User\Controllers;

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Dispatcher;

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
        $identity = $this->auth->getIdentity();     // Get the current identity

        if (!is_array($identity)) {                 // If there is no identity available the user is redirected to index/index

            $this->flash->notice('You don\'t have access to this module: private');

            $dispatcher->setReturnedValue($this->response->redirect('account/signin', true));

            return false;
        }

    }

}
