<?php
namespace DragonPHP\Cli;

use Phalcon\DiInterface;
use Phalcon\Loader;
use Phalcon\Mvc\ModuleDefinitionInterface;

class Module implements ModuleDefinitionInterface
{
    /**
     * {@inheritdoc}
     *
     * @return string
     */
    public function getHandlersNamespace()
    {
        return 'DragonPHP\Cli\Tasks';
    }

    /**
     * Registers an autoloader related to the module
     *
     * @param DiInterface $di
     */
    public function registerAutoloaders(DiInterface $di = null)
    {
        $loader = new Loader();

        $loader->registerNamespaces([
            $this->getHandlersNamespace()    => __DIR__ . '/tasks/',
            'DragonPHP\Cli\Library'           => __DIR__ . '/library/',
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
        // Setting up the MVC Dispatcher
        $di->getShared('dispatcher')->setDefaultNamespace($this->getHandlersNamespace());
    }
}
