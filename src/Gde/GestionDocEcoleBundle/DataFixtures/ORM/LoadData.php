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
      // 15
      $d80 = new D80Utilisateur();
      $d80->setUsername('Stéphane');
      $d80->setEmail('s.bressani@bluewin.ch');
      $d80->setPassword('awesome');
      $d80->setPhoto('null');
      $d80->setSalt('');
      $d80->setRoles(array('ROLE_USER'));
      $manager->persist($d80);
      $manager->flush();
      $d80_array[15] = $d80;
      /**
      /* D01Periode
       */
      $d01_array = [];
      // 71
      $d01 = new D01Periode();
      $d01->setD80($d80_array[15]);
      $d01->setNom('1ère année CFC');
      $manager->persist($d01);
      $manager->flush();
      $d01_array[71] = $d01;
      // 72
      $d01 = new D01Periode();
      $d01->setD80($d80_array[15]);
      $d01->setNom('2ème année CFC');
      $manager->persist($d01);
      $manager->flush();
      $d01_array[72] = $d01;
      // 73
      $d01 = new D01Periode();
      $d01->setD80($d80_array[15]);
      $d01->setNom('3ème année CFC');
      $manager->persist($d01);
      $manager->flush();
      $d01_array[73] = $d01;
      // 74
      $d01 = new D01Periode();
      $d01->setD80($d80_array[15]);
      $d01->setNom('4ème année CFC');
      $manager->persist($d01);
      $manager->flush();
      $d01_array[74] = $d01;
      // 75
      $d01 = new D01Periode();
      $d01->setD80($d80_array[15]);
      $d01->setNom('1ère année ES');
      $manager->persist($d01);
      $manager->flush();
      $d01_array[75] = $d01;
      /**
      /* D02Branche
       */
      $d02_array = [];
      // 44
      $d02 = new D02Branche();
      $d02->setD80($d80_array[15]);
      $d02->setNom('Delphi');
      $manager->persist($d02);
      $manager->flush();
      $d02_array[44] = $d02;
      // 45
      $d02 = new D02Branche();
      $d02->setD80($d80_array[15]);
      $d02->setNom('C');
      $manager->persist($d02);
      $manager->flush();
      $d02_array[45] = $d02;
      // 46
      $d02 = new D02Branche();
      $d02->setD80($d80_array[15]);
      $d02->setNom('Mécatronique');
      $manager->persist($d02);
      $manager->flush();
      $d02_array[46] = $d02;
      // 47
      $d02 = new D02Branche();
      $d02->setD80($d80_array[15]);
      $d02->setNom('Chimie');
      $manager->persist($d02);
      $manager->flush();
      $d02_array[47] = $d02;
      // 48
      $d02 = new D02Branche();
      $d02->setD80($d80_array[15]);
      $d02->setNom('Math');
      $manager->persist($d02);
      $manager->flush();
      $d02_array[48] = $d02;
      // 49
      $d02 = new D02Branche();
      $d02->setD80($d80_array[15]);
      $d02->setNom('Physique');
      $manager->persist($d02);
      $manager->flush();
      $d02_array[49] = $d02;
      /**
      /* D03Type
       */
      $d03_array = [];
      // 40
      $d03 = new D03Type();
      $d03->setD80($d80_array[15]);
      $d03->setNom('Epreuve');
      $manager->persist($d03);
      $manager->flush();
      $d03_array[40] = $d03;
      // 41
      $d03 = new D03Type();
      $d03->setD80($d80_array[15]);
      $d03->setNom('Exercice');
      $manager->persist($d03);
      $manager->flush();
      $d03_array[41] = $d03;
      // 42
      $d03 = new D03Type();
      $d03->setD80($d80_array[15]);
      $d03->setNom('Support de cours');
      $manager->persist($d03);
      $manager->flush();
      $d03_array[42] = $d03;
      // 43
      $d03 = new D03Type();
      $d03->setD80($d80_array[15]);
      $d03->setNom('Notes');
      $manager->persist($d03);
      $manager->flush();
      $d03_array[43] = $d03;
      /**
      /* D04Document
       */
      $d04_array = [];
      // 379
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[71]);
      $d04->setD02($d02_array[44]);
      $d04->setD03($d03_array[40]);
      $d04->setDate(date_create('2001-06-05T00:00:00+0000'));
      $d04->setTexte('Epreuve Delphi');
      $d04->setPdf('20010605_Epreuve_delphi.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[379] = $d04;
      // 380
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[74]);
      $d04->setD02($d02_array[45]);
      $d04->setD03($d03_array[40]);
      $d04->setDate(date_create('2004-09-01T00:00:00+0000'));
      $d04->setTexte('Epreuve C, Recherche du nombre de nombre pair et impair dans 2 tableaux en utilisant des pointeurs');
      $d04->setPdf('20040901_Epreuve_c.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[380] = $d04;
      // 381
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[72]);
      $d04->setD02($d02_array[44]);
      $d04->setD03($d03_array[40]);
      $d04->setDate(date_create('2003-05-12T00:00:00+0000'));
      $d04->setTexte('Epreuve Delphi');
      $d04->setPdf('20030512_Epreuve_delphi.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[381] = $d04;
      // 382
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[72]);
      $d04->setD02($d02_array[44]);
      $d04->setD03($d03_array[41]);
      $d04->setDate(date_create('2003-03-12T00:00:00+0000'));
      $d04->setTexte('Exercice 3.19, Crée un fifo');
      $d04->setPdf('20030312_Exercice_delphi_fifo.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[382] = $d04;
      // 383
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[72]);
      $d04->setD02($d02_array[44]);
      $d04->setD03($d03_array[41]);
      $d04->setDate(date_create('2002-10-29T00:00:00+0000'));
      $d04->setTexte('Exercice 3.14, Tri un tableau par bubble sort et affiche le résultat');
      $d04->setPdf('20021029_Exercice_delphi_tri_tableau.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[383] = $d04;
      // 384
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[72]);
      $d04->setD02($d02_array[44]);
      $d04->setD03($d03_array[41]);
      $d04->setDate(date_create('2002-10-29T00:00:00+0000'));
      $d04->setTexte('Exercice 3.13, Remplissage d\'un tableau avec des chiffres consécutifs la première valeur étant choisie par l\'utilisateur. Un deuxième tableau permet d\'afficher les valeurs doublées');
      $d04->setPdf('20021029_Exercice_remplissage_tableau.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[384] = $d04;
      // 385
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[72]);
      $d04->setD02($d02_array[44]);
      $d04->setD03($d03_array[40]);
      $d04->setDate(date_create('2003-04-19T00:00:00+0000'));
      $d04->setTexte('Epreuve de l\'exercice 3.19, 3.21 et 3.24');
      $d04->setPdf('20030419_Epreuve_3_prog.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[385] = $d04;
      // 386
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[72]);
      $d04->setD02($d02_array[45]);
      $d04->setD03($d03_array[41]);
      $d04->setDate(date_create('2003-04-05T00:00:00+0000'));
      $d04->setTexte('Affiche le temps réel et la date en temps local');
      $d04->setPdf('20030405_Exercice_c_DisplayTime.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[386] = $d04;
      // 387
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[73]);
      $d04->setD02($d02_array[44]);
      $d04->setD03($d03_array[40]);
      $d04->setDate(date_create('2003-11-17T00:00:00+0000'));
      $d04->setTexte('Epreuve sur les StringGrid');
      $d04->setPdf('20031117_Epreuve_Delphi_StringGrid.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[387] = $d04;
      // 388
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[72]);
      $d04->setD02($d02_array[44]);
      $d04->setD03($d03_array[41]);
      $d04->setDate(date_create('2002-09-09T00:00:00+0000'));
      $d04->setTexte('Exercice 3.5, Changement de base decimal, octal, binaire et hexadécimal');
      $d04->setPdf('20020909_Exerice_Delphi_Changement_de_base.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[388] = $d04;
      // 389
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[71]);
      $d04->setD02($d02_array[46]);
      $d04->setD03($d03_array[40]);
      $d04->setDate(date_create('2001-09-01T00:00:00+0000'));
      $d04->setTexte('Epreuves de mécatronique sur le code des couleurs des resistances');
      $d04->setPdf('20010901_Epreuve_Mecatronique_sur_le_code_des_couleurs.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[389] = $d04;
      // 390
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[71]);
      $d04->setD02($d02_array[46]);
      $d04->setD03($d03_array[42]);
      $d04->setDate(date_create('2001-09-01T00:00:00+0000'));
      $d04->setTexte('Support de cours de mécatronique');
      $d04->setPdf('20010901_Cours_Mecatronique_et_notes.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[390] = $d04;
      // 391
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[73]);
      $d04->setD02($d02_array[47]);
      $d04->setD03($d03_array[42]);
      $d04->setDate(date_create('2003-09-01T00:00:00+0000'));
      $d04->setTexte('Liaison et réactions chimique - Chapitre 0');
      $d04->setPdf('20030901_Liaisons_et_reactions_chimique_chapitre0.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[391] = $d04;
      // 392
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[73]);
      $d04->setD02($d02_array[47]);
      $d04->setD03($d03_array[42]);
      $d04->setDate(date_create('2003-09-01T00:00:00+0000'));
      $d04->setTexte('Liaison et réactions chimique - Chapitre 1 - La molécule');
      $d04->setPdf('20030901_Liaisons_et_reactions_chimique_chapitre1.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[392] = $d04;
      // 393
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[73]);
      $d04->setD02($d02_array[47]);
      $d04->setD03($d03_array[42]);
      $d04->setDate(date_create('2003-09-01T00:00:00+0000'));
      $d04->setTexte('Liaison et réactions chimique - Chapitre 2 - Les liaisons ioniques');
      $d04->setPdf('20030901_Liaisons_et_reactions_chimique_chapitre2.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[393] = $d04;
      // 394
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[73]);
      $d04->setD02($d02_array[47]);
      $d04->setD03($d03_array[42]);
      $d04->setDate(date_create('2003-09-01T00:00:00+0000'));
      $d04->setTexte('Liaison et réactions chimique - Chapitre 3 - Les liaisons covalentes');
      $d04->setPdf('20030901_Liaisons_et_reactions_chimique_chapitre3.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[394] = $d04;
      // 395
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[73]);
      $d04->setD02($d02_array[47]);
      $d04->setD03($d03_array[42]);
      $d04->setDate(date_create('2003-09-01T00:00:00+0000'));
      $d04->setTexte('Liaison et réactions chimique - Chapitre 4 - Détermination des formules et des compositions');
      $d04->setPdf('20030901_Liaisons_et_reactions_chimique_chapitre4.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[395] = $d04;
      // 396
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[73]);
      $d04->setD02($d02_array[47]);
      $d04->setD03($d03_array[42]);
      $d04->setDate(date_create('2003-09-01T00:00:00+0000'));
      $d04->setTexte('Liaison et réactions chimique - Chapitre 5 - La réaction chimique');
      $d04->setPdf('20030901_Liaisons_et_reactions_chimique_chapitre5.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[396] = $d04;
      // 397
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[73]);
      $d04->setD02($d02_array[47]);
      $d04->setD03($d03_array[42]);
      $d04->setDate(date_create('2003-09-01T00:00:00+0000'));
      $d04->setTexte('Liaison et réactions chimique - Chapitre 6 - Notion de toxicologie');
      $d04->setPdf('20030901_Liaisons_et_reactions_chimique_chapitre6.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[397] = $d04;
      // 398
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[73]);
      $d04->setD02($d02_array[47]);
      $d04->setD03($d03_array[42]);
      $d04->setDate(date_create('2003-09-01T00:00:00+0000'));
      $d04->setTexte('Classification périodique des éléments');
      $d04->setPdf('20030901_Clasification_periodique_des_elements.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[398] = $d04;
      // 399
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[73]);
      $d04->setD02($d02_array[47]);
      $d04->setD03($d03_array[42]);
      $d04->setDate(date_create('2003-09-02T00:00:00+0000'));
      $d04->setTexte('Solutions et reactions chimique - Chapitre 0');
      $d04->setPdf('20030902_Solutions_et_reactions_chimique_chapitre0.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[399] = $d04;
      // 400
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[73]);
      $d04->setD02($d02_array[47]);
      $d04->setD03($d03_array[42]);
      $d04->setDate(date_create('2003-09-02T00:00:00+0000'));
      $d04->setTexte('Solutions et reactions chimique - Chapitre 1 - Les solutions');
      $d04->setPdf('20030902_Solutions_et_reactions_chimique_chapitre1.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[400] = $d04;
      // 401
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[73]);
      $d04->setD02($d02_array[47]);
      $d04->setD03($d03_array[42]);
      $d04->setDate(date_create('2003-09-02T00:00:00+0000'));
      $d04->setTexte('Solutions et reactions chimique - Chapitre 2 - Acides et bases');
      $d04->setPdf('20030902_Solutions_et_reactions_chimique_chapitre2.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[401] = $d04;
      // 402
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[73]);
      $d04->setD02($d02_array[47]);
      $d04->setD03($d03_array[42]);
      $d04->setDate(date_create('2003-09-02T00:00:00+0000'));
      $d04->setTexte('Solutions et reactions chimique - Chapitre 3 - Réactions de précipitation et de neutralisation');
      $d04->setPdf('20030902_Solutions_et_reactions_chimique_chapitre3.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[402] = $d04;
      // 403
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[73]);
      $d04->setD02($d02_array[47]);
      $d04->setD03($d03_array[42]);
      $d04->setDate(date_create('2003-09-02T00:00:00+0000'));
      $d04->setTexte('Solutions et reactions chimique - Chapitre 4 - Le pH, mesure d\'acidité');
      $d04->setPdf('20030902_Solutions_et_reactions_chimique_chapitre4.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[403] = $d04;
      // 404
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[73]);
      $d04->setD02($d02_array[47]);
      $d04->setD03($d03_array[42]);
      $d04->setDate(date_create('2003-09-02T00:00:00+0000'));
      $d04->setTexte('Solutions et reactions chimique - Chapitre 5 - Le titrage');
      $d04->setPdf('20030902_Solutions_et_reactions_chimique_chapitre5.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[404] = $d04;
      // 405
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[73]);
      $d04->setD02($d02_array[47]);
      $d04->setD03($d03_array[42]);
      $d04->setDate(date_create('2003-09-02T00:00:00+0000'));
      $d04->setTexte('Solutions et reactions chimique - Chapitre 6 - La valence et le degré d\'oxydation');
      $d04->setPdf('20030902_Solutions_et_reactions_chimique_chapitre6.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[405] = $d04;
      // 406
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[73]);
      $d04->setD02($d02_array[47]);
      $d04->setD03($d03_array[42]);
      $d04->setDate(date_create('2003-09-02T00:00:00+0000'));
      $d04->setTexte('Solutions et reactions chimique - Chapitre 7 - Oxydoréduction');
      $d04->setPdf('20030902_Solutions_et_reactions_chimique_chapitre7.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[406] = $d04;
      // 407
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[73]);
      $d04->setD02($d02_array[47]);
      $d04->setD03($d03_array[42]);
      $d04->setDate(date_create('2003-09-02T00:00:00+0000'));
      $d04->setTexte('Solutions et reactions chimique - Chapitre 8 - Electrolyse');
      $d04->setPdf('20030902_Solutions_et_reactions_chimique_chapitre8.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[407] = $d04;
      // 408
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[73]);
      $d04->setD02($d02_array[47]);
      $d04->setD03($d03_array[42]);
      $d04->setDate(date_create('2003-09-02T00:00:00+0000'));
      $d04->setTexte('Solutions et reactions chimique - Chapitre 9 - Piles et accumulateurs');
      $d04->setPdf('20030902_Solutions_et_reactions_chimique_chapitre9.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[408] = $d04;
      // 409
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[73]);
      $d04->setD02($d02_array[47]);
      $d04->setD03($d03_array[42]);
      $d04->setDate(date_create('2003-09-03T00:00:00+0000'));
      $d04->setTexte('Chimie organique - Chapitre 1 - Notions de base');
      $d04->setPdf('20030903_Chimie_organique_chapitre1.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[409] = $d04;
      // 410
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[73]);
      $d04->setD02($d02_array[47]);
      $d04->setD03($d03_array[42]);
      $d04->setDate(date_create('2003-09-03T00:00:00+0000'));
      $d04->setTexte('Chimie organique - Chapitre 2 - Les hydrocarbures');
      $d04->setPdf('20030903_Chimie_organique_chapitre2.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[410] = $d04;
      // 411
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[73]);
      $d04->setD02($d02_array[47]);
      $d04->setD03($d03_array[42]);
      $d04->setDate(date_create('2003-09-04T00:00:00+0000'));
      $d04->setTexte('Les fonctions chimiques');
      $d04->setPdf('20030904_Chimie_les_fonctions_chimique.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[411] = $d04;
      // 412
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[73]);
      $d04->setD02($d02_array[47]);
      $d04->setD03($d03_array[42]);
      $d04->setDate(date_create('2003-09-05T00:00:00+0000'));
      $d04->setTexte('Les matières plastiques');
      $d04->setPdf('20030905_Chimie_les_matieres_platstiques.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[412] = $d04;
      // 413
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[73]);
      $d04->setD02($d02_array[47]);
      $d04->setD03($d03_array[40]);
      $d04->setDate(date_create('2004-04-29T00:00:00+0000'));
      $d04->setTexte('Epreuve de chimie');
      $d04->setPdf('20040429_Epreuve_chimie.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[413] = $d04;
      // 414
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[72]);
      $d04->setD02($d02_array[46]);
      $d04->setD03($d03_array[42]);
      $d04->setDate(date_create('2002-09-01T00:00:00+0000'));
      $d04->setTexte('Les piles ou générateurs primaires');
      $d04->setPdf('20020901_Mecatronique_les_piles_ou_generateur_primaires.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[414] = $d04;
      // 415
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[72]);
      $d04->setD02($d02_array[46]);
      $d04->setD03($d03_array[42]);
      $d04->setDate(date_create('2002-09-01T00:00:00+0000'));
      $d04->setTexte('Introduction à Orcad Capture et Orcad Layout');
      $d04->setPdf('20020901_Mecatronique_orcad.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[415] = $d04;
      // 416
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[72]);
      $d04->setD02($d02_array[46]);
      $d04->setD03($d03_array[42]);
      $d04->setDate(date_create('2002-09-01T00:00:00+0000'));
      $d04->setTexte('Le multimètre Fluke 73');
      $d04->setPdf('20020901_Mecatronique_le_multimetre_fluke_73.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[416] = $d04;
      // 417
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[72]);
      $d04->setD02($d02_array[46]);
      $d04->setD03($d03_array[42]);
      $d04->setDate(date_create('2002-09-01T00:00:00+0000'));
      $d04->setTexte('L\'osciloscope');
      $d04->setPdf('20020901_Mecatronique_l_osciloscope.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[417] = $d04;
      // 418
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[72]);
      $d04->setD02($d02_array[46]);
      $d04->setD03($d03_array[42]);
      $d04->setDate(date_create('2002-09-01T00:00:00+0000'));
      $d04->setTexte('Les accumulateurs NiCd et NIMH');
      $d04->setPdf('20020901_Mecatronique_les_accumulateurs_nicd_et_nimh.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[418] = $d04;
      // 419
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[72]);
      $d04->setD02($d02_array[46]);
      $d04->setD03($d03_array[40]);
      $d04->setDate(date_create('2002-09-01T00:00:00+0000'));
      $d04->setTexte('Epreuve sur les accumulateurs');
      $d04->setPdf('20020901_Mecatronique_epreuve_accu.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[419] = $d04;
      // 420
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[71]);
      $d04->setD02($d02_array[46]);
      $d04->setD03($d03_array[40]);
      $d04->setDate(date_create('2001-09-01T00:00:00+0000'));
      $d04->setTexte('Epreuves de mécatronique sur le code des couleurs des resistances, suite');
      $d04->setPdf('20010901_Epreuve_Mecatronique_sur_le_code_des_couleurs_suite.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[420] = $d04;
      // 421
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[71]);
      $d04->setD02($d02_array[46]);
      $d04->setD03($d03_array[40]);
      $d04->setDate(date_create('2001-09-01T00:00:00+0000'));
      $d04->setTexte('Epreuves de mécatronique');
      $d04->setPdf('20010901_Epreuve_Mecatronique_1.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[421] = $d04;
      // 422
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[71]);
      $d04->setD02($d02_array[46]);
      $d04->setD03($d03_array[40]);
      $d04->setDate(date_create('2001-09-01T00:00:00+0000'));
      $d04->setTexte('Epreuves de mécatronique sur les condensateurs');
      $d04->setPdf('20010901_Epreuve_Mecatronique_les_condensateurs.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[422] = $d04;
      // 423
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[72]);
      $d04->setD02($d02_array[46]);
      $d04->setD03($d03_array[43]);
      $d04->setDate(date_create('2002-09-01T00:00:00+0000'));
      $d04->setTexte('Notes sur les piles');
      $d04->setPdf('20020901_Mecatronique_notes_piles.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[423] = $d04;
      // 424
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[71]);
      $d04->setD02($d02_array[46]);
      $d04->setD03($d03_array[43]);
      $d04->setDate(date_create('2001-09-01T00:00:00+0000'));
      $d04->setTexte('Notes sur les resistances');
      $d04->setPdf('20010901_Mecatronique_notes_resistances.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[424] = $d04;
      // 425
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[71]);
      $d04->setD02($d02_array[46]);
      $d04->setD03($d03_array[42]);
      $d04->setDate(date_create('2001-09-01T00:00:00+0000'));
      $d04->setTexte('Support de cours de mécatronique, suite dans un autre tas de feuilles');
      $d04->setPdf('20010901_Mecatronique_support_de_cours_suite.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[425] = $d04;
      // 426
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[71]);
      $d04->setD02($d02_array[46]);
      $d04->setD03($d03_array[42]);
      $d04->setDate(date_create('2001-09-01T00:00:00+0000'));
      $d04->setTexte('Support de cours de mécatronique, suite dans un autre tas de feuilles, explication sur les potentiomètres');
      $d04->setPdf('20010901_Mecatronique_support_de_cours_suite_pot.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[426] = $d04;
      // 427
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[71]);
      $d04->setD02($d02_array[46]);
      $d04->setD03($d03_array[40]);
      $d04->setDate(date_create('2001-09-01T00:00:00+0000'));
      $d04->setTexte('Epreuve sur les caractéristiques statique de différentes diodes');
      $d04->setPdf('20010901_Epreuve_Mecatronique_carasteristique_statique_de_differentes_diodes.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[427] = $d04;
      // 428
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[71]);
      $d04->setD02($d02_array[46]);
      $d04->setD03($d03_array[40]);
      $d04->setDate(date_create('2001-09-01T00:00:00+0000'));
      $d04->setTexte('Epreuve sur le relevé de tensions aux bornes d\'un diviseur de tension');
      $d04->setPdf('20010901_Epreuve_Mecatronique_releve_des_tensions_aux_bornes_d_un_diviseur_de_tension.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[428] = $d04;
      // 429
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[71]);
      $d04->setD02($d02_array[46]);
      $d04->setD03($d03_array[40]);
      $d04->setDate(date_create('2001-09-01T00:00:00+0000'));
      $d04->setTexte('Epreuve sur le relevé des caractéristiques d\'un potentiomètre chargé');
      $d04->setPdf('20010901_Epreuve_Mecatronique_releve_des_caracteristiques_d_un_pot_charge.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[429] = $d04;
      // 430
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[72]);
      $d04->setD02($d02_array[46]);
      $d04->setD03($d03_array[40]);
      $d04->setDate(date_create('2002-09-01T00:00:00+0000'));
      $d04->setTexte('Récitation: testeur de piles');
      $d04->setPdf('20020901_Epreuve_Mecatronique_testeur_de_piles.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[430] = $d04;
      // 431
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[71]);
      $d04->setD02($d02_array[46]);
      $d04->setD03($d03_array[41]);
      $d04->setDate(date_create('2001-09-01T00:00:00+0000'));
      $d04->setTexte('Relevé des tensions aux bornes d\'un diviseur de tension');
      $d04->setPdf('20010901_Mecatronique_releve_des_tensions_aux_bornes_d_un_diviseur_de_tension.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[431] = $d04;
      // 432
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[71]);
      $d04->setD02($d02_array[46]);
      $d04->setD03($d03_array[41]);
      $d04->setDate(date_create('2001-09-01T00:00:00+0000'));
      $d04->setTexte('Relevé de la caractéristique d\'une resistance');
      $d04->setPdf('20010901_Mecatronique_releve_de_la_caracteristique_d_une_resistance.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[432] = $d04;
      // 433
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[71]);
      $d04->setD02($d02_array[46]);
      $d04->setD03($d03_array[41]);
      $d04->setDate(date_create('2001-09-01T00:00:00+0000'));
      $d04->setTexte('Relevé de la caractéristique d\'un potentiomètre chargé');
      $d04->setPdf('20010901_Mecatronique_releve_de_la_caracteristique_d_un_pot_charge.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[433] = $d04;
      // 434
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[72]);
      $d04->setD02($d02_array[46]);
      $d04->setD03($d03_array[41]);
      $d04->setDate(date_create('2002-09-01T00:00:00+0000'));
      $d04->setTexte('Sonde logique avec affichage 7 segements');
      $d04->setPdf('20010901_Mecatronique_sonde_logique.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[434] = $d04;
      // 435
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[71]);
      $d04->setD02($d02_array[48]);
      $d04->setD03($d03_array[40]);
      $d04->setDate(date_create('2001-10-22T00:00:00+0000'));
      $d04->setTexte('Epreuve de math');
      $d04->setPdf('20011022_Epreuve_Math.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[435] = $d04;
      // 436
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[71]);
      $d04->setD02($d02_array[48]);
      $d04->setD03($d03_array[40]);
      $d04->setDate(date_create('2002-03-11T00:00:00+0000'));
      $d04->setTexte('Epreuve de math');
      $d04->setPdf('20020311_Epreuve_Math.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[436] = $d04;
      // 437
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[71]);
      $d04->setD02($d02_array[48]);
      $d04->setD03($d03_array[40]);
      $d04->setDate(date_create('2001-12-17T00:00:00+0000'));
      $d04->setTexte('Epreuve de math');
      $d04->setPdf('20011217_Epreuve_Math.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[437] = $d04;
      // 438
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[71]);
      $d04->setD02($d02_array[48]);
      $d04->setD03($d03_array[40]);
      $d04->setDate(date_create('2002-05-08T00:00:00+0000'));
      $d04->setTexte('Epreuve de math');
      $d04->setPdf('20020608_Epreuve_Math.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[438] = $d04;
      // 439
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[71]);
      $d04->setD02($d02_array[49]);
      $d04->setD03($d03_array[40]);
      $d04->setDate(date_create('2001-09-01T00:00:00+0000'));
      $d04->setTexte('Epreuve de physique');
      $d04->setPdf('20010901_Epreuve_Physique.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[439] = $d04;
      // 440
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[72]);
      $d04->setD02($d02_array[48]);
      $d04->setD03($d03_array[40]);
      $d04->setDate(date_create('2002-10-10T00:00:00+0000'));
      $d04->setTexte('Epreuve de math sur les puissances et racines');
      $d04->setPdf('20021010_Epreuve_Math.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[440] = $d04;
      // 441
      $d04 = new D04Document();
      $d04->setD80($d80_array[15]);
      $d04->setD01($d01_array[73]);
      $d04->setD02($d02_array[48]);
      $d04->setD03($d03_array[40]);
      $d04->setDate(date_create('2004-03-01T00:00:00+0000'));
      $d04->setTexte('Epreuve de math sur les problèmes du 1er degré');
      $d04->setPdf('20040301_Epreuve_Math.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[441] = $d04;
  }

//  public function getOrder()
//  {
//      return 1;
//  }
}
?>