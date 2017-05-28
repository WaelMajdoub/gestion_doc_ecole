<?php

namespace Gde\GestionDocEcoleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
// Pour les types doctrine
use Doctrine\Common\Annotations\AnnotationReader;

// Pour le querybuilder
use Gde\GestionDocEcoleBundle\Repository\D80UtilisateurRepository;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GdeGestionDocEcoleBundle:Default:index.html.twig');
    }
    public function dbseedAction()
    {
        
       
        
        
        /*
        //$d80 = $this->getDoctrine()->getRepository('GdeGestionDocEcoleBundle:D80Utilisateur')->findAll();
        //$d01 = $this->getDoctrine()->getRepository('GdeGestionDocEcoleBundle:D01Periode')->findAll();
        //$d02 = $this->getDoctrine()->getRepository('GdeGestionDocEcoleBundle:D02Branche')->findAll();
        //$d03 = $this->getDoctrine()->getRepository('GdeGestionDocEcoleBundle:D03Type')->findAll();
        //$d04 = $this->getDoctrine()->getRepository('GdeGestionDocEcoleBundle:D04Document')->findAll();*/
        $DB_Table = array(  "D80Utilisateur",
                            "D01Periode", 
                            "D02Branche", 
                            "D03Type", 
                            "D04Document");
        $cr = "\n";
        $data = "<?php".$cr;
        $data .= "".$cr;
        $data .= "namespace AppBundle\DataFixtures\ORM;".$cr;
        $data .= "".$cr;
        $data .= "use Doctrine\Common\DataFixtures\FixtureInterface;".$cr;
        $data .= "use Doctrine\Common\Persistence\ObjectManager;".$cr;
        /*
         * Parcours de toutes les tables
         */
        for($i = 0;$i < count($DB_Table); $i++)
        {
            $data .= "use Gde\GestionDocEcoleBundle\Entity\\".$DB_Table[$i].";".$cr;
        }
        $data .= "".$cr;
        $data .= "class LoadD00Data implements FixtureInterface".$cr;
        $data .= "{".$cr;
        $data .= '  public function load(ObjectManager $manager'.$cr;
        $data .= "  {".$cr;
        /*
         * Parcours de toutes les tables
         */
        for($i = 0;$i < count($DB_Table); $i++)
        {
            $data .= "  /**".$cr;
            $data .= "  /* ".$DB_Table[$i].$cr;
            $data .= "   */".$cr;
            $data .= "  ".$DB_Table[$i]."_array = []".$cr;
            

            /*$repository = $this->getDoctrine()
                                    ->getManager()
                                    ->getRepository('GdeGestionDocEcoleBundle:'.$DB_Table[$i]);
            $qb = $repository->findAll();*/
            
            $em = $this->getDoctrine()->getManager();
            $array = $em->createQuery('select m from GdeGestionDocEcoleBundle:'.$DB_Table[$i].' m')
                        ->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
            for($j = 0;$j < count($array); $j++)
            {
                $data .= "  // ".$array[$j]['id'].$cr;
                $data .= "  ".$DB_Table[$i]." = new ".$DB_Table[$i]."();".$cr;
                foreach ($array[$j] as $k => $v) 
                {
                    if ($k == 'id')
                    {
                        // Rien faire
                    }
                    else
                    {
                        if (is_a($v, 'DateTime'))
                        {
                          // true
                        }
                        elseif (is_string($v))
                            $data .= "  ".$DB_Table[$i].'->set'.ucfirst($k).'(\''.$v.'\');'.$cr;
                        else
                            $data .= "  ".$DB_Table[$i].'->set'.ucfirst($k).'('.$v.');'.$cr;
                    }
                }
                
            }
            
    
        }
        /**
         * D80Utilisateur
         *
        $d80_array = [];
        // 1
        $d80 = new D80Utilisateur();
        $d80->setUser('Stéphane');
        $d80->setEmail('s.bressani@bluewin.ch');
        $d80->setPassword('awesome');
        $d80->setPhoto('null');
        $manager->persist($d80);
        $manager->flush();
        $d80_array[1] = $d80->getId();
        */
        
        
        

        
        return $this->render('GdeGestionDocEcoleBundle:Default:dbseed.html.twig', 
        [
            'dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR.'src/Gde/DataFixtures/ORM/LoadData.php',
            'result' => $data,
            'array' => $array,
        ]);
    }
}
