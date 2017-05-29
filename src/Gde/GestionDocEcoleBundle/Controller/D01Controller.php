<?php

namespace Gde\GestionDocEcoleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class D01Controller extends Controller
{
    public function nouveau_form_d01Action()
    {
        return $this->render('GdeGestionDocEcoleBundle:D01:nouveau_form_d01.html.twig');
    }
}
