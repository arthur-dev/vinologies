<?php
/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 22/02/16
 * Time: 12:01
 */

namespace Vinologie\UtilsBundle\Entity;


use Core\UtilsBundle\Entity\RichResource;
use Vinologie\UserBundle\Entity\User;

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