<?php

/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 20/02/16
 * Time: 18:53
 */

namespace Vinologie\ServiceBundle\Service;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpKernel\Debug\TraceableEventDispatcher;
use Vinologie\ServiceBundle\Entity\Degustation;
use Vinologie\ServiceBundle\Entity\Guest;
use Vinologie\UserBundle\Entity\User;

class DegustationSubscriptionService
{
    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * @var EventDispatcher
     */
    protected $ed;

    public function __construct(EntityManager $em, TraceableEventDispatcher $ed)
    {
        $this->em = $em;
        $this->ed = $ed;
    }

    /**
     * @param Degustation $degustation
     * @param User $user
     * @return bool
     */
    public function askForDegustationSubscription(Degustation $degustation,User $user)
    {
        if ($this->hasFreeSpace($degustation))
        {
            //todo verifier que ce user n'est pas deja inscrit
            $guest= new Guest($degustation,$user);
            $this->em->persist($guest);
            $this->em->flush();
            //todo notify owner that he got a new demand
            //todo throw event
            return true;
        }
        return false;
    }

    /**
     * @param Guest $guest
     * @param bool $response
     * @param null $reason
     * @return bool
     */
   public function respondToDegustationSubscription(Guest $guest,$response , $reason)
   {
       //todo security check ? is the user the owner ?
       // the owner want to accept the demand
       if ($response)
       {
           if ($this->hasFreeSpace($guest->getDegustation()))
           {
               $guest->setState(Guest::ACCEPTED);
               $guest->getDegustation()->setGuestNumber($guest->getDegustation()->getGuestNumber() + 1);
               $this->em->flush();
               //todo notify guest user that his demand has been accepted
           }
           else
           {
               $guest->setState(Guest::REFUSED);
               $this->em->flush();
               return false;
               //todo notify guest user that his demand has been rejected
               // todo with autpmatic reason => not enougth place
           }
       }
       // the owner want to reject the demand
       else
       {
           $guest->setState(Guest::REFUSED);
           if ($reason == null)
           {
               $guest->setReason('Plus de place, désolé..');
           }
           else
           {
               $guest->setReason($reason);
           }
           $this->em->flush();
           //todo notify guest user that his demand has been rejected
       }
       return true;
   }

    /**
     * @param Guest $guest
     * @return bool
     */
    public function cancelDegustationSubscription(Guest $guest, $reason)
    {
        //todo security check ? is the user the owner ?
        $guest->setState(Guest::CANCELED);
        $guest->getDegustation()->setGuestNumber($guest->getDegustation()->getGuestNumber() - 1);
        $guest->setReason($reason);
        //todo notify the user that his demand has been canceled

        return true;
    }

    /**
     * @param Degustation $degustation
     * @return bool
     */
    public function hasFreeSpace(Degustation $degustation)
    {
        if ($degustation->getGuestNumber() < $degustation->getMaxGuestNumber())
            return true;
        else
            return false;
    }
}