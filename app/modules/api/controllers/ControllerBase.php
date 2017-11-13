<?php
/*
+------------------------------------------------------------------------+
| DragonPHP Website                                                      |
+------------------------------------------------------------------------+
| Copyright (c) 2016-2017 DragonPHP Team (https://www.DragonPHP.com)      |
+------------------------------------------------------------------------+
| This source file is subject to the New BSD License that is bundled     |
| with this package in the file LICENSE.txt.                             |
|                                                                        |
| If you did not receive a copy of the license and are unable to         |
| obtain it through the world-wide-web, please send an email             |
| to license@DragonPHP.com so we can send you a copy immediately.       |
+------------------------------------------------------------------------+
| Authors: Frank Kennedy Yuan <kideny@msn.com>                     |
+------------------------------------------------------------------------+
*/

namespace DragonPHP\Api\Controllers;

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Dispatcher;

/**
 * DragonPHP\Api\Controllers\ControllerBase
 *
 * This is the base controller for all controllers in the Backend
 */
class ControllerBase extends Controller
{

    public function initialize()
    {
    }

    /**
    * Execute before the router so we can determine if this is a private controller, and must be authenticated, or a
    * public controller that is open to all.
    *
    * @param Dispatcher $dispatcher
    * @return boolean
    */
    public function beforeExecuteRoute(Dispatcher $dispatcher)
    {
    }
}
