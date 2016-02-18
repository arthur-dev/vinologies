<?php

namespace Core\UtilsBundle\Entity;
use Core\UtilsBundle\Model\ResourceInterface;

/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 18/02/16
 * Time: 12:25
 */
class Resource implements ResourceInterface
{
    /**
     * Un identifiant unique pour la ressource
     *
     * @var string
     */
    protected $uid;

    /**
     * @return string
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * @return array
     */
    public function getEvents()
    {
        return array();
    }

    /**
     * @return string
     */
    public static function getEntityName()
    {
        return get_called_class();
    }
}