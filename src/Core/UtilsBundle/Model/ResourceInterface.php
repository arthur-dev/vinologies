<?php
/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 18/02/16
 * Time: 12:27
 */

namespace Core\UtilsBundle\Model;

interface ResourceInterface
{
    /**
     * @return string
     */
    public function getUid();

    /**
     * @return array
     */
    public function getEvents();

    /**
     * @return string
     */
    public static function getEntityName();
}