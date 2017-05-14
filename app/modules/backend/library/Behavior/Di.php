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

namespace DragonPHP\Backend\Library\Behavior;

use Phalcon\Di as PhD;
use Phalcon\DiInterface;

/**
 * \DragonPHP\Backend\Library\Behavior\Di
 *
 * Dependency Injection Trait.
 * It should be used for classes which do not extend Injectable
 * and do not implement DiInterface interface.
 *
 * <code>
 * class A {
 *     // Some logic
 * }
 *
 * use DragonPHP\Common\Library\Behavior\Di as DiBehavior;
 *
 * class B extends A {
 *     use DiBehavior {
 *         DiBehavior::__construct as protected injectDi;
 *     }
 *
 *     public function __construct()
 *     {
 *         $this->injectDi();
 *     }
 * }
 * </code>
 *
 * @property \Phalcon\Mvc\Dispatcher|\Phalcon\Mvc\DispatcherInterface $dispatcher
 * @property \Phalcon\Mvc\Router|\Phalcon\Mvc\RouterInterface $router
 * @property \Phalcon\Mvc\Url|\Phalcon\Mvc\UrlInterface $url
 * @property \Phalcon\Http\Request|\Phalcon\Http\RequestInterface $request
 * @property \Phalcon\Http\Response|\Phalcon\Http\ResponseInterface $response
 * @property \Phalcon\Http\Response\Cookies|\Phalcon\Http\Response\CookiesInterface $cookies
 * @property \Phalcon\Filter|\Phalcon\FilterInterface $filter
 * @property \Phalcon\Flash\Direct $flash
 * @property \Phalcon\Flash\Session $flashSession
 * @property \Phalcon\Session\Adapter\Files|\Phalcon\Session\Adapter|\Phalcon\Session\AdapterInterface $session
 * @property \Phalcon\Events\Manager|\Phalcon\Events\ManagerInterface $eventsManager
 * @property \Phalcon\Db\AdapterInterface $db
 * @property \Phalcon\Security $security
 * @property \Phalcon\Crypt|\Phalcon\CryptInterface $crypt
 * @property \Phalcon\Tag $tag
 * @property \Phalcon\Escaper|\Phalcon\EscaperInterface $escaper
 * @property \Phalcon\Annotations\Adapter\Memory|\Phalcon\Annotations\Adapter $annotations
 * @property \Phalcon\Mvc\Model\Manager|\Phalcon\Mvc\Model\ManagerInterface $modelsManager
 * @property \Phalcon\Mvc\Model\MetaData\Memory|\Phalcon\Mvc\Model\MetadataInterface $modelsMetadata
 * @property \Phalcon\Mvc\Model\Transaction\Manager|\Phalcon\Mvc\Model\Transaction\ManagerInterface $transactionManager
 * @property \Phalcon\Assets\Manager $assets
 * @property \Phalcon\Di|\Phalcon\DiInterface $di
 * @property \Phalcon\Session\Bag|\Phalcon\Session\BagInterface $persistent
 * @property \Phalcon\Mvc\View|\Phalcon\Mvc\ViewInterface $view
 *
 * @method \Phalcon\Config getConfig(mixed $params = null)
 * @method \Phalcon\Logger|\Phalcon\Logger\AdapterInterface getLogger(mixed $params = null)
 * @method \Phalcon\Http\Request|\Phalcon\Http\RequestInterface getRequest(mixed $params = null)
 *
 * @package DragonPHP\Common\Library\Behavior
 */
trait Di
{
    /**
     * The Dependency Injection Container.
     * @var DiInterface
     */
    protected $di;

    /**
     * Di constructor.
     *
     * @param DiInterface|null $di The Dependency Injection Container.
     */
    public function __construct(DiInterface $di = null)
    {
        $this->setDI($di ?: PhD::getDefault());
    }

    /**
     * Gets the Dependency Injection Container.
     *
     * @return DiInterface
     */
    public function getDI()
    {
        return $this->di;
    }

    /**
     * Sets the Dependency Injection Container.
     *
     * @param DiInterface $di
     * @return $this
     */
    public function setDI(DiInterface $di)
    {
        $this->di = $di;

        return $this;
    }

    /**
     * Trying to obtain the dependence from the Dependency Injection Container.
     *
     * <code>
     * use DragonPHP\Common\Library\Behavior\Di;
     *
     * class A {
     *     // Some logic
     * }
     *
     * class B extends A {
     *     use Di {
     *         Di::__construct as protected injectDI;
     *     }
     *
     *     public function __construct()
     *     {
     *         $this->injectDI();
     *     }
     * }
     *
     * $a = new A();
     * $a->getLogger('db.log');
     * </code>
     *
     * @param string $func
     * @param mixed $argv
     *
     * @return mixed
     */
    public function __call($func, $argv)
    {
        return call_user_func_array([$this->getDI(), $func], $argv);
    }
}
