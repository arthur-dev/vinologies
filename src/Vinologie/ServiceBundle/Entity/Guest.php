<?php

namespace Vinologie\ServiceBundle\Entity;
use Core\UtilsBundle\Entity\RichResource;
use Vinologie\UserBundle\Entity\User;

/**
 * Guest
 */
class Guest extends RichResource
{

    CONST ASKED = 1;
    CONST ACCEPTED = 2;
    CONST REFUSED = 3;
    CONST CANCELED = 4;

    /**
     * @var int
     */
    protected $state;

    /**
     * @var string
     */
    protected $reason;

    /**
     * @var Degustation
     */
    protected $degustation;

    /**
     * @var User
     */
    protected $guest;

    public function __construct(Degustation $degustation, User $user)
    {
        parent::__construct();
        $this->degustation = $degustation;
        $this->guest = $user;
        $this->state = self::ASKED;
    }

    /**
     * Set state
     *
     * @param integer $state
     *
     * @return Guest
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return int
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set reason
     *
     * @param string $reason
     *
     * @return Guest
     */
    public function setReason($reason)
    {
        $this->reason = $reason;

        return $this;
    }

    /**
     * Get reason
     *
     * @return string
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * @return Degustation
     */
    public function getDegustation()
    {
        return $this->degustation;
    }

    /**
     * @param Degustation $degustation
     */
    public function setDegustation($degustation)
    {
        $this->degustation = $degustation;
    }

    /**
     * @return User
     */
    public function getGuest()
    {
        return $this->guest;
    }

    /**
     * @param User $guest
     */
    public function setGuest($guest)
    {
        $this->guest = $guest;
    }

    /**
     * @return User
     */
    public function getOwner(){
        return $this->getDegustation()->getUser();
    }
}

