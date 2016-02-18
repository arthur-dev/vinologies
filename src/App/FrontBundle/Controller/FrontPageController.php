<?php

namespace App\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class FrontPageController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/", name="app_front_homepage")
     */
    public function homePageAction()
    {
        return $this->render('AppFrontBundle:Front:Homepage.html.twig');
    }
}
