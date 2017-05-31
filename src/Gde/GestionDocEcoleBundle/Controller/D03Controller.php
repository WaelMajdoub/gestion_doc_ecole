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

use JMS\Serializer\SerializerBuilder;

class D03Controller extends Controller
{
    /**
     * Nouvelle saisie
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
        $d03->setD80($d80);
        /*
         * Création d'un formulaire pour D03Type
         */
        $formBuilder = $this->createFormBuilder($d03);
        $formBuilder->add('nom',        TextType::class)
                    ->add('save',       SubmitType::class);
        $form = $formBuilder->setMethod("POST")
                            ->setAction('nouveau_form_d03')->getForm();
        /*
         * Test s'il y a une requete de type post
         */
        if ($request->isMethod('POST')) 
        {
            $form->handleRequest($request);
            if ($form->isValid()) 
            {
                $em = $this->getDoctrine()->getManager();
                $em->persist($d03);
                $em->flush();
                $request->getSession()->getFlashBag()->add('notice', 'Enregistrement avec succès.');
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
     * Affiche la table
     * @return      twig
     */
    public function table_d03Action()
    {
        return $this->render('GdeGestionDocEcoleBundle:D03:table_d03.html.twig');
    }
    /**
     * Prépare un fichier json de la table, trié par les paramètres d'entrée
     * @param   $sort   Champs à trier
     * @param   $sens   Sens du tri
     * @return  json
     */
    public function table_d03_jsonAction($sort,$sens)
    {
        // Chargement de l'entité
        $em = $this->get('doctrine')->getManager();
        $table = $this->get('doctrine')->getRepository('GdeGestionDocEcoleBundle:D03Type')->findAll();
        // Entité vers Json
        $json = json_encode($table);
        // Json vers array
        $array['data'] = json_decode($json, true);
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
    }
    /**
     * Efface un champ de la table d01 par une methode find() sur la clé
     * @param   $id
     * @return json
     */
    public function delete_row_d03_jsonAction($id)
    {
        /*
         * Chargement de l'entité avec la methode find sur la clé principale
         */
        $em = $this->getDoctrine()->getEntityManager();
        $table = $em->getRepository('GdeGestionDocEcoleBundle:D03Type')->find($id);
        if (!$table) 
        {
            throw $this->createNotFoundException('Impossible d\'effacer dans d03 l\'id '.$id);
        }
        $em->remove($table);
        $em->flush();
        /*
         * Serialisation de l'entité vers Json
         */
        $serializer = SerializerBuilder::create()->build();
        $response = $serializer->serialize($table,'json');
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