<?php

namespace Gde\SecurityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Gde\SecurityBundle\Controller\Response;

class SecurityController extends Controller
{
    /**
     * Login
     * @param Request $request
     * @return Response
     * ou
     * @return twig
     */
    public function loginAction(Request $request)
    {
        // Si le visiteur est déjà identifié, on le redirige vers l'accueil
        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) 
        {
            return new Response('Utilisateur déjà identité, retour a la page d\'avant');
            //return $this->redirectToRoute('oc_platform_accueil');
        }

        // Le service authentication_utils permet de récupérer le nom d'utilisateur
        // et l'erreur dans le cas où le formulaire a déjà été soumis mais était invalide
        // (mauvais mot de passe par exemple)
        $authenticationUtils = $this->get('security.authentication_utils');

        return $this->render('GdeSecurityBundle:Security:login.html.twig', array(
          'last_email'  => $authenticationUtils->getLastUsername(),
          'error'       => $authenticationUtils->getLastAuthenticationError(),
        ));
    }
    /**
     * Check du login
     * @param Request $request
     * @return Response
     */
    /*
    public function login_checkAction(Request $request)
    {
        /*
         * Je simplifie le login, car pour ce projet je n'ai pas besoin d'avoir
         * beaucoup d'utilisateur dans la base de donnée, car je fais avant tout
         * ce site web pour un usage à ma personne
         * 
         * C'est domage qu'il n'y a pas une auto-génération comme pour laravel
         * 
         * Pour l'encryption du mot de passe, je peux m'inspire de ma projet sur
         * les recettes de cuisine
         */
        /*
         * Toutes les saisies se font par l'utilisateur s.bressani@bluewin.ch
         *
        if ($request->isMethod('POST')) 
        {
            $repository = $this->getDoctrine()
                                ->getManager()
                                ->getRepository('GdeGestionDocEcoleBundle:D80Utilisateur');
            $d80 = $repository->findOneBy(array('email' => $_POST['_email'],
                                                'password' => $_POST['_password']));
            return $this->render('GdeSecurityBundle:Security:debug.html.twig', array(
              'request' => $d80));
        }
        else
        {
            return $this->render('GdeSecurityBundle:Security:debug.html.twig', array(
              'request' => $request
            ));
        }
    }*/
}
?>