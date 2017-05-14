<?php
/*
+------------------------------------------------------------------------+
| DragonPHP                                                             |
+------------------------------------------------------------------------+
| Copyright (c) 2016-2017 DragonPHP Team and contributors                  |
+------------------------------------------------------------------------+
| This source file is subject to the New BSD License that is bundled     |
| with this package in the file LICENSE.txt.                             |
|                                                                        |
| If you did not receive a copy of the license and are unable to         |
| obtain it through the world-wide-web, please send an email             |
| to license@qaytmaydi.com so we can send you a copy immediately.       |
+------------------------------------------------------------------------+
*/

namespace DragonPHP\Backend\Library\Validators;

use Phalcon\Validation\Validator;
use Phalcon\Validation\ValidatorInterface;
use Phalcon\Validation\Message;

class Phone extends Validator
{
    /**
     * Executes the validation
     *
     * @param  Phalcon\Validation $validator
     * @param  string             $attribute
     * @return boolean
     */
    public function validate(\Phalcon\Validation $validator, $attribute)
    {
        $value = $validator->getValue($attribute);
        if (empty($value) || preg_match('/^[0-9]{10}+$/', $value)) {
            return true;
        }
        $message = $this->getOption('message');
        if (!$message) {
            $message = 'The phone number is not valid';
        }
        $validator->appendMessage(new Message($message, $attribute, 'postcode'));
        return false;
    }
}