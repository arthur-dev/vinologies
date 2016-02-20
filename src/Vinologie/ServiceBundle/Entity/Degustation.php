<?php
/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 18/02/16
 * Time: 17:05
 */

namespace Vinologie\ServiceBundle\Entity;


use Core\UtilsBundle\Entity\UserRichResource;
use Vinologie\UtilsBundle\Entity\Address;


class Degustation extends UserRichResource
{
    /**
     * @var Address
     */
    protected $address;

    /**
     * @var \Datetime
     */
    protected $hours;

    /**
     * @var string
     */
    protected $description;

    public function __construct($user)
    {
        parent::__construct($user);
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
     * @return Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param Address $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return \Datetime@
     */
    public function getHours()
    {
        return $this->hours;
    }

    /**
     * @param \Datetime $hours
     */
    public function setHours($hours)
    {
        $this->hours = $hours;
    }

}