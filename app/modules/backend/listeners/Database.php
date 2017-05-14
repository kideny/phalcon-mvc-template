<?php

/*
+------------------------------------------------------------------------+
| DragonPHP                                                             |
+------------------------------------------------------------------------+
| Copyright (c) 2013-2016 DragonPHP Team and contributors                  |
+------------------------------------------------------------------------+
| This source file is subject to the New BSD License that is bundled     |
| with this package in the file LICENSE.txt.                             |
|                                                                        |
| If you did not receive a copy of the license and are unable to         |
| obtain it through the world-wide-web, please send an email             |
| to license@dragonphp.com so we can send you a copy immediately.       |
+------------------------------------------------------------------------+
*/

namespace DragonPHP\Backend\Listeners;

use Phalcon\Events\Event;
use Phalcon\Db\Adapter\Pdo as Connection;
use Phalcon\Logger;
use Phalcon\Logger\Adapter\File as FileAdapter;

/**
* DragonPHP\Backend\Listeners\Database
*
* @package DragonPHP\Listeners
*/
class Database
{
    /**
    * Database queries listener.
    *
    * You can disable queries logging by changing log level.
    *
    * @param  Event $event
    * @param  Pdo   $connection
    * @return bool
    */
    public function beforeQuery(Event $event, Pdo $connection)
    {
        $string    = $connection->getSQLStatement();

        $variables = $connection->getSqlVariables();

        $context   = $variables ?: [];

        //$logger = container()->get('logger', ['db']);



        if (!empty($context)) {

            $context = ' [' . implode(', ', $context) . ']';

        } else {

            $context = '';

        }

        $logger->debug($string . $context);

        return true;
    }

}