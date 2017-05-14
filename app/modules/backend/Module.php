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

namespace DragonPHP\Backend;

use Phalcon\DiInterface;
use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Php as PhpEngine;
use Phalcon\Mvc\ModuleDefinitionInterface;
use Phalcon\Config;
use DragonPHP\Backend\Library\Auth\Auth;

use Phalcon\Logger;
use Phalcon\Events\Event;
use Phalcon\Events\Manager as EventsManager;
use Phalcon\Logger\Adapter\File as FileLogger;
use Phalcon\Db\Adapter\Pdo\Mysql as Connection;
// 使用日志记录底层SQL语句

class Module implements ModuleDefinitionInterface
{
    /**
    * Registers an autoloader related to the module
    *
    * @param DiInterface $di
    */
    public function registerAutoloaders(DiInterface $di = null)
    {
        $loader = new Loader();

        $loader->registerNamespaces([
        'DragonPHP\Backend\Controllers' => __DIR__ . '/controllers/',
        'DragonPHP\Backend\Listeners'   => __DIR__ . '/listeners/',
        'DragonPHP\Backend\Forms'       => __DIR__ . '/forms/',
        'DragonPHP\Backend\Library'     => __DIR__ . '/library/',
        'DragonPHP\Backend\Models'      => __DIR__ . '/models/'
        ]);

        $loader->register();
    }

    /**
    * Registers services related to the module
    *
    * @param DiInterface $di
    */
    public function registerServices(DiInterface $di)
    {
        /**
        * Try to load local configuration
        */
        if (file_exists(__DIR__ . '/config/config.php')) {
            $config = $di['config'];
            $override = new Config(include __DIR__ . '/config/config.php');
            if ($config instanceof Config) {
                $config->merge($override);
            } else {
                $config = $override;
            }
        }

        /**
        * Setting up the view component
        */
        $di['view'] = function () {

            $config = $this->getConfig();

            $view = new View();

            $view->setViewsDir($config->get('application')->viewsDir);

            $view->registerEngines([
            '.volt'  => 'voltShared',
            '.phtml' => PhpEngine::class
            ]);

            return $view;
        };

        /**
        * Database connection is created based in the parameters defined in the configuration file
        */
        $di['db'] = function () {

            $config = $this->getConfig();

            $dbConfig = $config->database->toArray();

            $dbAdapter = '\Phalcon\Db\Adapter\Pdo\\' . $dbConfig['adapter'];

            unset($config['adapter']);

            // 添加数据库监听事件
            $eventsManager = new EventsManager();

            $logger = new FileLogger(BASE_PATH."/logs/sql.log");

            // Listen all the database events
            $eventsManager->attach(
                'db:beforeQuery',
                function ($event, $connection) use ($logger)
                {
                    $variables = $connection->getSQLVariables();

                    $string = $connection->getSQLStatement();

                    $context   = $variables ?: [];

                    if(!empty($context)) {
                        $context = ' [' . implode(', ', $context) . ']';
                    } else {
                        $context = '';
                    }

                    $logger->debug($string . $context);
                    //$logger->log($connection->getSQLStatement(), Logger::INFO);
                }
            );

            $connection = new $dbAdapter($dbConfig);

            // 标记事件管理器到数据库适配器实例
            $connection->setEventsManager($eventsManager);

            return $connection;

        };

        /**
        * Custom authentication component
        */
        $di['auth'] = function () {
            return new Auth();
        };

    }

}