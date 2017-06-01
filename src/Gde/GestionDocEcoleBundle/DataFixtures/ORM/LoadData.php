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
      // 7
      $d80 = new D80Utilisateur();
      $d80->setUsername('Stéphane');
      $d80->setEmail('s.bressani@bluewin.ch');
      $d80->setPassword('awesome');
      $d80->setPhoto('null');
      $d80->setSalt('');
      $d80->setRoles(array('ROLE_USER'));
      $manager->persist($d80);
      $manager->flush();
      $d80_array[7] = $d80;
      /**
      /* D01Periode
       */
      $d01_array = [];
      // 31
      $d01 = new D01Periode();
      $d01->setD80($d80_array[7]);
      $d01->setNom('1ère année CFC');
      $manager->persist($d01);
      $manager->flush();
      $d01_array[31] = $d01;
      // 32
      $d01 = new D01Periode();
      $d01->setD80($d80_array[7]);
      $d01->setNom('2ème année CFC');
      $manager->persist($d01);
      $manager->flush();
      $d01_array[32] = $d01;
      // 33
      $d01 = new D01Periode();
      $d01->setD80($d80_array[7]);
      $d01->setNom('3ème année CFC');
      $manager->persist($d01);
      $manager->flush();
      $d01_array[33] = $d01;
      // 34
      $d01 = new D01Periode();
      $d01->setD80($d80_array[7]);
      $d01->setNom('4ème année CFC');
      $manager->persist($d01);
      $manager->flush();
      $d01_array[34] = $d01;
      // 35
      $d01 = new D01Periode();
      $d01->setD80($d80_array[7]);
      $d01->setNom('1ère année ES');
      $manager->persist($d01);
      $manager->flush();
      $d01_array[35] = $d01;
      /**
      /* D02Branche
       */
      $d02_array = [];
      // 13
      $d02 = new D02Branche();
      $d02->setD80($d80_array[7]);
      $d02->setNom('Delphi');
      $manager->persist($d02);
      $manager->flush();
      $d02_array[13] = $d02;
      // 14
      $d02 = new D02Branche();
      $d02->setD80($d80_array[7]);
      $d02->setNom('C');
      $manager->persist($d02);
      $manager->flush();
      $d02_array[14] = $d02;
      // 15
      $d02 = new D02Branche();
      $d02->setD80($d80_array[7]);
      $d02->setNom('Mécatronique');
      $manager->persist($d02);
      $manager->flush();
      $d02_array[15] = $d02;
      /**
      /* D03Type
       */
      $d03_array = [];
      // 13
      $d03 = new D03Type();
      $d03->setD80($d80_array[7]);
      $d03->setNom('Epreuve');
      $manager->persist($d03);
      $manager->flush();
      $d03_array[13] = $d03;
      // 14
      $d03 = new D03Type();
      $d03->setD80($d80_array[7]);
      $d03->setNom('Exercice');
      $manager->persist($d03);
      $manager->flush();
      $d03_array[14] = $d03;
      // 15
      $d03 = new D03Type();
      $d03->setD80($d80_array[7]);
      $d03->setNom('Support de cours');
      $manager->persist($d03);
      $manager->flush();
      $d03_array[15] = $d03;
      /**
      /* D04Document
       */
      $d04_array = [];
      // 61
      $d04 = new D04Document();
      $d04->setD80($d80_array[7]);
      $d04->setD01($d01_array[31]);
      $d04->setD02($d02_array[13]);
      $d04->setD03($d03_array[13]);
      $d04->setDate(date_create('2001-06-05T00:00:00+0000'));
      $d04->setTexte('Epreuve Delphi');
      $d04->setPdf('20010605_Epreuve_delphi.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[61] = $d04;
      // 62
      $d04 = new D04Document();
      $d04->setD80($d80_array[7]);
      $d04->setD01($d01_array[34]);
      $d04->setD02($d02_array[14]);
      $d04->setD03($d03_array[13]);
      $d04->setDate(date_create('2004-09-01T00:00:00+0000'));
      $d04->setTexte('Epreuve C, Recherche du nombre de nombre pair et impair dans 2 tableaux en utilisant des pointeurs');
      $d04->setPdf('20040901_Epreuve_c.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[62] = $d04;
      // 63
      $d04 = new D04Document();
      $d04->setD80($d80_array[7]);
      $d04->setD01($d01_array[32]);
      $d04->setD02($d02_array[13]);
      $d04->setD03($d03_array[13]);
      $d04->setDate(date_create('2003-05-12T00:00:00+0000'));
      $d04->setTexte('Epreuve Delphi');
      $d04->setPdf('20030512_Epreuve_delphi.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[63] = $d04;
      // 64
      $d04 = new D04Document();
      $d04->setD80($d80_array[7]);
      $d04->setD01($d01_array[32]);
      $d04->setD02($d02_array[13]);
      $d04->setD03($d03_array[14]);
      $d04->setDate(date_create('2003-03-12T00:00:00+0000'));
      $d04->setTexte('Exercice 3.19, Crée un fifo');
      $d04->setPdf('20030312_Exercice_delphi_fifo.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[64] = $d04;
      // 65
      $d04 = new D04Document();
      $d04->setD80($d80_array[7]);
      $d04->setD01($d01_array[32]);
      $d04->setD02($d02_array[13]);
      $d04->setD03($d03_array[14]);
      $d04->setDate(date_create('2002-10-29T00:00:00+0000'));
      $d04->setTexte('Exercice 3.14, Tri un tableau par bubble sort et affiche le résultat');
      $d04->setPdf('20021029_Exercice_delphi_tri_tableau.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[65] = $d04;
      // 66
      $d04 = new D04Document();
      $d04->setD80($d80_array[7]);
      $d04->setD01($d01_array[32]);
      $d04->setD02($d02_array[13]);
      $d04->setD03($d03_array[14]);
      $d04->setDate(date_create('2002-10-29T00:00:00+0000'));
      $d04->setTexte('Exercice 3.13, Remplissage d\'un tableau avec des chiffres consécutifs la première valeur étant choisie par l\'utilisateur. Un deuxième tableau permet d\'afficher les valeurs doublées');
      $d04->setPdf('20021029_Exercice_remplissage_tableau.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[66] = $d04;
      // 67
      $d04 = new D04Document();
      $d04->setD80($d80_array[7]);
      $d04->setD01($d01_array[32]);
      $d04->setD02($d02_array[13]);
      $d04->setD03($d03_array[13]);
      $d04->setDate(date_create('2003-04-19T00:00:00+0000'));
      $d04->setTexte('Epreuve de l\'exercice 3.19, 3.21 et 3.24');
      $d04->setPdf('20030419_Epreuve_3_prog.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[67] = $d04;
      // 68
      $d04 = new D04Document();
      $d04->setD80($d80_array[7]);
      $d04->setD01($d01_array[32]);
      $d04->setD02($d02_array[14]);
      $d04->setD03($d03_array[14]);
      $d04->setDate(date_create('2003-04-05T00:00:00+0000'));
      $d04->setTexte('Affiche le temps réel et la date en temps local');
      $d04->setPdf('20030405_Exercice_c_DisplayTime.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[68] = $d04;
      // 69
      $d04 = new D04Document();
      $d04->setD80($d80_array[7]);
      $d04->setD01($d01_array[33]);
      $d04->setD02($d02_array[13]);
      $d04->setD03($d03_array[13]);
      $d04->setDate(date_create('2003-11-17T00:00:00+0000'));
      $d04->setTexte('Epreuve sur les StringGrid');
      $d04->setPdf('20031117_Epreuve_Delphi_StringGrid.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[69] = $d04;
      // 70
      $d04 = new D04Document();
      $d04->setD80($d80_array[7]);
      $d04->setD01($d01_array[32]);
      $d04->setD02($d02_array[13]);
      $d04->setD03($d03_array[14]);
      $d04->setDate(date_create('2002-09-09T00:00:00+0000'));
      $d04->setTexte('Exercice 3.5, Changement de base decimal, octal, binaire et hexadécimal');
      $d04->setPdf('20020909_Exerice_Delphi_Changement_de_base.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[70] = $d04;
      // 71
      $d04 = new D04Document();
      $d04->setD80($d80_array[7]);
      $d04->setD01($d01_array[31]);
      $d04->setD02($d02_array[15]);
      $d04->setD03($d03_array[13]);
      $d04->setDate(date_create('2001-09-01T00:00:00+0000'));
      $d04->setTexte('Epreuves de mécatronique sur le code des couleurs des resistances');
      $d04->setPdf('20010901_Epreuve_Mecatronique_sur_le_code_des_couleurs.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[71] = $d04;
      // 72
      $d04 = new D04Document();
      $d04->setD80($d80_array[7]);
      $d04->setD01($d01_array[31]);
      $d04->setD02($d02_array[15]);
      $d04->setD03($d03_array[15]);
      $d04->setDate(date_create('2001-09-01T00:00:00+0000'));
      $d04->setTexte('Support de cours de mécatronique');
      $d04->setPdf('20010901_Cours_Mecatronique_et_notes.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[72] = $d04;
  }

//  public function getOrder()
//  {
//      return 1;
//  }
}
?>