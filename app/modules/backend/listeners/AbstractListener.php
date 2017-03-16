<?php

/*
+------------------------------------------------------------------------+
| Qaytmaydi                                                             |
+------------------------------------------------------------------------+
| Copyright (c) 2013-2016 Qaytmaydi Team and contributors                  |
+------------------------------------------------------------------------+
| This source file is subject to the New BSD License that is bundled     |
| with this package in the file LICENSE.txt.                             |
|                                                                        |
| If you did not receive a copy of the license and are unable to         |
| obtain it through the world-wide-web, please send an email             |
| to license@qaytmaydi.com so we can send you a copy immediately.       |
+------------------------------------------------------------------------+
*/

namespace Qaytmaydi\Backend\Listener;

use Phalcon\DiInterface;
use Phalcon\Mvc\User\Component;

/**
* Qaytmaydi\Listener\AbstractListener
*
* @package Qaytmaydi\Listener
*/
class AbstractListener extends Component
{
    public function __construct(DiInterface $di = null)
    {
        $di = $di ?: container();

        $this->setDI($di);
    }
}