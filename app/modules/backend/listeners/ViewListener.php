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
use Phalcon\Mvc\ViewInterface;
use Phalcon\Mvc\View\Exception;

/**
* DragonPHP\Listeners\ViewListener
*
* @package DragonPHP\Listeners
*/
class ViewListener extends AbstractListener
{
    /**
    * Notify about not found views.
    *
    * @param Event         $event
    * @param ViewInterface $view
    * @param mixed         $viewEnginePath
    *
    * @throws Exception
    */
    public function notFoundView(Event $event, ViewInterface $view, $viewEnginePath)
    {
        if ($viewEnginePath && !is_array($viewEnginePath)) {
            $viewEnginePath = [$viewEnginePath];
        }

        $message = sprintf(
        'View was not found in any of the views directory. Active render paths: [%s]',
        ($viewEnginePath ? join(', ', $viewEnginePath) : gettype($viewEnginePath))
        );

        container()->get('logger')->error($message);

        if ($event->isCancelable()) {
            $event->stop();
        }

        throw new Exception($message);
    }
}