<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
//use Doctrine\Common\DataFixtures\AbstractFixture;
//use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
// Utiliser -> si à refaire => $this->addReference('d80-7', $d80);
use Doctrine\Common\Persistence\ObjectManager;
use Gde\GestionDocEcoleBundle\Entity\D80Utilisateur;
use Gde\GestionDocEcoleBundle\Entity\D01Periode;
use Gde\GestionDocEcoleBundle\Entity\D02Branche;
use Gde\GestionDocEcoleBundle\Entity\D03Type;
use Gde\GestionDocEcoleBundle\Entity\D04Document;

class LoadD00Data implements FixtureInterface
//class LoadD00Data extends AbstractFixture implements OrderedFixtureInterface
{
  public function load(ObjectManager $manager)
  {
      /**
      /* D80Utilisateur
       */
      $d80_array = [];
      // 12
      $d80 = new D80Utilisateur();
      $d80->setUser('Stéphane');
      $d80->setEmail('s.bressani@bluewin.ch');
      $d80->setPassword('awesome');
      $d80->setPhoto('null');
      $manager->persist($d80);
      $manager->flush();
      $d80_array[12] = $d80;
      /**
      /* D01Periode
       */
      $d01_array = [];
      // 56
      $d01 = new D01Periode();
      $d01->setD80($d80_array[12]);
      $d01->setNom('1ère année CFC');
      $manager->persist($d01);
      $manager->flush();
      $d01_array[56] = $d01;
      // 57
      $d01 = new D01Periode();
      $d01->setD80($d80_array[12]);
      $d01->setNom('2ème année CFC');
      $manager->persist($d01);
      $manager->flush();
      $d01_array[57] = $d01;
      // 58
      $d01 = new D01Periode();
      $d01->setD80($d80_array[12]);
      $d01->setNom('3ème année CFC');
      $manager->persist($d01);
      $manager->flush();
      $d01_array[58] = $d01;
      // 59
      $d01 = new D01Periode();
      $d01->setD80($d80_array[12]);
      $d01->setNom('4ème année CFC');
      $manager->persist($d01);
      $manager->flush();
      $d01_array[59] = $d01;
      // 60
      $d01 = new D01Periode();
      $d01->setD80($d80_array[12]);
      $d01->setNom('1ère année ES');
      $manager->persist($d01);
      $manager->flush();
      $d01_array[60] = $d01;
      /**
      /* D02Branche
       */
      $d02_array = [];
      // 23
      $d02 = new D02Branche();
      $d02->setD80($d80_array[12]);
      $d02->setNom('Delphi');
      $manager->persist($d02);
      $manager->flush();
      $d02_array[23] = $d02;
      // 24
      $d02 = new D02Branche();
      $d02->setD80($d80_array[12]);
      $d02->setNom('C');
      $manager->persist($d02);
      $manager->flush();
      $d02_array[24] = $d02;
      /**
      /* D03Type
       */
      $d03_array = [];
      // 18
      $d03 = new D03Type();
      $d03->setD80($d80_array[12]);
      $d03->setNom('Epreuve');
      $manager->persist($d03);
      $manager->flush();
      $d03_array[18] = $d03;
      // 19
      $d03 = new D03Type();
      $d03->setD80($d80_array[12]);
      $d03->setNom('Exercice');
      $manager->persist($d03);
      $manager->flush();
      $d03_array[19] = $d03;
      /**
      /* D04Document
       */
      $d04_array = [];
      // 40
      $d04 = new D04Document();
      $d04->setD80($d80_array[12]);
      $d04->setD01($d01_array[56]);
      $d04->setD02($d02_array[23]);
      $d04->setD03($d03_array[18]);
      $d04->setDate(date_create('2001-06-05T00:00:00+0000'));
      $d04->setTexte('Epreuve Delphi');
      $d04->setPdf('20010605_Epreuve_delphi.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[40] = $d04;
      // 41
      $d04 = new D04Document();
      $d04->setD80($d80_array[12]);
      $d04->setD01($d01_array[59]);
      $d04->setD02($d02_array[24]);
      $d04->setD03($d03_array[18]);
      $d04->setDate(date_create('2004-09-01T00:00:00+0000'));
      $d04->setTexte('Epreuve C, Recherche du nombre de nombre pair et impair dans 2 tableaux en utilisant des pointeurs');
      $d04->setPdf('20040901_Epreuve_c.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[41] = $d04;
      // 42
      $d04 = new D04Document();
      $d04->setD80($d80_array[12]);
      $d04->setD01($d01_array[57]);
      $d04->setD02($d02_array[23]);
      $d04->setD03($d03_array[18]);
      $d04->setDate(date_create('2003-05-12T00:00:00+0000'));
      $d04->setTexte('Epreuve Delphi');
      $d04->setPdf('20030512_Epreuve_delphi.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[42] = $d04;
      // 43
      $d04 = new D04Document();
      $d04->setD80($d80_array[12]);
      $d04->setD01($d01_array[57]);
      $d04->setD02($d02_array[23]);
      $d04->setD03($d03_array[19]);
      $d04->setDate(date_create('2003-03-12T00:00:00+0000'));
      $d04->setTexte('Exercice 3.19, Crée un fifo');
      $d04->setPdf('20030312_Exercice_delphi_fifo.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[43] = $d04;
      // 44
      $d04 = new D04Document();
      $d04->setD80($d80_array[12]);
      $d04->setD01($d01_array[57]);
      $d04->setD02($d02_array[23]);
      $d04->setD03($d03_array[19]);
      $d04->setDate(date_create('2002-10-29T00:00:00+0000'));
      $d04->setTexte('Exercice 3.14, Tri un tableau par bubble sort et affiche le résultat');
      $d04->setPdf('20021029_Exercice_delphi_tri_tableau.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[44] = $d04;
      // 45
      $d04 = new D04Document();
      $d04->setD80($d80_array[12]);
      $d04->setD01($d01_array[57]);
      $d04->setD02($d02_array[23]);
      $d04->setD03($d03_array[19]);
      $d04->setDate(date_create('2002-10-29T00:00:00+0000'));
      $d04->setTexte('Exercice 3.13, Remplissage d\'un tableau avec des chiffres consécutifs la première valeur étant choisie par l\'utilisateur. Un deuxième tableau permet d\'afficher les valeurs doublées');
      $d04->setPdf('20021029_Exercice_remplissage_tableau.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[45] = $d04;
      // 46
      $d04 = new D04Document();
      $d04->setD80($d80_array[12]);
      $d04->setD01($d01_array[57]);
      $d04->setD02($d02_array[23]);
      $d04->setD03($d03_array[18]);
      $d04->setDate(date_create('2003-04-19T00:00:00+0000'));
      $d04->setTexte('Epreuve de l\'exercice 3.19, 3.21 et 3.24');
      $d04->setPdf('20030419_Epreuve_3_prog.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[46] = $d04;
      // 47
      $d04 = new D04Document();
      $d04->setD80($d80_array[12]);
      $d04->setD01($d01_array[57]);
      $d04->setD02($d02_array[24]);
      $d04->setD03($d03_array[19]);
      $d04->setDate(date_create('2003-04-05T00:00:00+0000'));
      $d04->setTexte('Affiche le temps réel et la date en temps local');
      $d04->setPdf('20030405_Exercice_c_DisplayTime.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[47] = $d04;
      // 48
      $d04 = new D04Document();
      $d04->setD80($d80_array[12]);
      $d04->setD01($d01_array[58]);
      $d04->setD02($d02_array[23]);
      $d04->setD03($d03_array[18]);
      $d04->setDate(date_create('2003-11-17T00:00:00+0000'));
      $d04->setTexte('Epreuve sur les StringGrid');
      $d04->setPdf('20031117_Epreuve_Delphi_StringGrid.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[48] = $d04;
      // 49
      $d04 = new D04Document();
      $d04->setD80($d80_array[12]);
      $d04->setD01($d01_array[57]);
      $d04->setD02($d02_array[23]);
      $d04->setD03($d03_array[19]);
      $d04->setDate(date_create('2002-09-09T00:00:00+0000'));
      $d04->setTexte('Exercice 3.5, Changement de base decimal, octal, binaire et hexadécimal');
      $d04->setPdf('20020909_Exerice_Delphi_Changement_de_base.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[49] = $d04;
  }

//  public function getOrder()
//  {
//      return 1;
//  }
}
?>