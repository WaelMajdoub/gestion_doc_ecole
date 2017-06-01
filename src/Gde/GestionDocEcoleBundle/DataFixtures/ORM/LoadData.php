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
      // 14
      $d80 = new D80Utilisateur();
      $d80->setUsername('Stéphane');
      $d80->setEmail('s.bressani@bluewin.ch');
      $d80->setPassword('awesome');
      $d80->setPhoto('null');
      $d80->setSalt('');
      $d80->setRoles(array('ROLE_USER'));
      $manager->persist($d80);
      $manager->flush();
      $d80_array[14] = $d80;
      /**
      /* D01Periode
       */
      $d01_array = [];
      // 66
      $d01 = new D01Periode();
      $d01->setD80($d80_array[14]);
      $d01->setNom('1ère année CFC');
      $manager->persist($d01);
      $manager->flush();
      $d01_array[66] = $d01;
      // 67
      $d01 = new D01Periode();
      $d01->setD80($d80_array[14]);
      $d01->setNom('2ème année CFC');
      $manager->persist($d01);
      $manager->flush();
      $d01_array[67] = $d01;
      // 68
      $d01 = new D01Periode();
      $d01->setD80($d80_array[14]);
      $d01->setNom('3ème année CFC');
      $manager->persist($d01);
      $manager->flush();
      $d01_array[68] = $d01;
      // 69
      $d01 = new D01Periode();
      $d01->setD80($d80_array[14]);
      $d01->setNom('4ème année CFC');
      $manager->persist($d01);
      $manager->flush();
      $d01_array[69] = $d01;
      // 70
      $d01 = new D01Periode();
      $d01->setD80($d80_array[14]);
      $d01->setNom('1ère année ES');
      $manager->persist($d01);
      $manager->flush();
      $d01_array[70] = $d01;
      /**
      /* D02Branche
       */
      $d02_array = [];
      // 40
      $d02 = new D02Branche();
      $d02->setD80($d80_array[14]);
      $d02->setNom('Delphi');
      $manager->persist($d02);
      $manager->flush();
      $d02_array[40] = $d02;
      // 41
      $d02 = new D02Branche();
      $d02->setD80($d80_array[14]);
      $d02->setNom('C');
      $manager->persist($d02);
      $manager->flush();
      $d02_array[41] = $d02;
      // 42
      $d02 = new D02Branche();
      $d02->setD80($d80_array[14]);
      $d02->setNom('Mécatronique');
      $manager->persist($d02);
      $manager->flush();
      $d02_array[42] = $d02;
      // 43
      $d02 = new D02Branche();
      $d02->setD80($d80_array[14]);
      $d02->setNom('Chimie');
      $manager->persist($d02);
      $manager->flush();
      $d02_array[43] = $d02;
      /**
      /* D03Type
       */
      $d03_array = [];
      // 36
      $d03 = new D03Type();
      $d03->setD80($d80_array[14]);
      $d03->setNom('Epreuve');
      $manager->persist($d03);
      $manager->flush();
      $d03_array[36] = $d03;
      // 37
      $d03 = new D03Type();
      $d03->setD80($d80_array[14]);
      $d03->setNom('Exercice');
      $manager->persist($d03);
      $manager->flush();
      $d03_array[37] = $d03;
      // 38
      $d03 = new D03Type();
      $d03->setD80($d80_array[14]);
      $d03->setNom('Support de cours');
      $manager->persist($d03);
      $manager->flush();
      $d03_array[38] = $d03;
      // 39
      $d03 = new D03Type();
      $d03->setD80($d80_array[14]);
      $d03->setNom('Notes');
      $manager->persist($d03);
      $manager->flush();
      $d03_array[39] = $d03;
      /**
      /* D04Document
       */
      $d04_array = [];
      // 323
      $d04 = new D04Document();
      $d04->setD80($d80_array[14]);
      $d04->setD01($d01_array[66]);
      $d04->setD02($d02_array[40]);
      $d04->setD03($d03_array[36]);
      $d04->setDate(date_create('2001-06-05T00:00:00+0000'));
      $d04->setTexte('Epreuve Delphi');
      $d04->setPdf('20010605_Epreuve_delphi.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[323] = $d04;
      // 324
      $d04 = new D04Document();
      $d04->setD80($d80_array[14]);
      $d04->setD01($d01_array[69]);
      $d04->setD02($d02_array[41]);
      $d04->setD03($d03_array[36]);
      $d04->setDate(date_create('2004-09-01T00:00:00+0000'));
      $d04->setTexte('Epreuve C, Recherche du nombre de nombre pair et impair dans 2 tableaux en utilisant des pointeurs');
      $d04->setPdf('20040901_Epreuve_c.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[324] = $d04;
      // 325
      $d04 = new D04Document();
      $d04->setD80($d80_array[14]);
      $d04->setD01($d01_array[67]);
      $d04->setD02($d02_array[40]);
      $d04->setD03($d03_array[36]);
      $d04->setDate(date_create('2003-05-12T00:00:00+0000'));
      $d04->setTexte('Epreuve Delphi');
      $d04->setPdf('20030512_Epreuve_delphi.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[325] = $d04;
      // 326
      $d04 = new D04Document();
      $d04->setD80($d80_array[14]);
      $d04->setD01($d01_array[67]);
      $d04->setD02($d02_array[40]);
      $d04->setD03($d03_array[37]);
      $d04->setDate(date_create('2003-03-12T00:00:00+0000'));
      $d04->setTexte('Exercice 3.19, Crée un fifo');
      $d04->setPdf('20030312_Exercice_delphi_fifo.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[326] = $d04;
      // 327
      $d04 = new D04Document();
      $d04->setD80($d80_array[14]);
      $d04->setD01($d01_array[67]);
      $d04->setD02($d02_array[40]);
      $d04->setD03($d03_array[37]);
      $d04->setDate(date_create('2002-10-29T00:00:00+0000'));
      $d04->setTexte('Exercice 3.14, Tri un tableau par bubble sort et affiche le résultat');
      $d04->setPdf('20021029_Exercice_delphi_tri_tableau.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[327] = $d04;
      // 328
      $d04 = new D04Document();
      $d04->setD80($d80_array[14]);
      $d04->setD01($d01_array[67]);
      $d04->setD02($d02_array[40]);
      $d04->setD03($d03_array[37]);
      $d04->setDate(date_create('2002-10-29T00:00:00+0000'));
      $d04->setTexte('Exercice 3.13, Remplissage d\'un tableau avec des chiffres consécutifs la première valeur étant choisie par l\'utilisateur. Un deuxième tableau permet d\'afficher les valeurs doublées');
      $d04->setPdf('20021029_Exercice_remplissage_tableau.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[328] = $d04;
      // 329
      $d04 = new D04Document();
      $d04->setD80($d80_array[14]);
      $d04->setD01($d01_array[67]);
      $d04->setD02($d02_array[40]);
      $d04->setD03($d03_array[36]);
      $d04->setDate(date_create('2003-04-19T00:00:00+0000'));
      $d04->setTexte('Epreuve de l\'exercice 3.19, 3.21 et 3.24');
      $d04->setPdf('20030419_Epreuve_3_prog.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[329] = $d04;
      // 330
      $d04 = new D04Document();
      $d04->setD80($d80_array[14]);
      $d04->setD01($d01_array[67]);
      $d04->setD02($d02_array[41]);
      $d04->setD03($d03_array[37]);
      $d04->setDate(date_create('2003-04-05T00:00:00+0000'));
      $d04->setTexte('Affiche le temps réel et la date en temps local');
      $d04->setPdf('20030405_Exercice_c_DisplayTime.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[330] = $d04;
      // 331
      $d04 = new D04Document();
      $d04->setD80($d80_array[14]);
      $d04->setD01($d01_array[68]);
      $d04->setD02($d02_array[40]);
      $d04->setD03($d03_array[36]);
      $d04->setDate(date_create('2003-11-17T00:00:00+0000'));
      $d04->setTexte('Epreuve sur les StringGrid');
      $d04->setPdf('20031117_Epreuve_Delphi_StringGrid.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[331] = $d04;
      // 332
      $d04 = new D04Document();
      $d04->setD80($d80_array[14]);
      $d04->setD01($d01_array[67]);
      $d04->setD02($d02_array[40]);
      $d04->setD03($d03_array[37]);
      $d04->setDate(date_create('2002-09-09T00:00:00+0000'));
      $d04->setTexte('Exercice 3.5, Changement de base decimal, octal, binaire et hexadécimal');
      $d04->setPdf('20020909_Exerice_Delphi_Changement_de_base.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[332] = $d04;
      // 333
      $d04 = new D04Document();
      $d04->setD80($d80_array[14]);
      $d04->setD01($d01_array[66]);
      $d04->setD02($d02_array[42]);
      $d04->setD03($d03_array[36]);
      $d04->setDate(date_create('2001-09-01T00:00:00+0000'));
      $d04->setTexte('Epreuves de mécatronique sur le code des couleurs des resistances');
      $d04->setPdf('20010901_Epreuve_Mecatronique_sur_le_code_des_couleurs.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[333] = $d04;
      // 334
      $d04 = new D04Document();
      $d04->setD80($d80_array[14]);
      $d04->setD01($d01_array[66]);
      $d04->setD02($d02_array[42]);
      $d04->setD03($d03_array[38]);
      $d04->setDate(date_create('2001-09-01T00:00:00+0000'));
      $d04->setTexte('Support de cours de mécatronique');
      $d04->setPdf('20010901_Cours_Mecatronique_et_notes.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[334] = $d04;
      // 335
      $d04 = new D04Document();
      $d04->setD80($d80_array[14]);
      $d04->setD01($d01_array[68]);
      $d04->setD02($d02_array[43]);
      $d04->setD03($d03_array[38]);
      $d04->setDate(date_create('2003-09-01T00:00:00+0000'));
      $d04->setTexte('Liaison et réactions chimique - Chapitre 0');
      $d04->setPdf('20030901_Liaisons_et_reactions_chimique_chapitre0.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[335] = $d04;
      // 336
      $d04 = new D04Document();
      $d04->setD80($d80_array[14]);
      $d04->setD01($d01_array[68]);
      $d04->setD02($d02_array[43]);
      $d04->setD03($d03_array[38]);
      $d04->setDate(date_create('2003-09-01T00:00:00+0000'));
      $d04->setTexte('Liaison et réactions chimique - Chapitre 1 - La molécule');
      $d04->setPdf('20030901_Liaisons_et_reactions_chimique_chapitre1.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[336] = $d04;
      // 337
      $d04 = new D04Document();
      $d04->setD80($d80_array[14]);
      $d04->setD01($d01_array[68]);
      $d04->setD02($d02_array[43]);
      $d04->setD03($d03_array[38]);
      $d04->setDate(date_create('2003-09-01T00:00:00+0000'));
      $d04->setTexte('Liaison et réactions chimique - Chapitre 2 - Les liaisons ioniques');
      $d04->setPdf('20030901_Liaisons_et_reactions_chimique_chapitre2.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[337] = $d04;
      // 338
      $d04 = new D04Document();
      $d04->setD80($d80_array[14]);
      $d04->setD01($d01_array[68]);
      $d04->setD02($d02_array[43]);
      $d04->setD03($d03_array[38]);
      $d04->setDate(date_create('2003-09-01T00:00:00+0000'));
      $d04->setTexte('Liaison et réactions chimique - Chapitre 3 - Les liaisons covalentes');
      $d04->setPdf('20030901_Liaisons_et_reactions_chimique_chapitre3.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[338] = $d04;
      // 339
      $d04 = new D04Document();
      $d04->setD80($d80_array[14]);
      $d04->setD01($d01_array[68]);
      $d04->setD02($d02_array[43]);
      $d04->setD03($d03_array[38]);
      $d04->setDate(date_create('2003-09-01T00:00:00+0000'));
      $d04->setTexte('Liaison et réactions chimique - Chapitre 4 - Détermination des formules et des compositions');
      $d04->setPdf('20030901_Liaisons_et_reactions_chimique_chapitre4.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[339] = $d04;
      // 340
      $d04 = new D04Document();
      $d04->setD80($d80_array[14]);
      $d04->setD01($d01_array[68]);
      $d04->setD02($d02_array[43]);
      $d04->setD03($d03_array[38]);
      $d04->setDate(date_create('2003-09-01T00:00:00+0000'));
      $d04->setTexte('Liaison et réactions chimique - Chapitre 5 - La réaction chimique');
      $d04->setPdf('20030901_Liaisons_et_reactions_chimique_chapitre5.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[340] = $d04;
      // 341
      $d04 = new D04Document();
      $d04->setD80($d80_array[14]);
      $d04->setD01($d01_array[68]);
      $d04->setD02($d02_array[43]);
      $d04->setD03($d03_array[38]);
      $d04->setDate(date_create('2003-09-01T00:00:00+0000'));
      $d04->setTexte('Liaison et réactions chimique - Chapitre 6 - Notion de toxicologie');
      $d04->setPdf('20030901_Liaisons_et_reactions_chimique_chapitre6.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[341] = $d04;
      // 342
      $d04 = new D04Document();
      $d04->setD80($d80_array[14]);
      $d04->setD01($d01_array[68]);
      $d04->setD02($d02_array[43]);
      $d04->setD03($d03_array[38]);
      $d04->setDate(date_create('2003-09-01T00:00:00+0000'));
      $d04->setTexte('Classification périodique des éléments');
      $d04->setPdf('20030901_Clasification_periodique_des_elements.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[342] = $d04;
      // 343
      $d04 = new D04Document();
      $d04->setD80($d80_array[14]);
      $d04->setD01($d01_array[68]);
      $d04->setD02($d02_array[43]);
      $d04->setD03($d03_array[38]);
      $d04->setDate(date_create('2003-09-02T00:00:00+0000'));
      $d04->setTexte('Solutions et reactions chimique - Chapitre 0');
      $d04->setPdf('20030902_Solutions_et_reactions_chimique_chapitre0.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[343] = $d04;
      // 344
      $d04 = new D04Document();
      $d04->setD80($d80_array[14]);
      $d04->setD01($d01_array[68]);
      $d04->setD02($d02_array[43]);
      $d04->setD03($d03_array[38]);
      $d04->setDate(date_create('2003-09-02T00:00:00+0000'));
      $d04->setTexte('Solutions et reactions chimique - Chapitre 1 - Les solutions');
      $d04->setPdf('20030902_Solutions_et_reactions_chimique_chapitre1.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[344] = $d04;
      // 345
      $d04 = new D04Document();
      $d04->setD80($d80_array[14]);
      $d04->setD01($d01_array[68]);
      $d04->setD02($d02_array[43]);
      $d04->setD03($d03_array[38]);
      $d04->setDate(date_create('2003-09-02T00:00:00+0000'));
      $d04->setTexte('Solutions et reactions chimique - Chapitre 2 - Acides et bases');
      $d04->setPdf('20030902_Solutions_et_reactions_chimique_chapitre2.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[345] = $d04;
      // 346
      $d04 = new D04Document();
      $d04->setD80($d80_array[14]);
      $d04->setD01($d01_array[68]);
      $d04->setD02($d02_array[43]);
      $d04->setD03($d03_array[38]);
      $d04->setDate(date_create('2003-09-02T00:00:00+0000'));
      $d04->setTexte('Solutions et reactions chimique - Chapitre 3 - Réactions de précipitation et de neutralisation');
      $d04->setPdf('20030902_Solutions_et_reactions_chimique_chapitre3.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[346] = $d04;
      // 347
      $d04 = new D04Document();
      $d04->setD80($d80_array[14]);
      $d04->setD01($d01_array[68]);
      $d04->setD02($d02_array[43]);
      $d04->setD03($d03_array[38]);
      $d04->setDate(date_create('2003-09-02T00:00:00+0000'));
      $d04->setTexte('Solutions et reactions chimique - Chapitre 4 - Le pH, mesure d\'acidité');
      $d04->setPdf('20030902_Solutions_et_reactions_chimique_chapitre4.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[347] = $d04;
      // 348
      $d04 = new D04Document();
      $d04->setD80($d80_array[14]);
      $d04->setD01($d01_array[68]);
      $d04->setD02($d02_array[43]);
      $d04->setD03($d03_array[38]);
      $d04->setDate(date_create('2003-09-02T00:00:00+0000'));
      $d04->setTexte('Solutions et reactions chimique - Chapitre 5 - Le titrage');
      $d04->setPdf('20030902_Solutions_et_reactions_chimique_chapitre5.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[348] = $d04;
      // 349
      $d04 = new D04Document();
      $d04->setD80($d80_array[14]);
      $d04->setD01($d01_array[68]);
      $d04->setD02($d02_array[43]);
      $d04->setD03($d03_array[38]);
      $d04->setDate(date_create('2003-09-02T00:00:00+0000'));
      $d04->setTexte('Solutions et reactions chimique - Chapitre 6 - La valence et le degré d\'oxydation');
      $d04->setPdf('20030902_Solutions_et_reactions_chimique_chapitre6.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[349] = $d04;
      // 350
      $d04 = new D04Document();
      $d04->setD80($d80_array[14]);
      $d04->setD01($d01_array[68]);
      $d04->setD02($d02_array[43]);
      $d04->setD03($d03_array[38]);
      $d04->setDate(date_create('2003-09-02T00:00:00+0000'));
      $d04->setTexte('Solutions et reactions chimique - Chapitre 7 - Oxydoréduction');
      $d04->setPdf('20030902_Solutions_et_reactions_chimique_chapitre7.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[350] = $d04;
      // 351
      $d04 = new D04Document();
      $d04->setD80($d80_array[14]);
      $d04->setD01($d01_array[68]);
      $d04->setD02($d02_array[43]);
      $d04->setD03($d03_array[38]);
      $d04->setDate(date_create('2003-09-02T00:00:00+0000'));
      $d04->setTexte('Solutions et reactions chimique - Chapitre 8 - Electrolyse');
      $d04->setPdf('20030902_Solutions_et_reactions_chimique_chapitre8.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[351] = $d04;
      // 352
      $d04 = new D04Document();
      $d04->setD80($d80_array[14]);
      $d04->setD01($d01_array[68]);
      $d04->setD02($d02_array[43]);
      $d04->setD03($d03_array[38]);
      $d04->setDate(date_create('2003-09-02T00:00:00+0000'));
      $d04->setTexte('Solutions et reactions chimique - Chapitre 9 - Piles et accumulateurs');
      $d04->setPdf('20030902_Solutions_et_reactions_chimique_chapitre9.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[352] = $d04;
      // 353
      $d04 = new D04Document();
      $d04->setD80($d80_array[14]);
      $d04->setD01($d01_array[68]);
      $d04->setD02($d02_array[43]);
      $d04->setD03($d03_array[38]);
      $d04->setDate(date_create('2003-09-03T00:00:00+0000'));
      $d04->setTexte('Chimie organique - Chapitre 1 - Notions de base');
      $d04->setPdf('20030903_Chimie_organique_chapitre1.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[353] = $d04;
      // 354
      $d04 = new D04Document();
      $d04->setD80($d80_array[14]);
      $d04->setD01($d01_array[68]);
      $d04->setD02($d02_array[43]);
      $d04->setD03($d03_array[38]);
      $d04->setDate(date_create('2003-09-03T00:00:00+0000'));
      $d04->setTexte('Chimie organique - Chapitre 2 - Les hydrocarbures');
      $d04->setPdf('20030903_Chimie_organique_chapitre2.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[354] = $d04;
      // 355
      $d04 = new D04Document();
      $d04->setD80($d80_array[14]);
      $d04->setD01($d01_array[68]);
      $d04->setD02($d02_array[43]);
      $d04->setD03($d03_array[38]);
      $d04->setDate(date_create('2003-09-04T00:00:00+0000'));
      $d04->setTexte('Les fonctions chimiques');
      $d04->setPdf('20030904_Chimie_les_fonctions_chimique.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[355] = $d04;
      // 356
      $d04 = new D04Document();
      $d04->setD80($d80_array[14]);
      $d04->setD01($d01_array[68]);
      $d04->setD02($d02_array[43]);
      $d04->setD03($d03_array[38]);
      $d04->setDate(date_create('2003-09-05T00:00:00+0000'));
      $d04->setTexte('Les matières plastiques');
      $d04->setPdf('20030905_Chimie_les_matieres_platstiques.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[356] = $d04;
      // 357
      $d04 = new D04Document();
      $d04->setD80($d80_array[14]);
      $d04->setD01($d01_array[68]);
      $d04->setD02($d02_array[43]);
      $d04->setD03($d03_array[36]);
      $d04->setDate(date_create('2004-04-29T00:00:00+0000'));
      $d04->setTexte('Epreuve de chimie');
      $d04->setPdf('20040429_Epreuve_chimie.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[357] = $d04;
      // 358
      $d04 = new D04Document();
      $d04->setD80($d80_array[14]);
      $d04->setD01($d01_array[67]);
      $d04->setD02($d02_array[42]);
      $d04->setD03($d03_array[38]);
      $d04->setDate(date_create('2002-09-01T00:00:00+0000'));
      $d04->setTexte('Les piles ou générateurs primaires');
      $d04->setPdf('20020901_Mecatronique_les_piles_ou_generateur_primaires.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[358] = $d04;
      // 359
      $d04 = new D04Document();
      $d04->setD80($d80_array[14]);
      $d04->setD01($d01_array[67]);
      $d04->setD02($d02_array[42]);
      $d04->setD03($d03_array[38]);
      $d04->setDate(date_create('2002-09-01T00:00:00+0000'));
      $d04->setTexte('Introduction à Orcad Capture et Orcad Layout');
      $d04->setPdf('20020901_Mecatronique_orcad.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[359] = $d04;
      // 360
      $d04 = new D04Document();
      $d04->setD80($d80_array[14]);
      $d04->setD01($d01_array[67]);
      $d04->setD02($d02_array[42]);
      $d04->setD03($d03_array[38]);
      $d04->setDate(date_create('2002-09-01T00:00:00+0000'));
      $d04->setTexte('Le multimètre Fluke 73');
      $d04->setPdf('20020901_Mecatronique_le_multimetre_fluke_73.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[360] = $d04;
      // 361
      $d04 = new D04Document();
      $d04->setD80($d80_array[14]);
      $d04->setD01($d01_array[67]);
      $d04->setD02($d02_array[42]);
      $d04->setD03($d03_array[38]);
      $d04->setDate(date_create('2002-09-01T00:00:00+0000'));
      $d04->setTexte('L\'osciloscope');
      $d04->setPdf('20020901_Mecatronique_l_osciloscope.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[361] = $d04;
      // 362
      $d04 = new D04Document();
      $d04->setD80($d80_array[14]);
      $d04->setD01($d01_array[67]);
      $d04->setD02($d02_array[42]);
      $d04->setD03($d03_array[38]);
      $d04->setDate(date_create('2002-09-01T00:00:00+0000'));
      $d04->setTexte('Les accumulateurs NiCd et NIMH');
      $d04->setPdf('20020901_Mecatronique_les_accumulateurs_nicd_et_nimh.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[362] = $d04;
      // 363
      $d04 = new D04Document();
      $d04->setD80($d80_array[14]);
      $d04->setD01($d01_array[67]);
      $d04->setD02($d02_array[42]);
      $d04->setD03($d03_array[36]);
      $d04->setDate(date_create('2002-09-01T00:00:00+0000'));
      $d04->setTexte('Epreuve sur les accumulateurs');
      $d04->setPdf('20020901_Mecatronique_epreuve_accu.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[363] = $d04;
      // 364
      $d04 = new D04Document();
      $d04->setD80($d80_array[14]);
      $d04->setD01($d01_array[66]);
      $d04->setD02($d02_array[42]);
      $d04->setD03($d03_array[36]);
      $d04->setDate(date_create('2001-09-01T00:00:00+0000'));
      $d04->setTexte('Epreuves de mécatronique sur le code des couleurs des resistances, suite');
      $d04->setPdf('20010901_Epreuve_Mecatronique_sur_le_code_des_couleurs_suite.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[364] = $d04;
      // 365
      $d04 = new D04Document();
      $d04->setD80($d80_array[14]);
      $d04->setD01($d01_array[66]);
      $d04->setD02($d02_array[42]);
      $d04->setD03($d03_array[36]);
      $d04->setDate(date_create('2001-09-01T00:00:00+0000'));
      $d04->setTexte('Epreuves de mécatronique');
      $d04->setPdf('20010901_Epreuve_Mecatronique_1.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[365] = $d04;
      // 366
      $d04 = new D04Document();
      $d04->setD80($d80_array[14]);
      $d04->setD01($d01_array[66]);
      $d04->setD02($d02_array[42]);
      $d04->setD03($d03_array[36]);
      $d04->setDate(date_create('2001-09-01T00:00:00+0000'));
      $d04->setTexte('Epreuves de mécatronique sur les condensateurs');
      $d04->setPdf('20010901_Epreuve_Mecatronique_les_condensateurs.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[366] = $d04;
      // 367
      $d04 = new D04Document();
      $d04->setD80($d80_array[14]);
      $d04->setD01($d01_array[67]);
      $d04->setD02($d02_array[42]);
      $d04->setD03($d03_array[39]);
      $d04->setDate(date_create('2002-09-01T00:00:00+0000'));
      $d04->setTexte('Notes sur les piles');
      $d04->setPdf('20020901_Mecatronique_notes_piles.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[367] = $d04;
      // 368
      $d04 = new D04Document();
      $d04->setD80($d80_array[14]);
      $d04->setD01($d01_array[66]);
      $d04->setD02($d02_array[42]);
      $d04->setD03($d03_array[39]);
      $d04->setDate(date_create('2001-09-01T00:00:00+0000'));
      $d04->setTexte('Notes sur les resistances');
      $d04->setPdf('20010901_Mecatronique_notes_resistances.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[368] = $d04;
      // 369
      $d04 = new D04Document();
      $d04->setD80($d80_array[14]);
      $d04->setD01($d01_array[66]);
      $d04->setD02($d02_array[42]);
      $d04->setD03($d03_array[38]);
      $d04->setDate(date_create('2001-09-01T00:00:00+0000'));
      $d04->setTexte('Support de cours de mécatronique, suite dans un autre tas de feuilles');
      $d04->setPdf('20010901_Mecatronique_support_de_cours_suite.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[369] = $d04;
      // 370
      $d04 = new D04Document();
      $d04->setD80($d80_array[14]);
      $d04->setD01($d01_array[66]);
      $d04->setD02($d02_array[42]);
      $d04->setD03($d03_array[38]);
      $d04->setDate(date_create('2001-09-01T00:00:00+0000'));
      $d04->setTexte('Support de cours de mécatronique, suite dans un autre tas de feuilles, explication sur les potentiomètres');
      $d04->setPdf('20010901_Mecatronique_support_de_cours_suite_pot.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[370] = $d04;
      // 371
      $d04 = new D04Document();
      $d04->setD80($d80_array[14]);
      $d04->setD01($d01_array[66]);
      $d04->setD02($d02_array[42]);
      $d04->setD03($d03_array[36]);
      $d04->setDate(date_create('2001-09-01T00:00:00+0000'));
      $d04->setTexte('Epreuve sur les caractéristiques statique de différentes diodes');
      $d04->setPdf('20010901_Epreuve_Mecatronique_carasteristique_statique_de_differentes_diodes.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[371] = $d04;
      // 372
      $d04 = new D04Document();
      $d04->setD80($d80_array[14]);
      $d04->setD01($d01_array[66]);
      $d04->setD02($d02_array[42]);
      $d04->setD03($d03_array[36]);
      $d04->setDate(date_create('2001-09-01T00:00:00+0000'));
      $d04->setTexte('Epreuve sur le relevé de tensions aux bornes d\'un diviseur de tension');
      $d04->setPdf('20010901_Epreuve_Mecatronique_releve_des_tensions_aux_bornes_d_un_diviseur_de_tension.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[372] = $d04;
      // 373
      $d04 = new D04Document();
      $d04->setD80($d80_array[14]);
      $d04->setD01($d01_array[66]);
      $d04->setD02($d02_array[42]);
      $d04->setD03($d03_array[36]);
      $d04->setDate(date_create('2001-09-01T00:00:00+0000'));
      $d04->setTexte('Epreuve sur le relevé des caractéristiques d\'un potentiomètre chargé');
      $d04->setPdf('20010901_Epreuve_Mecatronique_releve_des_caracteristiques_d_un_pot_charge.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[373] = $d04;
      // 374
      $d04 = new D04Document();
      $d04->setD80($d80_array[14]);
      $d04->setD01($d01_array[67]);
      $d04->setD02($d02_array[42]);
      $d04->setD03($d03_array[36]);
      $d04->setDate(date_create('2002-09-01T00:00:00+0000'));
      $d04->setTexte('Récitation: testeur de piles');
      $d04->setPdf('20020901_Epreuve_Mecatronique_testeur_de_piles.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[374] = $d04;
      // 375
      $d04 = new D04Document();
      $d04->setD80($d80_array[14]);
      $d04->setD01($d01_array[66]);
      $d04->setD02($d02_array[42]);
      $d04->setD03($d03_array[37]);
      $d04->setDate(date_create('2001-09-01T00:00:00+0000'));
      $d04->setTexte('Relevé des tensions aux bornes d\'un diviseur de tension');
      $d04->setPdf('20010901_Mecatronique_releve_des_tensions_aux_bornes_d_un_diviseur_de_tension.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[375] = $d04;
      // 376
      $d04 = new D04Document();
      $d04->setD80($d80_array[14]);
      $d04->setD01($d01_array[66]);
      $d04->setD02($d02_array[42]);
      $d04->setD03($d03_array[37]);
      $d04->setDate(date_create('2001-09-01T00:00:00+0000'));
      $d04->setTexte('Relevé de la caractéristique d\'une resistance');
      $d04->setPdf('20010901_Mecatronique_releve_de_la_caracteristique_d_une_resistance.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[376] = $d04;
      // 377
      $d04 = new D04Document();
      $d04->setD80($d80_array[14]);
      $d04->setD01($d01_array[66]);
      $d04->setD02($d02_array[42]);
      $d04->setD03($d03_array[37]);
      $d04->setDate(date_create('2001-09-01T00:00:00+0000'));
      $d04->setTexte('Relevé de la caractéristique d\'un potentiomètre chargé');
      $d04->setPdf('20010901_Mecatronique_releve_de_la_caracteristique_d_un_pot_charge.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[377] = $d04;
      // 378
      $d04 = new D04Document();
      $d04->setD80($d80_array[14]);
      $d04->setD01($d01_array[67]);
      $d04->setD02($d02_array[42]);
      $d04->setD03($d03_array[37]);
      $d04->setDate(date_create('2002-09-01T00:00:00+0000'));
      $d04->setTexte('Sonde logique avec affichage 7 segements');
      $d04->setPdf('20010901_Mecatronique_sonde_logique.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[378] = $d04;
  }

//  public function getOrder()
//  {
//      return 1;
//  }
}
?>