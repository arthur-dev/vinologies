<?php
/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 18/02/16
 * Time: 13:50
 */

namespace Core\UserBundle\Controller;

use Core\UserBundle\Entity\User;
use Core\UserBundle\Form\UserType;
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
     * @return bool
     * @Route("/login_check", name="login_check")
     */
    public function loginCheckAction(Request $request)
    {
        return true;
        var_dump($request);
        /*
        $this->getDoctrine()->getRepository('VinologieUserBundle:User')->findOneByUsername()
        return $this->redirect($this->generateUrl('app_front_homepage'));
        */
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
            $encoded = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($encoded);
            dump($encoded);

            $this->getDoctrine()->getEntityManager()->persist($user);
            $this->getDoctrine()->getEntityManager()->flush();

            return $this->redirectToRoute('app_front_homepage');
        }

        return $this->render('CoreUserBundle:Security:signup.html.twig', array(
            'form' => $form->createView(),
        ));

    }
}