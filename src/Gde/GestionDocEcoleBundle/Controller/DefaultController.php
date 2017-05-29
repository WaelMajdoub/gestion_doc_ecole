<?php

namespace Gde\GestionDocEcoleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GdeGestionDocEcoleBundle:Default:index.html.twig');
    }
    public function dbseedAction()
    {
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
        $data .= '  public function load(ObjectManager $manager)'.$cr;
        $data .= "  {".$cr;
        /*
         * Parcours de toutes les tables
         */
        for($i = 0;$i < count($DB_Table); $i++)
        {
            $data .= "      /**".$cr;
            $data .= "      /* ".$DB_Table[$i].$cr;
            $data .= "       */".$cr;
            $data .= "      $".strtolower($DB_Table[$i][0]).strtolower($DB_Table[$i][1]).strtolower($DB_Table[$i][2])."_array = [];".$cr;
            

            /*$repository = $this->getDoctrine()
                                    ->getManager()
                                    ->getRepository('GdeGestionDocEcoleBundle:'.$DB_Table[$i]);
            $qb = $repository->findAll();*/
            
            $em = $this->getDoctrine()->getManager();
            $array = $em->createQuery('select m from GdeGestionDocEcoleBundle:'.$DB_Table[$i].' m')
                        ->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
            for($j = 0;$j < count($array); $j++)
            {
                $data .= "      // ".$array[$j]['id'].$cr;
                $data .= "      $".strtolower($DB_Table[$i][0]).strtolower($DB_Table[$i][1]).strtolower($DB_Table[$i][2])." = new ".$DB_Table[$i]."();".$cr;
                foreach ($array[$j] as $k => $v) 
                {
                    if ($k == 'id')
                    {
                        // Rien faire
                    }
                    else
                    {
                        if (($k[0] == 'i' && $k[1] == 'd') && (strlen($k) >= 5))
                        {
                            // Spécial clé, laravel est plus pratique pour ça...
                            $data .= "      $".strtolower($DB_Table[$i][0]).strtolower($DB_Table[$i][1]).strtolower($DB_Table[$i][2]).'->set'.ucfirst($k).'($'.$k[3].$k[4].$k[5].'_array['.$v.']);'.$cr;
                        }
                        else
                        {
                            if (is_a($v, 'DateTime'))
                            {
                                $data .= "      $".strtolower($DB_Table[$i][0]).strtolower($DB_Table[$i][1]).strtolower($DB_Table[$i][2]).'->set'.ucfirst($k).'(date_create(\''.$v->format('Y-m-d').'\'));'.$cr;
                            }
                            elseif (is_string($v))
                                $data .= "      $".strtolower($DB_Table[$i][0]).strtolower($DB_Table[$i][1]).strtolower($DB_Table[$i][2]).'->set'.ucfirst($k).'(\''.$v.'\');'.$cr;
                            else
                                $data .= "      $".strtolower($DB_Table[$i][0]).strtolower($DB_Table[$i][1]).strtolower($DB_Table[$i][2]).'->set'.ucfirst($k).'('.$v.');'.$cr;
                        }
                    }
                }
                
                
                $data .= '      $manager->persist($'.strtolower($DB_Table[$i][0]).strtolower($DB_Table[$i][1]).strtolower($DB_Table[$i][2]).');'.$cr;
                $data .= '      $manager->flush();'.$cr;
                $data .= '      $'.strtolower($DB_Table[$i][0]).strtolower($DB_Table[$i][1]).strtolower($DB_Table[$i][2]).'_array['.$array[$j]['id'].'] = $'.strtolower($DB_Table[$i][0]).strtolower($DB_Table[$i][1]).strtolower($DB_Table[$i][2]).'->getId();'.$cr;
                
            }
            
    
        }
        $data .= '  }'.$cr;
        $data .= $cr;
        $data .= '  public function getOrder()'.$cr;
        $data .= '  {'.$cr;
            $data .= '      return 1;'.$cr;
        $data .= '  }'.$cr;
        $data .= '}'.$cr;
        $data .= '?>';

        return $this->render('GdeGestionDocEcoleBundle:Default:dbseed.html.twig', 
        [
            'dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR.'src/Gde/DataFixtures/ORM/LoadData.php',
            'result' => $data,
            'array' => $array,
        ]);
    }
}
