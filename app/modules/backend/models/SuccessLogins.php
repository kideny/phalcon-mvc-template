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
namespace Qaytmaydi\Backend\Models;

use Phalcon\Mvc\Model\Behavior\Timestampable;

/**
* SuccessLogins
* This model registers successfull logins registered users have made
*/
class SuccessLogins extends ModelBase
{
    /**
    *
    * @var integer
    */
    public $id;
    /**
    *
    * @var integer
    */
    public $usersId;

    /**
    *
    * @var string
    */
    public $ipAddress;

    /**
    *
    * @var string
    */
    public $userAgent;

        /**
    * @var datetime
    */
    public $createdAt;

    public function initialize()
    {
        // Mapping
        $this->setSource("backend_success_logins");

        $this->belongsTo('usersId', __NAMESPACE__ . '\Users', 'id', [
            'alias' => 'user'
        ]);

    }


    /**
    * Independent Column Mapping.  key as datebase field, value as application field
    *
    * @return array
    */
    public function columnMap()
    {
        return [
            'id'            => 'id',
            'users_id'      => 'usersId',
            'ip_address'    => 'ipAddress',
            'user_agent'    => 'userAgent',
            'created_at'    => 'createdAt',
        ];
    }
}