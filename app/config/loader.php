<?php

use Phalcon\Loader;

$loader = new Loader();

/**
 * Register Namespaces
 */
$loader->registerNamespaces([
    'Phalcon'                       =>     BASE_PATH .'/vendor/phalcon/incubator/Library/Phalcon/',
    'Qaytmaydi\Frontend\Forms'       =>     APP_PATH . '/modules/frontend/forms/',
    'Qaytmaydi\Frontend\Models'      =>     APP_PATH . '/modules/frontend/models/',
    'Qaytmaydi\Backend\Library'      =>     APP_PATH . '/modules/backend/library/',
    'Qaytmaydi\Backend\Listeners'    =>     APP_PATH . '/modules/backend/listeners/',
    'Qaytmaydi\Backend\Models'       =>     APP_PATH . '/modules/backend/models/',
    'Qaytmaydi\Backend'              =>     APP_PATH . '/modules/backend/',
    'Qaytmaydi\User'                 =>     APP_PATH . '/modules/user/',
    'Qaytmaydi\Cli'                  =>     APP_PATH . '/modules/cli/'
]);

/**
 * Register module classes
 */
$loader->registerClasses([
    'Qaytmaydi\Frontend\Module' => APP_PATH . '/modules/frontend/Module.php',
    'Qaytmaydi\Backend\Module'  => APP_PATH . '/modules/backend/Module.php',
    'Qaytmaydi\User\Module'     => APP_PATH . '/modules/user/Module.php',
    'Qaytmaydi\Cli\Module'      => APP_PATH . '/modules/cli/Module.php'
]);

$loader->register();
