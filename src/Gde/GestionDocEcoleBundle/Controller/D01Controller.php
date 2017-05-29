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

use Gde\GestionDocEcoleBundle\Entity\D01Periode;
use Gde\GestionDocEcoleBundle\Entity\D80Utilisateur;

class D01Controller extends Controller
{
    private $d01;
    private $form;
    /**
     * @name        set_nouveau_form_d01Action()
     * @description Cette fonction permet de préparer le formulaire
     *              Fonction privé pour meilleur lisibilité du code entre les
     *              fonctions publics get_nouveau_form_d01Action() et
     *              post_nouveau_form_d01Action()
     * @return      void
     */
    private function set_nouveau_form_d01Action()
    {
        /*
         * Toutes les saisies se font par l'utilisateur s.bressani@bluewin.ch
         */
        $repository = $this->getDoctrine()
                            ->getManager()
                            ->getRepository('GdeGestionDocEcoleBundle:D80Utilisateur');
        $d80 = $repository->findOneBy(array('email' => 's.bressani@bluewin.ch'));
        /*
         * Préparation de l'enregistrement D01Periode
         */
        $d01 = new D01Periode();
        $d01->setId_d80($d80->getId());
        /*
         * Création d'un formulaire pour D01Periode
         */
        $formBuilder = $this->createFormBuilder($d01);
        $formBuilder->add('nom',        TextType::class)
                    ->add('save',       SubmitType::class);
        $form = $formBuilder->setMethod("POST")
                            ->setAction('nouveau_form_d01_form')->getForm();
        /*
         * Set des variables globale private
         */
        $this->d01 = $d01;
        $this->form = $form;
    }
    /*
     * @name        get_nouveau_form_d01Action()
     * @description GET, Formulaire
     * @return      void
     */
    public function get_nouveau_form_d01Action()
    {
        $this->set_nouveau_form_d01Action();
        return $this->render('GdeGestionDocEcoleBundle:D01:nouveau_form_d01.html.twig',array(
            'sw_edit' => 2,
            'form' => $this->form->createView(),
            'success' => 0,
            'd01' => $this->d01));
    }
    /*
     * @name        post_nouveau_form_d01Action()
     * @description POST, Formulaire, écriture dans D01Periode
     * @return      void
     */
    public function post_nouveau_form_d01Action(Request $request)
    {
        $this->set_nouveau_form_d01Action();
        // Si la requête est en POST
        if ($request->isMethod('POST')) 
        {
            // On fait le lien Requête <-> Formulaire
            // À partir de maintenant, la variable $advert contient les valeurs entrées dans le formulaire par le visiteur
            $this->form->handleRequest($request);

            // On vérifie que les valeurs entrées sont correctes
            // (Nous verrons la validation des objets en détail dans le prochain chapitre)
            if ($this->form->isValid()) 
            {
                $em = $this->getDoctrine()->getManager();
                $em->persist($this->d01);
                $em->flush();

                $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');

                return $this->render('GdeGestionDocEcoleBundle:D01:nouveau_form_d01.html.twig',array(
                    'sw_edit' => 2,
                    'form' => $this->form->createView(),
                    'success' => 1,
                    'd01' => $this->d01));
            }
        }
    }
}
