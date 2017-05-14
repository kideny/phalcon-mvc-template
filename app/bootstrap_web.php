<?php

use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\Application;

error_reporting(E_ALL);
ini_set('display_errors',1);

define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app');

try {

    /**
     * The FactoryDefault Dependency Injector automatically registers the services that
     * provide a full stack framework. These default services can be overidden with custom ones.
     */
    $di = new FactoryDefault();

    /**
     * Include general services
     */
    require APP_PATH . '/config/services.php';

    /**
     * Include web environment specific services
     */
    require APP_PATH . '/config/services_web.php';

    /**
     * Get config service for use in inline setup below
     */
    $config = $di->getConfig();

    /**
     * Include Autoloader
     */
    include APP_PATH . '/config/loader.php';

    /**
     * Handle the request
     */
    $application = new Application($di);

    /**
     * Register application modules
     */
    $application->registerModules([
        'frontend' => [
            'className' => 'DragonPHP\Frontend\Module',
            'path' => __DIR__ . '/modules/frontend/Module.php',
        ],
        'backend' => [
            'className' => 'DragonPHP\Backend\Module',
            'path' => __DIR__ . '/modules/backend/Module.php',
        ],
        'user' => [
            'className' => 'DragonPHP\User\Module',
            'path' => __DIR__ . '/modules/user/Module.php',
        ],
        'cli' => [
            'className' => 'DragonPHP\Cli\Module',
            'path' => __DIR__ . '/modules/Cli/Module.php',
        ],
    ]);

    /**
     * Include routes
     */
    require APP_PATH . '/config/routes.php';

    echo $application->handle()->getContent();
    //print_r($application);
    //print_r($config->toArray());

} catch (\Exception $e) {
    //echo $e->getMessage() . '<br>';
    echo get_class($e), ": ", $e->getMessage(), "\n";
    echo " File=", $e->getFile(), "\n";
    echo " Line=", $e->getLine(), "\n";
    echo $e->getTraceAsString();
    echo '<pre>' . nl2br(htmlentities($e->getTraceAsString())) . '</pre>';
}
