<?php

namespace Gde\GestionDocEcoleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use JMS\Serializer\SerializerBuilder;

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
        $data .= "//use Doctrine\Common\DataFixtures\AbstractFixture;".$cr;
        $data .= "//use Doctrine\Common\DataFixtures\OrderedFixtureInterface;".$cr;
        $data .= '// Utiliser -> si à refaire => $this->addReference(\'d80-7\', $d80);'.$cr;
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
        $data .= "//class LoadD00Data extends AbstractFixture implements OrderedFixtureInterface".$cr;
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
            /* ANCIENE METHODE
            $em = $this->getDoctrine()->getManager();
            $array = $em->createQuery('select m from GdeGestionDocEcoleBundle:'.$DB_Table[$i].' m')
                        ->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
             * FIN ANCIENNE METHODE
             */
            
            $em = $this->get('doctrine')->getManager();
            // array avec entite
            $array = $this->get('doctrine')->getRepository('GdeGestionDocEcoleBundle:'.$DB_Table[$i])->findAll();
            // entité vers json
            $serializer = SerializerBuilder::create()->build();
            // json vers array pure sans entité
            $array = json_decode($serializer->serialize($array, 'json'), true);
            
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
                        //$data .= 'd = '.$k[0].' strlen = '.strlen($k).$cr;
                        if (($k[0] == 'd' && is_numeric($k[1]) && is_numeric($k[2])) && (strlen($k) == 3))
                        {
                            //$data .= "### ".$k.$cr;
                            // Spécial clé, laravel est plus pratique pour ça...
                            $data .= "      $".strtolower($DB_Table[$i][0]).strtolower($DB_Table[$i][1]).strtolower($DB_Table[$i][2]).'->set'.ucfirst($k).'($'.$k.'_array['.$v['id'].']);'.$cr;//'->set'.ucfirst($k).'($'.$k[3].$k[4].$k[5].'_array['.$v.']);'.$cr;
                        }
                        else
                        {
                            /*if (is_a($v, 'DateTime'))
                            {
                                $data .= "      $".strtolower($DB_Table[$i][0]).strtolower($DB_Table[$i][1]).strtolower($DB_Table[$i][2]).'->set'.ucfirst($k).'(date_create(\''.$v->format('Y-m-d').'\'));'.$cr;
                            }*/
                            // Pour cet application ce test est suffisant, je n'ai qu'un champ date
                            if (ucfirst($k) == 'Date')
                            {
                                $data .= "      $".strtolower($DB_Table[$i][0]).strtolower($DB_Table[$i][1]).strtolower($DB_Table[$i][2]).'->set'.ucfirst($k).'(date_create(\''.$v.'\'));'.$cr;
                            }
                            elseif (is_string($v))
                                $data .= "      $".strtolower($DB_Table[$i][0]).strtolower($DB_Table[$i][1]).strtolower($DB_Table[$i][2]).'->set'.ucfirst($k).'(\''.addslashes ($v).'\');'.$cr;
                            elseif (is_array($v))
                            {
                                //$d80->setRoles(array('ROLE_USER'));
                                $data .= "      $".strtolower($DB_Table[$i][0]).strtolower($DB_Table[$i][1]).strtolower($DB_Table[$i][2]).'->set'.ucfirst($k).'(array(\'ROLE_USER\'));'.$cr;
                            }
                            else
                                $data .= "      $".strtolower($DB_Table[$i][0]).strtolower($DB_Table[$i][1]).strtolower($DB_Table[$i][2]).'->set'.ucfirst($k).'('.$v.');'.$cr;
                        }
                    }
                }
                
                
                $data .= '      $manager->persist($'.strtolower($DB_Table[$i][0]).strtolower($DB_Table[$i][1]).strtolower($DB_Table[$i][2]).');'.$cr;
                $data .= '      $manager->flush();'.$cr;
                $data .= '      $'.strtolower($DB_Table[$i][0]).strtolower($DB_Table[$i][1]).strtolower($DB_Table[$i][2]).'_array['.$array[$j]['id'].'] = $'.strtolower($DB_Table[$i][0]).strtolower($DB_Table[$i][1]).strtolower($DB_Table[$i][2]).';'.$cr;
                
            }
            
    
        }
        $data .= '  }'.$cr;
        $data .= $cr;
        $data .= '//  public function getOrder()'.$cr;
        $data .= '//  {'.$cr;
            $data .= '//      return 1;'.$cr;
        $data .= '//  }'.$cr;
        $data .= '}'.$cr;
        $data .= '?>';

        return $this->render('GdeGestionDocEcoleBundle:Default:dbseed.html.twig', 
        [
            'dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR.'src/Gde/DataFixtures/ORM/LoadData.php',
            'result' => $data,
            'array' => $array,
        ]);
    }
    
    
    public function debugAction()
    {
        $DB_Table = array(  "D80Utilisateur",
                            "D01Periode", 
                            "D02Branche", 
                            "D03Type", 
                            "D04Document");
        $var = "";
        $var2 = "";
        $var3 = "";
        $cr = "\n";
        for($i = 0;$i < count($DB_Table); $i++)
        {
            /*$repository = $this->getDoctrine()
                                    ->getManager()
                                    ->getRepository('GdeGestionDocEcoleBundle:'.$DB_Table[$i]);
            $qb = $repository->findAll();*/
            
            $em = $this->getDoctrine()->getManager();
            $array = $em->createQuery('select m from GdeGestionDocEcoleBundle:'.$DB_Table[$i].' m')
                        ->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
            for($j = 0;$j < count($array); $j++)
            {
                foreach ($array[$j] as $k => $v) 
                {
                    $var .= $k.$cr;
                }
            }
            $table_array = [];
            
            $em = $this->get('doctrine')->getManager();
            $table = $this->get('doctrine')->getRepository('GdeGestionDocEcoleBundle:'.$DB_Table[$i])->findAll();
            
            // entité vers json
            $serializer = SerializerBuilder::create()->build();
            // json vers array
            $table_array = json_decode($serializer->serialize($table, 'json'), true);
            
            for($j = 0;$j < count($table_array); $j++)
            {
                foreach ($table_array[$j] as $k => $v) 
                {
                    $var2 .= $k.$cr;
                }
            }
            
            // 3
            
            $json = json_encode($table);
            $var3_array = json_decode($json, true);

            /*$json = json_encode(
                        array(  $d04->pdf, 
                                $d04->texte));
            $d04_array = json_decode($json, true);*/
            
            /*
            // entité vers json
            $serializer = $this->get('jms_serializer');
            $response = $serializer->serialize($d04,'json');
            // json vers array
            //$d04_array = json_decode($response, true);
            
            */
            for($j = 0;$j < count($table_array); $j++)
            {
                foreach ($var3_array[$j] as $k => $v) 
                {
                    $var3 .= $k.$cr;
                }
            }

            
        }

        return $this->render('GdeGestionDocEcoleBundle:Debug:debug.html.twig', 
        [
            'array' => $array,
            'var' => $var,
            'd04' => $table_array,
            'var2' => $var2,
            'a3' => $var3_array,
            'v3' => $var3,
        ]);
    }
    
    
    
}
