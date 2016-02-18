<?php
/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 18/02/16
 * Time: 15:21
 */

namespace Vinologie\UserBundle\Controller;

use Core\UserBundle\CoreUserBundle;
use Core\UtilsBundle\Event\ResourceEvent;
use Vinologie\UserBundle\Entity\User;
use Vinologie\UserBundle\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security as SC;

class SecurityController extends Controller
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request)
    {
        $session = $request->getSession();

        if ($request->attributes->has(SC::AUTHENTICATION_ERROR))
        {
            $error = $request->attributes->get(SC::AUTHENTICATION_ERROR);
        }
        else
        {
            $error = $session->get(SC::AUTHENTICATION_ERROR);
            $session->remove(SC::AUTHENTICATION_ERROR);
        }

        return $this->render('CoreUserBundle:Security:login.html.twig',array(
            'last_pseudo'=> $session->get(SC::LAST_USERNAME),
            'error'=> $error,
        ));
    }


    /**
     * @param Request $request
     * @Route("/signup", name="signup")
     */
    public function signUpAction(Request $request)
    {

        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            //$this->getDoctrine()->getRepository('CoreUserBundle:User');

            $encoder = $this->get('security.password_encoder');
            $encoded = $encoder->encodePassword($user, $user->getPlainPassword());

            $user->setPassword($encoded);
            $user->addRole('ROLE_USER');

            $this->getDoctrine()->getEntityManager()->persist($user);
            $this->getDoctrine()->getEntityManager()->flush();

            $event = new ResourceEvent($user);
            $this->get('event_dispatcher')->dispatch(CoreUserBundle::USER_CREATED, $event);

            return $this->redirectToRoute('app_front_homepage');
        }

        return $this->render('CoreUserBundle:Security:signup.html.twig', array(
            'form' => $form->createView(),
        ));

    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/login_check", name="login_check")
     */
    public function logincheckAction(Request $request)
    {
        throw new \Exception('salut');
    }
}