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

            return $this->redirectToRoute('app_front_my_account_dashboard');
        }

        return $this->render('AppFrontBundle:Degustation:add.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/degustation/seemydegustation", name="app_front_degustation_see_mine")
     * @Security("has_role('ROLE_USER')")
     */
    public function seeMyDegustationAction(Request $request)
    {
        $degustations = null;
        $degustations = $this->getDoctrine()->getRepository(Degustation::getClass())->findByCreatedBy($this->getUser());

        return $this->render('AppFrontBundle:Degustation:see_mine.html.twig', array(
            'degustations'=>$degustations
        ));
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/degustation/subscribe/{uid}", name="app_front_degustation_subscribe")
     * @Security("has_role('ROLE_USER')")
     */
    public function subscribeToDegustation(Request $request ,Degustation $degustation)
    {
        $this->get('vinologie_service_degustation_subscription')->askForDegustationSubscription( $degustation ,$this->getUser());
        return $this->redirectToRoute('app_front_homepage');
    }
}