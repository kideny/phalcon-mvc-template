<?php
/*
+------------------------------------------------------------------------+
| Qaytmaydi                                                             |
+------------------------------------------------------------------------+
| Copyright (c) 2016-2017 Qaytmaydi Team and contributors                  |
+------------------------------------------------------------------------+
| This source file is subject to the New BSD License that is bundled     |
| with this package in the file LICENSE.txt.                             |
|                                                                        |
| If you did not receive a copy of the license and are unable to         |
| obtain it through the world-wide-web, please send an email             |
| to license@qaytmaydi.com so we can send you a copy immediately.       |
+------------------------------------------------------------------------+
*/

namespace Qaytmaydi\Backend\Library\Validators;

use Phalcon\Validation;
use Phalcon\Validation\Message;
use Phalcon\Validation\Validator;

class BirthDate extends Validator
{
    /**
     * Executes the validation
     *
     * @param  Validation $validator
     * @param  string $attribute
     * @return boolean
     */
    public function validate(Validation $validator, $attribute)
    {
        $value = $validator->getValue($attribute);
        if (empty($value) || $value == '0000-00-00') {
            return true;
        }
        $pattern = '/^([0-9]{4})-((?:0?[1-9])|(?:1[0-2]))-((?:0?[1-9])|' .
            '(?:[1-2][0-9])|(?:3[01]))([0-9]{2}:[0-9]{2}:[0-9]{2})?$/';
        if (preg_match($pattern, $value, $birthDate)) {
            if ($birthDate[1] > date('Y') && $birthDate[2] > date('m') && $birthDate[3] > date('d')
                || $birthDate[1] == date('Y') && $birthDate[2] == date('m') && $birthDate[3] > date('d')
                || $birthDate[1] == date('Y') && $birthDate[2] > date('m')
            ) {
                $validator->appendMessage(
                    new Message($this->getOption('message', 'Birthdate is invalid'), $attribute, 'Birthdate')
                );
                return false;
            }
            return true;
        }
        $validator->appendMessage(
            new Message($this->getOption('message', 'Birthdate is invalid'), $attribute, 'Birthdate')
        );
        return false;
    }
}