<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Gde\GestionDocEcoleBundle\Entity\D01Periode;
use Gde\GestionDocEcoleBundle\Entity\D02Branche;
use Gde\GestionDocEcoleBundle\Entity\D03Type;
use Gde\GestionDocEcoleBundle\Entity\D04Document;
use Gde\GestionDocEcoleBundle\Entity\D80Utilisateur;

class LoadD00Data implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        /**
         * D80Utilisateur
         */
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

        /**
         * D01Periode
         */
        $d01_array = [];
        // 1
        $d01 = new D01Periode();
        $d01->setId_d80($d80_array[1]);
        $d01->setNom('1ère année CFC');
        $manager->persist($d01);
        $manager->flush();
        $d01_array[1] = $d01->getId();
        // 2
        $d01 = new D01Periode();
        $d01->setId_d80($d80_array[1]);
        $d01->setNom('2ème année CFC');
        $manager->persist($d01);
        $manager->flush();
        $d01_array[2] = $d01->getId();
        // 3
        $d01 = new D01Periode();
        $d01->setId_d80($d80_array[1]);
        $d01->setNom('3ème année CFC');
        $manager->persist($d01);
        $manager->flush();
        $d01_array[3] = $d01->getId();
        // 4
        $d01 = new D01Periode();
        $d01->setId_d80($d80_array[1]);
        $d01->setNom('4ème année CFC');
        $manager->persist($d01);
        $manager->flush();
        $d01_array[4] = $d01->getId();
        // 5
        $d01 = new D01Periode();
        $d01->setId_d80($d80_array[1]);
        $d01->setNom('1ère année ES');
        $manager->persist($d01);
        $manager->flush();
        $d01_array[5] = $d01->getId();
        /**
         * D02Branche
         */
        $d02_array = [];
        // 1
        $d02 = new D02Branche();
        $d02->setId_d80($d80_array[1]);
        $d02->setNom('Delphi');
        $manager->persist($d02);
        $manager->flush();
        $d02_array[1] = $d02->getId();
        // 2
        $d02 = new D02Branche();
        $d02->setId_d80($d80_array[1]);
        $d02->setNom('C');
        $manager->persist($d02);
        $manager->flush();
        $d02_array[2] = $d02->getId();
        /**
         * D03Type
         */
        $d03_array = [];
        // 1
        $d03 = new D03Type();
        $d03->setId_d80($d80_array[1]);
        $d03->setNom('Epreuve');
        $manager->persist($d03);
        $manager->flush();
        $d03_array[1] = $d03->getId();
        /**
         * D04Document
         */
        $d04_array = [];
        // 1
        $d04 = new D04Document();
        $d04->setId_d80($d80_array[1]);
        $d04->setId_d01($d01_array[1]);
        $d04->setId_d02($d02_array[1]);
        $d04->setId_d03($d03_array[1]);
        $d04->setTexte('Epreuve Delphi');
        $d04->setPdf('20010605_Epreuve_delphi.pdf');
        $d04->setDate(date_create('2001-06-05'));
        $manager->persist($d04);
        $manager->flush();
        $d04_array[1] = $d04->getId();
        // 2
        $d04 = new D04Document();
        $d04->setId_d80($d80_array[1]);
        $d04->setId_d01($d01_array[4]);
        $d04->setId_d02($d02_array[2]);
        $d04->setId_d03($d03_array[1]);
        $d04->setTexte('Epreuve C, Recherche du nombre de nombre pair et impair dans 2 tableaux en utilisant des pointeurs');
        $d04->setPdf('20040901_Epreuve_c.pdf');
        $d04->setDate(date_create('2004-09-01'));
        $manager->persist($d04);
        $manager->flush();
        $d04_array[2] = $d04->getId();
        // 3
        $d04 = new D04Document();
        $d04->setId_d80($d80_array[1]);
        $d04->setId_d01($d01_array[2]);
        $d04->setId_d02($d02_array[1]);
        $d04->setId_d03($d03_array[1]);
        $d04->setTexte('Epreuve Delphi');
        $d04->setPdf('20030512_Epreuve_delphi.pdf');
        $d04->setDate(date_create('2003-05-12'));
        $manager->persist($d04);
        $manager->flush();
        $d04_array[3] = $d04->getId();
    }
    
    public function getOrder()
    {
        return 1;
    }
}
?>