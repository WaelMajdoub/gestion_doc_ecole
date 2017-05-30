<?php

namespace Gde\GestionDocEcoleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use Symfony\Component\HttpFoundation\Request;

use Gde\GestionDocEcoleBundle\Entity\D04Document;
use Gde\GestionDocEcoleBundle\Entity\D80Utilisateur;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

use Gde\GestionDocEcoleBundle\ClasseDivers\SortArrayClasseDivers;
use Gde\GestionDocEcoleBundle\ClasseDivers\PrepareArrayChoiseTypeSimpleClasseDivers;

use JMS\Serializer\SerializerBuilder;

class D04Controller extends Controller
{
    /**
     * @name        nouveau_form_d04Action()
     * @param       Request $request
     * @return      void
     */
    public function nouveau_form_d04Action(Request $request)
    {
        /*
         * Toutes les saisies se font par l'utilisateur s.bressani@bluewin.ch
         */
        $repository = $this->getDoctrine()
                            ->getManager()
                            ->getRepository('GdeGestionDocEcoleBundle:D80Utilisateur');
        $d80 = $repository->findOneBy(array('email' => 's.bressani@bluewin.ch'));
        /*
         * Préparation de l'enregistrement D04Document
         */
        $d04 = new D04Document();
        $d04->setD80($d80);
        /*
         * Préparation du tableau de ChoiceType
         */
        $em = $this->getDoctrine()->getManager();
        // TypeChoices pour D01Periode
        $table = $em->getRepository('GdeGestionDocEcoleBundle:D01Periode')->findAll();
        $array_ct_d01 = new PrepareArrayChoiseTypeSimpleClasseDivers($table,'id','nom');
        // TypeChoices pour D02Branche
        $table = $em->getRepository('GdeGestionDocEcoleBundle:D02Branche')->findAll();
        $array_ct_d02 = new PrepareArrayChoiseTypeSimpleClasseDivers($table,'id','nom');
        // TypeChoices pour D03Type
        $table = $em->getRepository('GdeGestionDocEcoleBundle:D03Type')->findAll();
        $array_ct_d03 = new PrepareArrayChoiseTypeSimpleClasseDivers($table,'id','nom');
        /*
         * Création d'un formulaire pour D04Document
         */
        $formBuilder = $this->createFormBuilder($d04);
        $formBuilder->add('d01',    ChoiceType::class,array('label' => 'select some colors',
                                                'multiple' => false,
                                                'choices' => $array_ct_d01->getArray(),
                                                'attr'=>array('style'=>'', 'customattr'=>'customdata'),
                                                'data'=> 1))
                    ->add('d02',    ChoiceType::class,array('label' => 'select some colors',
                                                'multiple' => false,
                                                'choices' => $array_ct_d02->getArray(),
                                                'attr'=>array('style'=>'', 'customattr'=>'customdata'),
                                                'data'=> 1))
                    ->add('d03',    ChoiceType::class,array('label' => 'select some colors',
                                                'multiple' => false,
                                                'choices' => $array_ct_d03->getArray(),
                                                'attr'=>array('style'=>'', 'customattr'=>'customdata'),
                                                'data'=> 1))
                    //->add('date',   DateType::class)
                    ->add('date', DateType::class, array(
                                                'widget' => 'single_text',
                                                // do not render as type="date", to avoid HTML5 date pickers
                                                'html5' => false,
                                                // add a class that can be selected in JavaScript
                                                'attr' => ['class' => 'datepicker'],
                    ))
                    ->add('texte',  TextType::class)
                    ->add('pdf',    TextType::class)
                    ->add('save',   SubmitType::class);
        $form = $formBuilder->setMethod("POST")
                            ->setAction('nouveau_form_d04')->getForm();
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
                $em->persist($d04);
                $em->flush();

                $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');

                return $this->render('GdeGestionDocEcoleBundle:D04:nouveau_form_d04.html.twig',array(
                    'sw_edit' => 2,
                    'form' => $form->createView(),
                    'success' => 1,
                    'd04' => $d04));
            }
        }
        else
        {
            return $this->render('GdeGestionDocEcoleBundle:D04:nouveau_form_d04.html.twig',array(
                'sw_edit' => 2,
                'form' => $form->createView(),
                'success' => 0,
                'd04' => $d04));
        }
    }
    /**
     * @name        table_d04Action()
     * @return      twig
     */
    public function table_d04Action()
    {
        return $this->render('GdeGestionDocEcoleBundle:D04:table_d04.html.twig');
    }
    /**
     * @name    table_d04_jsonAction()
     * @param   $sort
     * @param   $sens
     * @return  json
     */
    public function table_d04_jsonAction($sort,$sens)
    {
        // Chargement de l'entité
        $em = $this->get('doctrine')->getManager();
        $table = $this->get('doctrine')->getRepository('GdeGestionDocEcoleBundle:D04Document')->findAll();
        // Serialisation de l'entité vers Json
        $json = json_encode($table);
        // Passage du json en array php pure pour utiliser la classe 
        $array['data'] = json_decode($json, true);
        switch ($sort)
        {
            case 'id':
                $sort_array = new SortArrayClasseDivers($array,'id');
                break;
            case 'd01':
                $sort_array = new SortArrayClasseDivers($array,'d01');
                break;
            case 'd02':
                $sort_array = new SortArrayClasseDivers($array,'d02');
                break;
            case 'd03':
                $sort_array = new SortArrayClasseDivers($array,'d03');
                break;
            case 'date':
                $sort_array = new SortArrayClasseDivers($array,'date');
                break;
            case 'pdf':
                $sort_array = new SortArrayClasseDivers($array,'pdf');
                break;
            case 'texte':
                $sort_array = new SortArrayClasseDivers($array,'texte');
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
     * @name    delete_row_d04_jsonAction()
     * @param   $id
     * @return json
     */
    public function delete_row_d04_jsonAction($id)
    {
        /*
         * Chargement de l'entité avec la methode find sur la clé principale
         */
        $em = $this->getDoctrine()->getEntityManager();
        $table = $em->getRepository('GdeGestionDocEcoleBundle:D04Document')->find($id);
        if (!$table) {
            throw $this->createNotFoundException('No guest found for id '.$id);
        }
        $em->remove($table);
        $em->flush();
        /*
         * Serialisation de l'entité vers Json
         */
        /* ANCIENE METHODE
        $serializer = $this->get('jms_serializer');
         */
        /* NOUVELLE METHODE */
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