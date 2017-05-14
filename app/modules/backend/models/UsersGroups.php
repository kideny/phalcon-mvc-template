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

namespace DragonPHP\Backend\Models;

use Phalcon\Validation;
use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Behavior\Timestampable;
use Phalcon\Mvc\Model\Resultset\Simple;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Uniqueness;

/**
* Class Users
*
* @property Simple badges badges=>原型
* @property Simple posts  posts=>邮件
* @property Simple replies replies=>回复
* @method Simple getBadges($parameters=null)
* @method Simple getPosts($parameters=null)
* @method Simple getReplies($parameters=null)
* @method static Users findFirstById(int $id)
* @method static Users findFirstByLogin(string $login)
* @method static Users findFirstByName(string $name)
* @method static Users findFirstByEmail(string $email)
* @method static Users findFirstByAccessToken(string $token)
* @method static Users[] find($parameters=null)
*
* @package DragonPHP\Backend\Model
*/

class UsersGroups extends ModelBase

{
    /**
    * @var int
    */
    protected $user_id;

    /**
    * @var int
    */
    protected $user_group_id;

    /**
    * @var string
    */
    protected $is_actived;


    public function initialize()
    {
        // Mapping
        $this->setSource("backend_user_groups");

        $this->belongs(
            'user_id',
            'DragonPHP\Backend\Models\Users',
            'id',
            [
                'alias' => 'userId',
                'reusable' => true
            ]
        );

        $this->belongs(
            'user_group_id',
            'DragonPHP\Backend\Models\UserGroups',
            'id',
            [
                'alias' => 'UserGroupId',
                'reusable' => true
            ]
        );
    }

    /**
    * @return int $user_id
    */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
    * @param int $user_id
    */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
    * @return int $user_group_id
    */
    public function getUserGroupId()
    {
        return $this->user_group_id;
    }

    /**
    * @param int $user_group_id
    */
    public function setUserGroupID($user_group_id)
    {
        $this->user_group_id = $user_group_id;
    }

    /**
    * @return tinyint $is_activated
    */
    public function getIsActivated()
    {
        return $this->is_activated;
    }

    /**
    * @param tinyint $is_activated
    */
    public function setIsActivated($is_activated)
    {
        $this->is_activated = $is_activated;
    }

    protected function beforeSave()
    {

    }

    public function beforeCreate()
    {
    }

    public function afterValidation()
    {

    }

    public function afterCreate()
    {

    }

    /**
    * Independent Column Mapping.
    *
    * @return array
    */
    public function columnMap()
    {
        return [
            'user_id'        =>  'userId',
            'user_group_id'  =>  'userGroupId',
            'is_activated'   =>  'isActivated',
        ];
    }

}