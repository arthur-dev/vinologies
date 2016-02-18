<?php
/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 18/02/16
 * Time: 17:55
 */

namespace App\FrontBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Vinologie\ServiceBundle\Entity\Degustation;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Vinologie\ServiceBundle\Form\DegustationType;


class DegustationController extends Controller
{

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/degustation/ajouter", name="app_front_degustation_add")
     * @Security("has_role('ROLE_USER')")
     */
    public function addDegustationAction(Request $request)
    {


        $degustation = new Degustation($this->getUser());

        $form = $this->createForm(DegustationType::class, $degustation);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $this->getDoctrine()->getEntityManager()->persist($degustation);
            $this->getDoctrine()->getEntityManager()->persist($degustation->getAddress());
            $this->getDoctrine()->getEntityManager()->flush();

            return $this->redirectToRoute('app_front_homepage');
        }

        return $this->render('AppFrontBundle:Degustation:add.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}