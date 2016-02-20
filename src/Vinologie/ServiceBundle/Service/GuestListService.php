<?php
/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 20/02/16
 * Time: 20:01
 */

namespace Vinologie\ServiceBundle\Service;

use Doctrine\ORM\EntityManager;
use Vinologie\ServiceBundle\Entity\Degustation;
use Vinologie\ServiceBundle\Entity\Guest;

class GuestListService
{

    /**
     * @var EntityManager
     */
    protected $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function getGuests(Degustation $degustation)
    {
        $guests = null;
        $guests = $this->em->getRepository(Guest::getClass())->findByDegustation($degustation);
        if ($guests == null)
        {
            return [];
        }

        $guestList = array();
        foreach($guests as $guest)
        {
            $guestList[] = $guest->getGuest();
        }
        return $guestList;
    }

}