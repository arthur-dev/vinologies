<?php
/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 20/02/16
 * Time: 17:08
 */

namespace App\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * Class AccountController
 * @package App\FrontBundle\Controller
 */
class AccountController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/myaccount/dashboard", name="app_front_my_account_dashboard")
     * @Security("has_role('ROLE_USER')")
     */
    public function dashboardAction(Request $request)
    {
        return $this->render('AppFrontBundle:Account:dashboard.html.twig', array(
        ));
    }
}