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

use Phalcon\Validation;
use Phalcon\Mvc\Model\Behavior\Timestampable;
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
* @package Qaytmaydi\Backend\Model
*/
class UserGroups extends ModelBase
{
    /**
    * @var int
    */
    protected $id;

    /**
    * @var string
    */
    protected $name;

    /**
    * @var text
    */
    protected $permissions;

    /**
    * @var timestamp
    */
    protected $createdAt;

    /**
    * @var timestamp
    */
    protected $updatedAt;

    /**
    * @var string
    */
    protected $code;

    /**
    * @var text
    */
    protected $description;

    /**
    * @var bool
    */
    protected $isNewUserDefault;

    /**
    * @var bool
    */
    protected $isActivated;

    const SYSTEM_USER = 1;

    public function initialize()
    {
        // Mapping
        $this->setSource("backend_user_groups");

        $this->hasMany(
            'id',
            'Qaytmaydi\Backend\Models\Usersgroups',
            'user_group_id',
            [
                'alias' => 'userGroupId',
                'reusable' => true
            ]
        );

    }

    /**
    * @return int
    */
    public function getId()
    {
        return $this->id;
    }

    /**
    * @param int $id
    */
    public function setId($id)
    {
        $this->id = $id;
    }


    /**
    * @return string
    */
    public function getName()
    {
        return $this->name;
    }

    /**
    * @param string $name
    */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
    * @return text
    */
    public function getPermissions()
    {
        return $this->permissions;
    }

    /**
    * @param text $permissions
    */
    public function setPermissions($permissions)
    {
        $this->$permissions = $permissions;
    }

    /**
    * @return datetime
    */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
    * @param datetime $createdAt
    */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
    * @return datetime
    */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
    * @param datetime $updatedAt
    */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
    * @return varchar
    */
    public function getCode()
    {
        return $this->code;
    }

    /**
    * @param varchar $code
    */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
    * @return text
    */
    public function getDescription()
    {
        return $this->description;
    }

    /**
    * @param text $description
    */
    public function setDescription($description)
    {
        $this->$description = $description;
    }

    /**
    * @return bool $isNewUserDefault
    */
    public function getIsNewUserDefault()
    {
        return $this->isNewUserDefault;
    }

    /**
    * @param bool $isNewUserDefault
    */
    public function setIsNewUserDefault($isNewUserDefault)
    {
        $this->isNewUserDefault = $isNewUserDefault;
    }

    /**
    * @return bool $is_activated
    */
    public function getIsActivated()
    {
        return $this->is_activated;
    }

    /**
    * @param bool $is_activated
    */
    public function setIsActivated($is_activated)
    {
        $this->is_activated = $is_activated;
    }

    /**
    * @param $karma
    */
    public function increaseKarma($karma)
    {
        $this->karma += $karma;
        $this->votes_points += $karma;
    }

    /**
    * @param $karma
    */
    public function decreaseKarma($karma)
    {
        $this->karma -= $karma;
        $this->votes_points -= $karma;
    }

    protected function beforeSave()
    {
        $this->createdAt = date('Y-m-d H:i:s');

        $this->updatedAt = date('Y-m-d H:i:s');
    }

    public function beforeCreate()
    {
        $this->createdAt = date('Y-m-d H:i:s');

    }

    public function beforeUpdate()
    {
        $this->updatedAt = date('Y-m-d H:i:s');
    }


    public function afterValidation()
    {

    }

    public function afterCreate()
    {

    }

    /**
    * @return string
    */
    public function getHumanKarma()
    {
        if ($this->karma >= 1000) {
            return sprintf("%.1f", $this->karma / 1000) . 'k';
        } else {
            return $this->karma;
        }
    }

    /**
    * Independent Column Mapping.key as datebase field, value as application field
    *
    * @return array
    */
    public function columnMap()
    {
        return [
        'id'                   =>  'id',
        'name'                 =>  'name',
        'permissions'          =>  'permissions',
        'created_at'           =>  'createdAt',
        'updated_at'           =>  'updatedAt',
        'code'                 =>  'code',
        'description'          =>  'description',
        'is_new_user_default'  =>  'isNewUserDefault',
        'is_activated'         =>  'isActivated',
        ];
    }

}