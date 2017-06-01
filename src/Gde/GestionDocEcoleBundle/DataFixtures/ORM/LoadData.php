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
      // 13
      $d80 = new D80Utilisateur();
      $d80->setUsername('Stéphane');
      $d80->setEmail('s.bressani@bluewin.ch');
      $d80->setPassword('awesome');
      $d80->setPhoto('null');
      $d80->setSalt('');
      $d80->setRoles(array('ROLE_USER'));
      $manager->persist($d80);
      $manager->flush();
      $d80_array[13] = $d80;
      /**
      /* D01Periode
       */
      $d01_array = [];
      // 61
      $d01 = new D01Periode();
      $d01->setD80($d80_array[13]);
      $d01->setNom('1ère année CFC');
      $manager->persist($d01);
      $manager->flush();
      $d01_array[61] = $d01;
      // 62
      $d01 = new D01Periode();
      $d01->setD80($d80_array[13]);
      $d01->setNom('2ème année CFC');
      $manager->persist($d01);
      $manager->flush();
      $d01_array[62] = $d01;
      // 63
      $d01 = new D01Periode();
      $d01->setD80($d80_array[13]);
      $d01->setNom('3ème année CFC');
      $manager->persist($d01);
      $manager->flush();
      $d01_array[63] = $d01;
      // 64
      $d01 = new D01Periode();
      $d01->setD80($d80_array[13]);
      $d01->setNom('4ème année CFC');
      $manager->persist($d01);
      $manager->flush();
      $d01_array[64] = $d01;
      // 65
      $d01 = new D01Periode();
      $d01->setD80($d80_array[13]);
      $d01->setNom('1ère année ES');
      $manager->persist($d01);
      $manager->flush();
      $d01_array[65] = $d01;
      /**
      /* D02Branche
       */
      $d02_array = [];
      // 36
      $d02 = new D02Branche();
      $d02->setD80($d80_array[13]);
      $d02->setNom('Delphi');
      $manager->persist($d02);
      $manager->flush();
      $d02_array[36] = $d02;
      // 37
      $d02 = new D02Branche();
      $d02->setD80($d80_array[13]);
      $d02->setNom('C');
      $manager->persist($d02);
      $manager->flush();
      $d02_array[37] = $d02;
      // 38
      $d02 = new D02Branche();
      $d02->setD80($d80_array[13]);
      $d02->setNom('Mécatronique');
      $manager->persist($d02);
      $manager->flush();
      $d02_array[38] = $d02;
      // 39
      $d02 = new D02Branche();
      $d02->setD80($d80_array[13]);
      $d02->setNom('Chimie');
      $manager->persist($d02);
      $manager->flush();
      $d02_array[39] = $d02;
      /**
      /* D03Type
       */
      $d03_array = [];
      // 32
      $d03 = new D03Type();
      $d03->setD80($d80_array[13]);
      $d03->setNom('Epreuve');
      $manager->persist($d03);
      $manager->flush();
      $d03_array[32] = $d03;
      // 33
      $d03 = new D03Type();
      $d03->setD80($d80_array[13]);
      $d03->setNom('Exercice');
      $manager->persist($d03);
      $manager->flush();
      $d03_array[33] = $d03;
      // 34
      $d03 = new D03Type();
      $d03->setD80($d80_array[13]);
      $d03->setNom('Support de cours');
      $manager->persist($d03);
      $manager->flush();
      $d03_array[34] = $d03;
      // 35
      $d03 = new D03Type();
      $d03->setD80($d80_array[13]);
      $d03->setNom('Notes');
      $manager->persist($d03);
      $manager->flush();
      $d03_array[35] = $d03;
      /**
      /* D04Document
       */
      $d04_array = [];
      // 275
      $d04 = new D04Document();
      $d04->setD80($d80_array[13]);
      $d04->setD01($d01_array[61]);
      $d04->setD02($d02_array[36]);
      $d04->setD03($d03_array[32]);
      $d04->setDate(date_create('2001-06-05T00:00:00+0000'));
      $d04->setTexte('Epreuve Delphi');
      $d04->setPdf('20010605_Epreuve_delphi.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[275] = $d04;
      // 276
      $d04 = new D04Document();
      $d04->setD80($d80_array[13]);
      $d04->setD01($d01_array[64]);
      $d04->setD02($d02_array[37]);
      $d04->setD03($d03_array[32]);
      $d04->setDate(date_create('2004-09-01T00:00:00+0000'));
      $d04->setTexte('Epreuve C, Recherche du nombre de nombre pair et impair dans 2 tableaux en utilisant des pointeurs');
      $d04->setPdf('20040901_Epreuve_c.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[276] = $d04;
      // 277
      $d04 = new D04Document();
      $d04->setD80($d80_array[13]);
      $d04->setD01($d01_array[62]);
      $d04->setD02($d02_array[36]);
      $d04->setD03($d03_array[32]);
      $d04->setDate(date_create('2003-05-12T00:00:00+0000'));
      $d04->setTexte('Epreuve Delphi');
      $d04->setPdf('20030512_Epreuve_delphi.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[277] = $d04;
      // 278
      $d04 = new D04Document();
      $d04->setD80($d80_array[13]);
      $d04->setD01($d01_array[62]);
      $d04->setD02($d02_array[36]);
      $d04->setD03($d03_array[33]);
      $d04->setDate(date_create('2003-03-12T00:00:00+0000'));
      $d04->setTexte('Exercice 3.19, Crée un fifo');
      $d04->setPdf('20030312_Exercice_delphi_fifo.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[278] = $d04;
      // 279
      $d04 = new D04Document();
      $d04->setD80($d80_array[13]);
      $d04->setD01($d01_array[62]);
      $d04->setD02($d02_array[36]);
      $d04->setD03($d03_array[33]);
      $d04->setDate(date_create('2002-10-29T00:00:00+0000'));
      $d04->setTexte('Exercice 3.14, Tri un tableau par bubble sort et affiche le résultat');
      $d04->setPdf('20021029_Exercice_delphi_tri_tableau.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[279] = $d04;
      // 280
      $d04 = new D04Document();
      $d04->setD80($d80_array[13]);
      $d04->setD01($d01_array[62]);
      $d04->setD02($d02_array[36]);
      $d04->setD03($d03_array[33]);
      $d04->setDate(date_create('2002-10-29T00:00:00+0000'));
      $d04->setTexte('Exercice 3.13, Remplissage d\'un tableau avec des chiffres consécutifs la première valeur étant choisie par l\'utilisateur. Un deuxième tableau permet d\'afficher les valeurs doublées');
      $d04->setPdf('20021029_Exercice_remplissage_tableau.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[280] = $d04;
      // 281
      $d04 = new D04Document();
      $d04->setD80($d80_array[13]);
      $d04->setD01($d01_array[62]);
      $d04->setD02($d02_array[36]);
      $d04->setD03($d03_array[32]);
      $d04->setDate(date_create('2003-04-19T00:00:00+0000'));
      $d04->setTexte('Epreuve de l\'exercice 3.19, 3.21 et 3.24');
      $d04->setPdf('20030419_Epreuve_3_prog.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[281] = $d04;
      // 282
      $d04 = new D04Document();
      $d04->setD80($d80_array[13]);
      $d04->setD01($d01_array[62]);
      $d04->setD02($d02_array[37]);
      $d04->setD03($d03_array[33]);
      $d04->setDate(date_create('2003-04-05T00:00:00+0000'));
      $d04->setTexte('Affiche le temps réel et la date en temps local');
      $d04->setPdf('20030405_Exercice_c_DisplayTime.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[282] = $d04;
      // 283
      $d04 = new D04Document();
      $d04->setD80($d80_array[13]);
      $d04->setD01($d01_array[63]);
      $d04->setD02($d02_array[36]);
      $d04->setD03($d03_array[32]);
      $d04->setDate(date_create('2003-11-17T00:00:00+0000'));
      $d04->setTexte('Epreuve sur les StringGrid');
      $d04->setPdf('20031117_Epreuve_Delphi_StringGrid.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[283] = $d04;
      // 284
      $d04 = new D04Document();
      $d04->setD80($d80_array[13]);
      $d04->setD01($d01_array[62]);
      $d04->setD02($d02_array[36]);
      $d04->setD03($d03_array[33]);
      $d04->setDate(date_create('2002-09-09T00:00:00+0000'));
      $d04->setTexte('Exercice 3.5, Changement de base decimal, octal, binaire et hexadécimal');
      $d04->setPdf('20020909_Exerice_Delphi_Changement_de_base.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[284] = $d04;
      // 285
      $d04 = new D04Document();
      $d04->setD80($d80_array[13]);
      $d04->setD01($d01_array[61]);
      $d04->setD02($d02_array[38]);
      $d04->setD03($d03_array[32]);
      $d04->setDate(date_create('2001-09-01T00:00:00+0000'));
      $d04->setTexte('Epreuves de mécatronique sur le code des couleurs des resistances');
      $d04->setPdf('20010901_Epreuve_Mecatronique_sur_le_code_des_couleurs.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[285] = $d04;
      // 286
      $d04 = new D04Document();
      $d04->setD80($d80_array[13]);
      $d04->setD01($d01_array[61]);
      $d04->setD02($d02_array[38]);
      $d04->setD03($d03_array[34]);
      $d04->setDate(date_create('2001-09-01T00:00:00+0000'));
      $d04->setTexte('Support de cours de mécatronique');
      $d04->setPdf('20010901_Cours_Mecatronique_et_notes.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[286] = $d04;
      // 287
      $d04 = new D04Document();
      $d04->setD80($d80_array[13]);
      $d04->setD01($d01_array[63]);
      $d04->setD02($d02_array[39]);
      $d04->setD03($d03_array[34]);
      $d04->setDate(date_create('2003-09-01T00:00:00+0000'));
      $d04->setTexte('Liaison et réactions chimique - Chapitre 0');
      $d04->setPdf('20030901_Liaisons_et_reactions_chimique_chapitre0.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[287] = $d04;
      // 288
      $d04 = new D04Document();
      $d04->setD80($d80_array[13]);
      $d04->setD01($d01_array[63]);
      $d04->setD02($d02_array[39]);
      $d04->setD03($d03_array[34]);
      $d04->setDate(date_create('2003-09-01T00:00:00+0000'));
      $d04->setTexte('Liaison et réactions chimique - Chapitre 1 - La molécule');
      $d04->setPdf('20030901_Liaisons_et_reactions_chimique_chapitre1.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[288] = $d04;
      // 289
      $d04 = new D04Document();
      $d04->setD80($d80_array[13]);
      $d04->setD01($d01_array[63]);
      $d04->setD02($d02_array[39]);
      $d04->setD03($d03_array[34]);
      $d04->setDate(date_create('2003-09-01T00:00:00+0000'));
      $d04->setTexte('Liaison et réactions chimique - Chapitre 2 - Les liaisons ioniques');
      $d04->setPdf('20030901_Liaisons_et_reactions_chimique_chapitre2.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[289] = $d04;
      // 290
      $d04 = new D04Document();
      $d04->setD80($d80_array[13]);
      $d04->setD01($d01_array[63]);
      $d04->setD02($d02_array[39]);
      $d04->setD03($d03_array[34]);
      $d04->setDate(date_create('2003-09-01T00:00:00+0000'));
      $d04->setTexte('Liaison et réactions chimique - Chapitre 3 - Les liaisons covalentes');
      $d04->setPdf('20030901_Liaisons_et_reactions_chimique_chapitre3.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[290] = $d04;
      // 291
      $d04 = new D04Document();
      $d04->setD80($d80_array[13]);
      $d04->setD01($d01_array[63]);
      $d04->setD02($d02_array[39]);
      $d04->setD03($d03_array[34]);
      $d04->setDate(date_create('2003-09-01T00:00:00+0000'));
      $d04->setTexte('Liaison et réactions chimique - Chapitre 4 - Détermination des formules et des compositions');
      $d04->setPdf('20030901_Liaisons_et_reactions_chimique_chapitre4.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[291] = $d04;
      // 292
      $d04 = new D04Document();
      $d04->setD80($d80_array[13]);
      $d04->setD01($d01_array[63]);
      $d04->setD02($d02_array[39]);
      $d04->setD03($d03_array[34]);
      $d04->setDate(date_create('2003-09-01T00:00:00+0000'));
      $d04->setTexte('Liaison et réactions chimique - Chapitre 5 - La réaction chimique');
      $d04->setPdf('20030901_Liaisons_et_reactions_chimique_chapitre5.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[292] = $d04;
      // 293
      $d04 = new D04Document();
      $d04->setD80($d80_array[13]);
      $d04->setD01($d01_array[63]);
      $d04->setD02($d02_array[39]);
      $d04->setD03($d03_array[34]);
      $d04->setDate(date_create('2003-09-01T00:00:00+0000'));
      $d04->setTexte('Liaison et réactions chimique - Chapitre 6 - Notion de toxicologie');
      $d04->setPdf('20030901_Liaisons_et_reactions_chimique_chapitre6.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[293] = $d04;
      // 294
      $d04 = new D04Document();
      $d04->setD80($d80_array[13]);
      $d04->setD01($d01_array[63]);
      $d04->setD02($d02_array[39]);
      $d04->setD03($d03_array[34]);
      $d04->setDate(date_create('2003-09-01T00:00:00+0000'));
      $d04->setTexte('Classification périodique des éléments');
      $d04->setPdf('20030901_Clasification_periodique_des_elements.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[294] = $d04;
      // 295
      $d04 = new D04Document();
      $d04->setD80($d80_array[13]);
      $d04->setD01($d01_array[63]);
      $d04->setD02($d02_array[39]);
      $d04->setD03($d03_array[34]);
      $d04->setDate(date_create('2003-09-02T00:00:00+0000'));
      $d04->setTexte('Solutions et reactions chimique - Chapitre 0');
      $d04->setPdf('20030902_Solutions_et_reactions_chimique_chapitre0.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[295] = $d04;
      // 296
      $d04 = new D04Document();
      $d04->setD80($d80_array[13]);
      $d04->setD01($d01_array[63]);
      $d04->setD02($d02_array[39]);
      $d04->setD03($d03_array[34]);
      $d04->setDate(date_create('2003-09-02T00:00:00+0000'));
      $d04->setTexte('Solutions et reactions chimique - Chapitre 1 - Les solutions');
      $d04->setPdf('20030902_Solutions_et_reactions_chimique_chapitre1.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[296] = $d04;
      // 297
      $d04 = new D04Document();
      $d04->setD80($d80_array[13]);
      $d04->setD01($d01_array[63]);
      $d04->setD02($d02_array[39]);
      $d04->setD03($d03_array[34]);
      $d04->setDate(date_create('2003-09-02T00:00:00+0000'));
      $d04->setTexte('Solutions et reactions chimique - Chapitre 2 - Acides et bases');
      $d04->setPdf('20030902_Solutions_et_reactions_chimique_chapitre2.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[297] = $d04;
      // 298
      $d04 = new D04Document();
      $d04->setD80($d80_array[13]);
      $d04->setD01($d01_array[63]);
      $d04->setD02($d02_array[39]);
      $d04->setD03($d03_array[34]);
      $d04->setDate(date_create('2003-09-02T00:00:00+0000'));
      $d04->setTexte('Solutions et reactions chimique - Chapitre 3 - Réactions de précipitation et de neutralisation');
      $d04->setPdf('20030902_Solutions_et_reactions_chimique_chapitre3.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[298] = $d04;
      // 299
      $d04 = new D04Document();
      $d04->setD80($d80_array[13]);
      $d04->setD01($d01_array[63]);
      $d04->setD02($d02_array[39]);
      $d04->setD03($d03_array[34]);
      $d04->setDate(date_create('2003-09-02T00:00:00+0000'));
      $d04->setTexte('Solutions et reactions chimique - Chapitre 4 - Le pH, mesure d\'acidité');
      $d04->setPdf('20030902_Solutions_et_reactions_chimique_chapitre4.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[299] = $d04;
      // 300
      $d04 = new D04Document();
      $d04->setD80($d80_array[13]);
      $d04->setD01($d01_array[63]);
      $d04->setD02($d02_array[39]);
      $d04->setD03($d03_array[34]);
      $d04->setDate(date_create('2003-09-02T00:00:00+0000'));
      $d04->setTexte('Solutions et reactions chimique - Chapitre 5 - Le titrage');
      $d04->setPdf('20030902_Solutions_et_reactions_chimique_chapitre5.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[300] = $d04;
      // 301
      $d04 = new D04Document();
      $d04->setD80($d80_array[13]);
      $d04->setD01($d01_array[63]);
      $d04->setD02($d02_array[39]);
      $d04->setD03($d03_array[34]);
      $d04->setDate(date_create('2003-09-02T00:00:00+0000'));
      $d04->setTexte('Solutions et reactions chimique - Chapitre 6 - La valence et le degré d\'oxydation');
      $d04->setPdf('20030902_Solutions_et_reactions_chimique_chapitre6.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[301] = $d04;
      // 302
      $d04 = new D04Document();
      $d04->setD80($d80_array[13]);
      $d04->setD01($d01_array[63]);
      $d04->setD02($d02_array[39]);
      $d04->setD03($d03_array[34]);
      $d04->setDate(date_create('2003-09-02T00:00:00+0000'));
      $d04->setTexte('Solutions et reactions chimique - Chapitre 7 - Oxydoréduction');
      $d04->setPdf('20030902_Solutions_et_reactions_chimique_chapitre7.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[302] = $d04;
      // 303
      $d04 = new D04Document();
      $d04->setD80($d80_array[13]);
      $d04->setD01($d01_array[63]);
      $d04->setD02($d02_array[39]);
      $d04->setD03($d03_array[34]);
      $d04->setDate(date_create('2003-09-02T00:00:00+0000'));
      $d04->setTexte('Solutions et reactions chimique - Chapitre 8 - Electrolyse');
      $d04->setPdf('20030902_Solutions_et_reactions_chimique_chapitre8.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[303] = $d04;
      // 304
      $d04 = new D04Document();
      $d04->setD80($d80_array[13]);
      $d04->setD01($d01_array[63]);
      $d04->setD02($d02_array[39]);
      $d04->setD03($d03_array[34]);
      $d04->setDate(date_create('2003-09-02T00:00:00+0000'));
      $d04->setTexte('Solutions et reactions chimique - Chapitre 9 - Piles et accumulateurs');
      $d04->setPdf('20030902_Solutions_et_reactions_chimique_chapitre9.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[304] = $d04;
      // 305
      $d04 = new D04Document();
      $d04->setD80($d80_array[13]);
      $d04->setD01($d01_array[63]);
      $d04->setD02($d02_array[39]);
      $d04->setD03($d03_array[34]);
      $d04->setDate(date_create('2003-09-03T00:00:00+0000'));
      $d04->setTexte('Chimie organique - Chapitre 1 - Notions de base');
      $d04->setPdf('20030903_Chimie_organique_chapitre1.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[305] = $d04;
      // 306
      $d04 = new D04Document();
      $d04->setD80($d80_array[13]);
      $d04->setD01($d01_array[63]);
      $d04->setD02($d02_array[39]);
      $d04->setD03($d03_array[34]);
      $d04->setDate(date_create('2003-09-03T00:00:00+0000'));
      $d04->setTexte('Chimie organique - Chapitre 2 - Les hydrocarbures');
      $d04->setPdf('20030903_Chimie_organique_chapitre2.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[306] = $d04;
      // 307
      $d04 = new D04Document();
      $d04->setD80($d80_array[13]);
      $d04->setD01($d01_array[63]);
      $d04->setD02($d02_array[39]);
      $d04->setD03($d03_array[34]);
      $d04->setDate(date_create('2003-09-04T00:00:00+0000'));
      $d04->setTexte('Les fonctions chimiques');
      $d04->setPdf('20030904_Chimie_les_fonctions_chimique.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[307] = $d04;
      // 308
      $d04 = new D04Document();
      $d04->setD80($d80_array[13]);
      $d04->setD01($d01_array[63]);
      $d04->setD02($d02_array[39]);
      $d04->setD03($d03_array[34]);
      $d04->setDate(date_create('2003-09-05T00:00:00+0000'));
      $d04->setTexte('Les matières plastiques');
      $d04->setPdf('20030905_Chimie_les_matieres_platstiques.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[308] = $d04;
      // 309
      $d04 = new D04Document();
      $d04->setD80($d80_array[13]);
      $d04->setD01($d01_array[63]);
      $d04->setD02($d02_array[39]);
      $d04->setD03($d03_array[32]);
      $d04->setDate(date_create('2004-04-29T00:00:00+0000'));
      $d04->setTexte('Epreuve de chimie');
      $d04->setPdf('20040429_Epreuve_chimie.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[309] = $d04;
      // 310
      $d04 = new D04Document();
      $d04->setD80($d80_array[13]);
      $d04->setD01($d01_array[62]);
      $d04->setD02($d02_array[38]);
      $d04->setD03($d03_array[34]);
      $d04->setDate(date_create('2002-09-01T00:00:00+0000'));
      $d04->setTexte('Les piles ou générateurs primaires');
      $d04->setPdf('20020901_Mecatronique_les_piles_ou_generateur_primaires.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[310] = $d04;
      // 311
      $d04 = new D04Document();
      $d04->setD80($d80_array[13]);
      $d04->setD01($d01_array[62]);
      $d04->setD02($d02_array[38]);
      $d04->setD03($d03_array[34]);
      $d04->setDate(date_create('2002-09-01T00:00:00+0000'));
      $d04->setTexte('Introduction à Orcad Capture et Orcad Layout');
      $d04->setPdf('20020901_Mecatronique_orcad.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[311] = $d04;
      // 312
      $d04 = new D04Document();
      $d04->setD80($d80_array[13]);
      $d04->setD01($d01_array[62]);
      $d04->setD02($d02_array[38]);
      $d04->setD03($d03_array[34]);
      $d04->setDate(date_create('2002-09-01T00:00:00+0000'));
      $d04->setTexte('Le multimètre Fluke 73');
      $d04->setPdf('20020901_Mecatronique_le_multimetre_fluke_73.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[312] = $d04;
      // 313
      $d04 = new D04Document();
      $d04->setD80($d80_array[13]);
      $d04->setD01($d01_array[62]);
      $d04->setD02($d02_array[38]);
      $d04->setD03($d03_array[34]);
      $d04->setDate(date_create('2002-09-01T00:00:00+0000'));
      $d04->setTexte('L\'osciloscope');
      $d04->setPdf('20020901_Mecatronique_l_osciloscope.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[313] = $d04;
      // 314
      $d04 = new D04Document();
      $d04->setD80($d80_array[13]);
      $d04->setD01($d01_array[62]);
      $d04->setD02($d02_array[38]);
      $d04->setD03($d03_array[34]);
      $d04->setDate(date_create('2002-09-01T00:00:00+0000'));
      $d04->setTexte('Les accumulateurs NiCd et NIMH');
      $d04->setPdf('20020901_Mecatronique_les_accumulateurs_nicd_et_nimh.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[314] = $d04;
      // 315
      $d04 = new D04Document();
      $d04->setD80($d80_array[13]);
      $d04->setD01($d01_array[62]);
      $d04->setD02($d02_array[38]);
      $d04->setD03($d03_array[32]);
      $d04->setDate(date_create('2002-09-01T00:00:00+0000'));
      $d04->setTexte('Epreuve sur les accumulateurs');
      $d04->setPdf('20020901_Mecatronique_epreuve_accu.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[315] = $d04;
      // 316
      $d04 = new D04Document();
      $d04->setD80($d80_array[13]);
      $d04->setD01($d01_array[61]);
      $d04->setD02($d02_array[38]);
      $d04->setD03($d03_array[32]);
      $d04->setDate(date_create('2001-09-01T00:00:00+0000'));
      $d04->setTexte('Epreuves de mécatronique sur le code des couleurs des resistances, suite');
      $d04->setPdf('20010901_Epreuve_Mecatronique_sur_le_code_des_couleurs_suite.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[316] = $d04;
      // 317
      $d04 = new D04Document();
      $d04->setD80($d80_array[13]);
      $d04->setD01($d01_array[61]);
      $d04->setD02($d02_array[38]);
      $d04->setD03($d03_array[32]);
      $d04->setDate(date_create('2001-09-01T00:00:00+0000'));
      $d04->setTexte('Epreuves de mécatronique');
      $d04->setPdf('20010901_Epreuve_Mecatronique_1.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[317] = $d04;
      // 318
      $d04 = new D04Document();
      $d04->setD80($d80_array[13]);
      $d04->setD01($d01_array[61]);
      $d04->setD02($d02_array[38]);
      $d04->setD03($d03_array[32]);
      $d04->setDate(date_create('2001-09-01T00:00:00+0000'));
      $d04->setTexte('Epreuves de mécatronique sur les condensateurs');
      $d04->setPdf('20010901_Epreuve_Mecatronique_les_condensateurs.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[318] = $d04;
      // 319
      $d04 = new D04Document();
      $d04->setD80($d80_array[13]);
      $d04->setD01($d01_array[62]);
      $d04->setD02($d02_array[38]);
      $d04->setD03($d03_array[35]);
      $d04->setDate(date_create('2002-09-01T00:00:00+0000'));
      $d04->setTexte('Notes sur les piles');
      $d04->setPdf('20020901_Mecatronique_notes_piles.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[319] = $d04;
      // 320
      $d04 = new D04Document();
      $d04->setD80($d80_array[13]);
      $d04->setD01($d01_array[61]);
      $d04->setD02($d02_array[38]);
      $d04->setD03($d03_array[35]);
      $d04->setDate(date_create('2001-09-01T00:00:00+0000'));
      $d04->setTexte('Notes sur les resistances');
      $d04->setPdf('20010901_Mecatronique_notes_resistances.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[320] = $d04;
      // 321
      $d04 = new D04Document();
      $d04->setD80($d80_array[13]);
      $d04->setD01($d01_array[61]);
      $d04->setD02($d02_array[38]);
      $d04->setD03($d03_array[34]);
      $d04->setDate(date_create('2001-09-01T00:00:00+0000'));
      $d04->setTexte('Support de cours de mécatronique, suite dans un autre tas de feuilles');
      $d04->setPdf('20010901_Mecatronique_support_de_cours_suite.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[321] = $d04;
      // 322
      $d04 = new D04Document();
      $d04->setD80($d80_array[13]);
      $d04->setD01($d01_array[61]);
      $d04->setD02($d02_array[38]);
      $d04->setD03($d03_array[34]);
      $d04->setDate(date_create('2001-09-01T00:00:00+0000'));
      $d04->setTexte('Support de cours de mécatronique, suite dans un autre tas de feuilles, explication sur les potentiomètres');
      $d04->setPdf('20010901_Mecatronique_support_de_cours_suite_pot.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[322] = $d04;
  }

//  public function getOrder()
//  {
//      return 1;
//  }
}
?>