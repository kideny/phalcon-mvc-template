<?php

/*
+------------------------------------------------------------------------+
| Loserhub                                                             |
+------------------------------------------------------------------------+
| Copyright (c) 2013-2016 Loserhub Team and contributors                  |
+------------------------------------------------------------------------+
| This source file is subject to the New BSD License that is bundled     |
| with this package in the file LICENSE.txt.                             |
|                                                                        |
| If you did not receive a copy of the license and are unable to         |
| obtain it through the world-wide-web, please send an email             |
| to license@loserhub.com so we can send you a copy immediately.       |
+------------------------------------------------------------------------+
*/

namespace Loserhub\Backend\Listener;

use Phalcon\DiInterface;
use Phalcon\Mvc\User\Component;

/**
* Loserhub\Listener\AbstractListener
*
* @package Loserhub\Listener
*/
class AbstractListener extends Component
{
    public function __construct(DiInterface $di = null)
    {
        $di = $di ?: container();
        
        $this->setDI($di);
    }
}