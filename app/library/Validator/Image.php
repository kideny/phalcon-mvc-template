<?php
/*
+------------------------------------------------------------------------+
| Loserhub                                                             |
+------------------------------------------------------------------------+
| Copyright (c) 2016-2017 Loserhub Team and contributors                  |
+------------------------------------------------------------------------+
| This source file is subject to the New BSD License that is bundled     |
| with this package in the file LICENSE.txt.                             |
|                                                                        |
| If you did not receive a copy of the license and are unable to         |
| obtain it through the world-wide-web, please send an email             |
| to license@loserhub.com so we can send you a copy immediately.       |
+------------------------------------------------------------------------+
*/

namespace Loserhub\Library\Validators;

use Phalcon\Validation\Validator;
use Phalcon\Validation\ValidatorInterface;
use Phalcon\Validation\Message;

class Image extends Validator
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
        $allowedTypes = [
            'image/gif',
            'image/jpg',
            'image/png',
            'image/bmp',
            'image/jpeg'
        ];
        if (in_array($value[0]->getRealType(), $allowedTypes)) {
            return true;
        }
        $message = $this->getOption('message');
        if (!$message) {
            $message = 'Invalid file extension.';
        }
        $validator->appendMessage(new Message($message, $attribute, 'postcode'));
        return false;
    }
}