<?php

use Phalcon\Loader;

$loader = new Loader();

/**
 * Register Namespaces
 */
$loader->registerNamespaces([
    'Phalcon'                       =>     BASE_PATH .'/vendor/phalcon/incubator/Library/Phalcon/',
    'DragonPHP\Frontend\Forms'       =>     APP_PATH . '/modules/frontend/forms/',
    'DragonPHP\Frontend\Models'      =>     APP_PATH . '/modules/frontend/models/',
    'DragonPHP\Backend\Library'      =>     APP_PATH . '/modules/backend/library/',
    'DragonPHP\Backend\Listeners'    =>     APP_PATH . '/modules/backend/listeners/',
    'DragonPHP\Backend\Models'       =>     APP_PATH . '/modules/backend/models/',
    'DragonPHP\Backend'              =>     APP_PATH . '/modules/backend/',
    'DragonPHP\User'                 =>     APP_PATH . '/modules/user/',
    'DragonPHP\Cli'                  =>     APP_PATH . '/modules/cli/'
]);

/**
 * Register module classes
 */
$loader->registerClasses([
    'DragonPHP\Frontend\Module' => APP_PATH . '/modules/frontend/Module.php',
    'DragonPHP\Backend\Module'  => APP_PATH . '/modules/backend/Module.php',
    'DragonPHP\User\Module'     => APP_PATH . '/modules/user/Module.php',
    'DragonPHP\Cli\Module'      => APP_PATH . '/modules/cli/Module.php'
]);

$loader->register();
