<?php

/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 20/02/16
 * Time: 20:38
 */

namespace Vinologie\ServiceBundle\TwigExtension;

use Vinologie\ServiceBundle\Entity\Degustation;
use Vinologie\ServiceBundle\Entity\Guest;
use Vinologie\ServiceBundle\Service\GuestListService;

class DegustationTypeExtension  extends \Twig_Extension
{
    /**
     * @var GuestListService
     */
    protected $guestService;

    /**
     * DegustationTypeExtension constructor.
     * @param GuestListService $guestService
     */
    public function __construct( GuestListService $guestService)
    {
        $this->guestService = $guestService;
    }

    /**
     * @return array
     */
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('get_accepted_guest_list', array($this, 'getAcceptedGuestList')),
            new \Twig_SimpleFunction('get_waiting_guest_list', array($this, 'getWaitingGuestList')),
        );
    }


    public function getAcceptedGuestList(Degustation $degustation)
    {
        return $this->guestService->getGuests($degustation,Guest::ACCEPTED);
    }

    public function getWaitingGuestList(Degustation $degustation)
    {
        return $this->guestService->getGuests($degustation,Guest::ASKED);
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'degustation_type_extension';
    }
}