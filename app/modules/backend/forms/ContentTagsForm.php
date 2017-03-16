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
| Authors: Frank Kennedy Yuan <kideny@gmail.com>                     |
+------------------------------------------------------------------------+
*/

namespace Phanbook\Backend\Forms;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Forms\Element\Submit;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Identical;

class TagsForm extends Form
{
    public function initialize($entity = null)
    {
        // In edit page the id is hidden
        if (!is_null($entity)) {
            $this->add(new Hidden('id'));
        }

        //Name
        $name = new Text(
            'name',
            array(
            'placeholder' => t('Name'),
            'class'       => 'form-control',
            'required'    => true
            )
        );
        $name->addValidator(
            new PresenceOf(
                array(
                'message' => t('The name is required.')
                )
            )
        );
        $this->add($name);
        $slug = new Text(
            'slug',
            array(
            'placeholder' => t('Slug'),
            'class'       => 'form-control',
            'required'    => true
            )
        );
        $slug->addValidator(
            new PresenceOf(
                array(
                'message' => t('The name is required.')
                )
            )
        );
        $this->add($slug);
        //description
        $description = new TextArea('description',
            array(
                'placeholder' => t('Description'),
                'class'       => 'form-control',
                'required'    => true
            )
        );
        $description->addValidator(
            new PresenceOf(
                array(
                    'message' => t('Description is required.')
                )
            )
        );
        $this->add($description);
        // CSRF

        $this->add(
            new Submit('save',
                array(
                    'class' => 'btn btn-sm btn-info',
                    'value' => 'Save'
                )
            )
        );
    }
}