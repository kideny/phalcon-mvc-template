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

namespace Qaytmaydi\Frontend\Forms;

use Phalcon\Forms\Element\Password;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Confirmation;
use Phalcon\Validation\Validator\StringLength;

class ChangePasswordForm extends FormBase
{

    /**
     * ChangePasswordForms initializer
     */
    public function initialize()
    {
        // Password
        $password = new Password('password', [
            'class' => 'form-control',
            'placeholder' => '请输入密码',
            'required' => 'true',
            "autocomplete" => "off",
            'maxlengh' => 32,
        ]);

        $password->setLabel('Password');

        $password->addValidators([
            new PresenceOf([
                'message' => '密码是必须要输入的'
            ]),
            new StringLength([
                'min' => 8,
                'messageMinimum' => '您输入的密码太短. 最小为8个字符'
            ]),
            new StringLength([
                'max' => 32,
                'messageMinimum' => '您输入的密码太长. 最大为32个字符'
            ]),
            new Confirmation([
                'message' => '密码与确认密码不同',
                'with' => 'confirmPassword'
            ])
        ]);

        $this->add($password);

        // Confirm Password
        $confirmPassword = new Password('confirmPassword', [
            'class'  => 'form-control',
            'placeholder' => '请输入确认密码',
            'required' => 'true',
            "autocomplete" => "off",
            'maxlengh' => 32,
        ]);

        $confirmPassword->setLabel('Confirm Password');

        $confirmPassword->addValidators([
            new PresenceOf([
                'message' => '确认密码是必须要输入的'
            ]),
            new StringLength([
                'max' => 32,
                'messageMinimum' => '您输入的密码太长. 最大为32个字符'
            ]),
        ]);

        $this->add($confirmPassword);

    }

}