<?php
/*
+------------------------------------------------------------------------+
| Qaytmaydi Website                                                      |
+------------------------------------------------------------------------+
| Copyright (c) 2016-2017 Qaytmaydi Team (https://www.qaytmaydi.com)      |
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

namespace Qaytmaydi\Frontend\Controllers;

class LoginController extends ControllerBase
{

    public function indexAction()
    {
        $this->assets->addJs("assets/static/jquery/jquery.min.js");
    }

    public function pullAction()
    {
        //进入网站目录，执行拉取master的命令
        shell_exec("cd /web/qaytmaydi ; git pull origin master 2>&1 | tee -a /tmp/mylog 2>/dev/null >/dev/null &");
        echo "天佑中华是毛片 ！";
    }

}