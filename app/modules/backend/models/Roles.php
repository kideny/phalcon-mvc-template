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

use Phalcon\Mvc\Model\Resultset\Simple;

/**
* Phanbook\Models\Roles
*
* @property int    $id
* @property string $name
* @property string $description
* @property string $type
* @property bool   $isSpecial
* @property bool   $isDefault
* @property Simple $users
* @property Access $access
* @method Access getAccess()
* @method Simple getUsers($params = null)
* @method static Roles|false findFirst($params = null)
* @method static Roles|false findFirstByIsDefault(bool $flag)
*
* @package Phanbook\Models
*/
class Roles extends Model
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
    * @var string
    */
    protected $description;

    /**
    * @var string
    */
    protected $type;

    /**
    * @var bool
    */
    protected $isSpecial;

    /**
    * @var bool
    */
    protected $isDefault;

    public function initialize()
    {
        $this->hasManyToMany(
        'id',
        RolesUsers::class,
        'roleId',
        'userId',
        Users::class,
        'id',
        ['alias' => 'users']
        );

        $this->hasOne('id', Access::class, 'roleId', ['alias' => 'access', 'reusable' => true]);
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
    * @return string
    */
    public function getDescription()
    {
        return $this->description;
    }

    /**
    * @param string $description
    */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
    * @return string
    */
    public function getType()
    {
        return $this->type;
    }

    /**
    * @param string $type
    */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
    * @return boolean
    */
    public function getIsSpecial()
    {
        return $this->isSpecial;
    }

    /**
    * @param boolean $isSpecial
    */
    public function setIsSpecial($isSpecial)
    {
        $this->isSpecial = $isSpecial;
    }

    /**
    * @return boolean
    */
    public function getIsDefault()
    {
        return $this->isDefault;
    }

    /**
    * @param boolean $isDefault
    */
    public function setIsDefault($isDefault)
    {
        $this->isDefault = $isDefault;
    }

    /**
    * Independent Column Mapping.
    *
    * @return array
    */
    public function columnMap()
    {
        return [
        'id'          => 'id',
        'name'        => 'name',
        'description' => 'description',
        'type'        => 'type',
        'is_special'  => 'isSpecial',
        'is_default'  => 'isDefault',
        ];
    }
}