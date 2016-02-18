<?php
/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 18/02/16
 * Time: 17:26
 */

namespace Core\UtilsBundle\Entity;


use Core\UserBundle\Entity\User;

class UserRichResource extends RichResource
{
    /**
     * @var User
     */
    protected $createdBy;

    public function __construct($user)
    {
        parent::__construct();
        $this->createdBy=$user;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->createdBy;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->createdBy = $user;
    }


}