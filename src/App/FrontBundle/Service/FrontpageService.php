<?php

/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 20/02/16
 * Time: 20:12
 */

namespace App\FrontBundle\Service;

use Doctrine\ORM\EntityManager;
use Vinologie\ServiceBundle\Entity\Degustation;

class FrontpageService
{
    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * FrontpageService constructor.
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function getHighlightedDegustation()
    {
        $now = new \Datetime('now');
        // get 3 degustation ordonnée par date
       return $this->em->getRepository(Degustation::getClass())->findBy(array(),array('hours'=>'DESC'),3);
    }
}