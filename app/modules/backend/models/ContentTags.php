<?php
/*
+------------------------------------------------------------------------+
| DragonPHP Website                                                      |
+------------------------------------------------------------------------+
| Copyright (c) 2016-2017 DragonPHP Team (https://www.dragonphp.com)      |
+------------------------------------------------------------------------+
| This source file is subject to the New BSD License that is bundled     |
| with this package in the file LICENSE.txt.                             |
|                                                                        |
| If you did not receive a copy of the license and are unable to         |
| obtain it through the world-wide-web, please send an email             |
| to license@dragonphp.com so we can send you a copy immediately.       |
+------------------------------------------------------------------------+
| Authors: Frank Kennedy Yuan <kideny@gmail.com>                     |
+------------------------------------------------------------------------+
*/

namespace DragonPHP\Backend\Models;

class ContentTags extends ModelBase
{

    /**
     *
     * @var integer
     */
    protected $id;

    /**
     *
     * @var integer
     */
    protected $postsId;

    /**
     *
     * @var integer
     */
    protected $tagsId;

    /**
     * Method to set the value of field id
     *
     * @param  integer $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Method to set the value of field postsId
     *
     * @param  integer $postsId
     * @return $this
     */
    public function setPostsId($postsId)
    {
        $this->postsId = $postsId;

        return $this;
    }

    /**
     * Method to set the value of field tagsId
     *
     * @param  integer $tagsId
     * @return $this
     */
    public function setTagsId($tagsId)
    {
        $this->tagsId = $tagsId;

        return $this;
    }

    /**
     * Returns the value of field id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the value of field postsId
     *
     * @return integer
     */
    public function getPostsId()
    {
        return $this->postsId;
    }

    /**
     * Returns the value of field tagsId
     *
     * @return integer
     */
    public function getTagsId()
    {
        return $this->tagsId;
    }

    /**
     * Initialize method for model.
     */
    public function getSource()
    {
        return 'content_tags';
    }

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id' => 'id',
            'posts_id' => 'postsId',
            'tags_id' => 'tagsId'
        );
    }

    public function initialize()
    {
        $this->belongsTo('postsId', __NAMESPACE__ .'/Posts', 'id', ['alias' => 'post']);
        $this->belongsTo('tagsId', __NAMESPACE__ .'/Tags', 'id', ['alias' => 'tag']);
    }
}
