<?php

namespace Gde\GestionDocEcoleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

//use Symfony\Component\Form\Extension\Core\Type\IntegerType;
//use Symfony\Component\Form\Extension\Core\Type\TextType;

use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

use Symfony\Component\HttpFoundation\Request;

use Gde\GestionDocEcoleBundle\Entity\D03Type;
use Gde\GestionDocEcoleBundle\Entity\D80Utilisateur;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

use Gde\GestionDocEcoleBundle\ClasseDivers\SortArrayClasseDivers;


class D03Controller extends Controller
{
    /**
     * @name        nouveau_form_d03Action()
     * @param       Request $request
     * @return      void
     */
    public function nouveau_form_d03Action(Request $request)
    {
        /*
         * Toutes les saisies se font par l'utilisateur s.bressani@bluewin.ch
         */
        $repository = $this->getDoctrine()
                            ->getManager()
                            ->getRepository('GdeGestionDocEcoleBundle:D80Utilisateur');
        $d80 = $repository->findOneBy(array('email' => 's.bressani@bluewin.ch'));
        /*
         * Préparation de l'enregistrement D03Type
         */
        $d03 = new D03Type();
        $d03->setId_d80($d80->getId());
        /*
         * Création d'un formulaire pour D03Type
         */
        $formBuilder = $this->createFormBuilder($d03);
        $formBuilder->add('nom',        TextType::class)
                    ->add('save',       SubmitType::class);
        $form = $formBuilder->setMethod("POST")
                            ->setAction('nouveau_form_d03')->getForm();
        // Si la requête est en POST
        if ($request->isMethod('POST')) 
        {
            // On fait le lien Requête <-> Formulaire
            // À partir de maintenant, la variable $advert contient les valeurs entrées dans le formulaire par le visiteur
            $form->handleRequest($request);

            // On vérifie que les valeurs entrées sont correctes
            // (Nous verrons la validation des objets en détail dans le prochain chapitre)
            if ($form->isValid()) 
            {
                $em = $this->getDoctrine()->getManager();
                $em->persist($d03);
                $em->flush();

                $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');

                return $this->render('GdeGestionDocEcoleBundle:D03:nouveau_form_d03.html.twig',array(
                    'sw_edit' => 2,
                    'form' => $form->createView(),
                    'success' => 1,
                    'd03' => $d03));
            }
        }
        else
        {
            return $this->render('GdeGestionDocEcoleBundle:D03:nouveau_form_d03.html.twig',array(
                'sw_edit' => 2,
                'form' => $form->createView(),
                'success' => 0,
                'd03' => $d03));
        }
    }
    /**
     * @name        table_d03Action()
     * @return      twig
     */
    public function table_d03Action()
    {
        return $this->render('GdeGestionDocEcoleBundle:D03:table_d03.html.twig');
    }
    /**
     * @name    table_d03_jsonAction()
     * @param   $sort
     * @param   $sens
     * @return  json
     */
    public function table_d03_jsonAction($sort,$sens)
    {
        // Chargement de l'entité
        $em = $this->get('doctrine')->getManager();
        $users = $this->get('doctrine')->getRepository('GdeGestionDocEcoleBundle:D03Type')->findAll();
        // Serialisation de l'entité vers Json
        $serializer = $this->get('jms_serializer');
        $response = $serializer->serialize($users,'json');
        // Passage du json en array php pure pour utiliser la classe 
        // SortArrayClasseDivers
        $var = json_decode($response, true);
        $array['data'] = $var;
        switch ($sort)
        {
            case 'id':
                $sort_array = new SortArrayClasseDivers($array,'id');
                break;
            case 'nom':
                $sort_array = new SortArrayClasseDivers($array,'nom');
                break;
            default:
                $sort_array = new SortArrayClasseDivers($array,'id');
                break; 
        }
        if($sens == 'asc')
            $array = $sort_array->getSortAscStr();
        else
            $array = $sort_array->getSortDescStr();
        $response = json_encode($array);
        return new Response($response);
        //return $this->render('GdeGestionDocEcoleBundle:Debug:vardump.html.twig',array('var' => $array));
    }
    /**
     * @name    delete_row_d03_jsonAction()
     * @param   $id
     * @return json
     */
    public function delete_row_d03_jsonAction($id)
    {
        /*
         * Chargement de l'entité avec la methode find sur la clé principale
         */
        $em = $this->getDoctrine()->getEntityManager();
        $users = $em->getRepository('GdeGestionDocEcoleBundle:D03Type')->find($id);
        if (!$users) {
            throw $this->createNotFoundException('No guest found for id '.$id);
        }
        $em->remove($users);
        $em->flush();
        /*
         * Serialisation de l'entité vers Json
         */
        $serializer = $this->get('jms_serializer');
        $response = $serializer->serialize($users,'json');
        /*
         *  Passage du json en array php
         */
        $var = json_decode($response, true);
        $var['id'] = $id;
        $array['data'] = $var;
        /*
         * Reponse en json
         */
        $response = json_encode($array);
        return new Response($response);
    }
}