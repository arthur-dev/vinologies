<?php
/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 18/02/16
 * Time: 17:05
 */

namespace Vinologie\ServiceBundle\Entity;



use Vinologie\UtilsBundle\Entity\Address;
use Vinologie\UtilsBundle\Entity\UserRichResource;


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

    /**
     * @var integer
     */
    protected $maxGuestNumber;

    /**
     * @var integer
     */
    protected $guestNumber;

    public function __construct($user)
    {
        parent::__construct($user);
        $this->guestNumber = 0;
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

    /**
     * @return int
     */
    public function getGuestNumber()
    {
        return $this->guestNumber;
    }

    /**
     * @param int $guestNumber
     */
    public function setGuestNumber($guestNumber)
    {
        $this->guestNumber = $guestNumber;
    }

    /**
     *
     */
    public function addGuest()
    {
        $this->guestNumber++;
    }

    /**
     *
     */
    public function removeGuest()
    {
        $this->guestNumber--;
    }

    /**
     * @return int
     */
    public function getMaxGuestNumber()
    {
        return $this->maxGuestNumber;
    }

    /**
     * @param int $maxGuestNumber
     */
    public function setMaxGuestNumber($maxGuestNumber)
    {
        $this->maxGuestNumber = $maxGuestNumber;
    }


}