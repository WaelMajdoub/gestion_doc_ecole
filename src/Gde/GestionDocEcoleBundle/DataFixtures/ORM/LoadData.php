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
      // 10
      $d80 = new D80Utilisateur();
      $d80->setUsername('Stéphane');
      $d80->setEmail('s.bressani@bluewin.ch');
      $d80->setPassword('awesome');
      $d80->setPhoto('null');
      $d80->setSalt('');
      $d80->setRoles(array('ROLE_USER'));
      $manager->persist($d80);
      $manager->flush();
      $d80_array[10] = $d80;
      /**
      /* D01Periode
       */
      $d01_array = [];
      // 46
      $d01 = new D01Periode();
      $d01->setD80($d80_array[10]);
      $d01->setNom('1ère année CFC');
      $manager->persist($d01);
      $manager->flush();
      $d01_array[46] = $d01;
      // 47
      $d01 = new D01Periode();
      $d01->setD80($d80_array[10]);
      $d01->setNom('2ème année CFC');
      $manager->persist($d01);
      $manager->flush();
      $d01_array[47] = $d01;
      // 48
      $d01 = new D01Periode();
      $d01->setD80($d80_array[10]);
      $d01->setNom('3ème année CFC');
      $manager->persist($d01);
      $manager->flush();
      $d01_array[48] = $d01;
      // 49
      $d01 = new D01Periode();
      $d01->setD80($d80_array[10]);
      $d01->setNom('4ème année CFC');
      $manager->persist($d01);
      $manager->flush();
      $d01_array[49] = $d01;
      // 50
      $d01 = new D01Periode();
      $d01->setD80($d80_array[10]);
      $d01->setNom('1ère année ES');
      $manager->persist($d01);
      $manager->flush();
      $d01_array[50] = $d01;
      /**
      /* D02Branche
       */
      $d02_array = [];
      // 24
      $d02 = new D02Branche();
      $d02->setD80($d80_array[10]);
      $d02->setNom('Delphi');
      $manager->persist($d02);
      $manager->flush();
      $d02_array[24] = $d02;
      // 25
      $d02 = new D02Branche();
      $d02->setD80($d80_array[10]);
      $d02->setNom('C');
      $manager->persist($d02);
      $manager->flush();
      $d02_array[25] = $d02;
      // 26
      $d02 = new D02Branche();
      $d02->setD80($d80_array[10]);
      $d02->setNom('Mécatronique');
      $manager->persist($d02);
      $manager->flush();
      $d02_array[26] = $d02;
      // 27
      $d02 = new D02Branche();
      $d02->setD80($d80_array[10]);
      $d02->setNom('Chimie');
      $manager->persist($d02);
      $manager->flush();
      $d02_array[27] = $d02;
      /**
      /* D03Type
       */
      $d03_array = [];
      // 22
      $d03 = new D03Type();
      $d03->setD80($d80_array[10]);
      $d03->setNom('Epreuve');
      $manager->persist($d03);
      $manager->flush();
      $d03_array[22] = $d03;
      // 23
      $d03 = new D03Type();
      $d03->setD80($d80_array[10]);
      $d03->setNom('Exercice');
      $manager->persist($d03);
      $manager->flush();
      $d03_array[23] = $d03;
      // 24
      $d03 = new D03Type();
      $d03->setD80($d80_array[10]);
      $d03->setNom('Support de cours');
      $manager->persist($d03);
      $manager->flush();
      $d03_array[24] = $d03;
      /**
      /* D04Document
       */
      $d04_array = [];
      // 151
      $d04 = new D04Document();
      $d04->setD80($d80_array[10]);
      $d04->setD01($d01_array[46]);
      $d04->setD02($d02_array[24]);
      $d04->setD03($d03_array[22]);
      $d04->setDate(date_create('2001-06-05T00:00:00+0000'));
      $d04->setTexte('Epreuve Delphi');
      $d04->setPdf('20010605_Epreuve_delphi.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[151] = $d04;
      // 152
      $d04 = new D04Document();
      $d04->setD80($d80_array[10]);
      $d04->setD01($d01_array[49]);
      $d04->setD02($d02_array[25]);
      $d04->setD03($d03_array[22]);
      $d04->setDate(date_create('2004-09-01T00:00:00+0000'));
      $d04->setTexte('Epreuve C, Recherche du nombre de nombre pair et impair dans 2 tableaux en utilisant des pointeurs');
      $d04->setPdf('20040901_Epreuve_c.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[152] = $d04;
      // 153
      $d04 = new D04Document();
      $d04->setD80($d80_array[10]);
      $d04->setD01($d01_array[47]);
      $d04->setD02($d02_array[24]);
      $d04->setD03($d03_array[22]);
      $d04->setDate(date_create('2003-05-12T00:00:00+0000'));
      $d04->setTexte('Epreuve Delphi');
      $d04->setPdf('20030512_Epreuve_delphi.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[153] = $d04;
      // 154
      $d04 = new D04Document();
      $d04->setD80($d80_array[10]);
      $d04->setD01($d01_array[47]);
      $d04->setD02($d02_array[24]);
      $d04->setD03($d03_array[23]);
      $d04->setDate(date_create('2003-03-12T00:00:00+0000'));
      $d04->setTexte('Exercice 3.19, Crée un fifo');
      $d04->setPdf('20030312_Exercice_delphi_fifo.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[154] = $d04;
      // 155
      $d04 = new D04Document();
      $d04->setD80($d80_array[10]);
      $d04->setD01($d01_array[47]);
      $d04->setD02($d02_array[24]);
      $d04->setD03($d03_array[23]);
      $d04->setDate(date_create('2002-10-29T00:00:00+0000'));
      $d04->setTexte('Exercice 3.14, Tri un tableau par bubble sort et affiche le résultat');
      $d04->setPdf('20021029_Exercice_delphi_tri_tableau.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[155] = $d04;
      // 156
      $d04 = new D04Document();
      $d04->setD80($d80_array[10]);
      $d04->setD01($d01_array[47]);
      $d04->setD02($d02_array[24]);
      $d04->setD03($d03_array[23]);
      $d04->setDate(date_create('2002-10-29T00:00:00+0000'));
      $d04->setTexte('Exercice 3.13, Remplissage d\'un tableau avec des chiffres consécutifs la première valeur étant choisie par l\'utilisateur. Un deuxième tableau permet d\'afficher les valeurs doublées');
      $d04->setPdf('20021029_Exercice_remplissage_tableau.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[156] = $d04;
      // 157
      $d04 = new D04Document();
      $d04->setD80($d80_array[10]);
      $d04->setD01($d01_array[47]);
      $d04->setD02($d02_array[24]);
      $d04->setD03($d03_array[22]);
      $d04->setDate(date_create('2003-04-19T00:00:00+0000'));
      $d04->setTexte('Epreuve de l\'exercice 3.19, 3.21 et 3.24');
      $d04->setPdf('20030419_Epreuve_3_prog.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[157] = $d04;
      // 158
      $d04 = new D04Document();
      $d04->setD80($d80_array[10]);
      $d04->setD01($d01_array[47]);
      $d04->setD02($d02_array[25]);
      $d04->setD03($d03_array[23]);
      $d04->setDate(date_create('2003-04-05T00:00:00+0000'));
      $d04->setTexte('Affiche le temps réel et la date en temps local');
      $d04->setPdf('20030405_Exercice_c_DisplayTime.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[158] = $d04;
      // 159
      $d04 = new D04Document();
      $d04->setD80($d80_array[10]);
      $d04->setD01($d01_array[48]);
      $d04->setD02($d02_array[24]);
      $d04->setD03($d03_array[22]);
      $d04->setDate(date_create('2003-11-17T00:00:00+0000'));
      $d04->setTexte('Epreuve sur les StringGrid');
      $d04->setPdf('20031117_Epreuve_Delphi_StringGrid.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[159] = $d04;
      // 160
      $d04 = new D04Document();
      $d04->setD80($d80_array[10]);
      $d04->setD01($d01_array[47]);
      $d04->setD02($d02_array[24]);
      $d04->setD03($d03_array[23]);
      $d04->setDate(date_create('2002-09-09T00:00:00+0000'));
      $d04->setTexte('Exercice 3.5, Changement de base decimal, octal, binaire et hexadécimal');
      $d04->setPdf('20020909_Exerice_Delphi_Changement_de_base.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[160] = $d04;
      // 161
      $d04 = new D04Document();
      $d04->setD80($d80_array[10]);
      $d04->setD01($d01_array[46]);
      $d04->setD02($d02_array[26]);
      $d04->setD03($d03_array[22]);
      $d04->setDate(date_create('2001-09-01T00:00:00+0000'));
      $d04->setTexte('Epreuves de mécatronique sur le code des couleurs des resistances');
      $d04->setPdf('20010901_Epreuve_Mecatronique_sur_le_code_des_couleurs.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[161] = $d04;
      // 162
      $d04 = new D04Document();
      $d04->setD80($d80_array[10]);
      $d04->setD01($d01_array[46]);
      $d04->setD02($d02_array[26]);
      $d04->setD03($d03_array[24]);
      $d04->setDate(date_create('2001-09-01T00:00:00+0000'));
      $d04->setTexte('Support de cours de mécatronique');
      $d04->setPdf('20010901_Cours_Mecatronique_et_notes.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[162] = $d04;
      // 163
      $d04 = new D04Document();
      $d04->setD80($d80_array[10]);
      $d04->setD01($d01_array[48]);
      $d04->setD02($d02_array[27]);
      $d04->setD03($d03_array[24]);
      $d04->setDate(date_create('2003-09-01T00:00:00+0000'));
      $d04->setTexte('Liaison et réactions chimique - Chapitre 0');
      $d04->setPdf('20030901_Liaisons_et_reactions_chimique_chapitre0.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[163] = $d04;
      // 164
      $d04 = new D04Document();
      $d04->setD80($d80_array[10]);
      $d04->setD01($d01_array[48]);
      $d04->setD02($d02_array[27]);
      $d04->setD03($d03_array[24]);
      $d04->setDate(date_create('2003-09-01T00:00:00+0000'));
      $d04->setTexte('Liaison et réactions chimique - Chapitre 1 - La molécule');
      $d04->setPdf('20030901_Liaisons_et_reactions_chimique_chapitre1.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[164] = $d04;
      // 165
      $d04 = new D04Document();
      $d04->setD80($d80_array[10]);
      $d04->setD01($d01_array[48]);
      $d04->setD02($d02_array[27]);
      $d04->setD03($d03_array[24]);
      $d04->setDate(date_create('2003-09-01T00:00:00+0000'));
      $d04->setTexte('Liaison et réactions chimique - Chapitre 2 - Les liaisons ioniques');
      $d04->setPdf('20030901_Liaisons_et_reactions_chimique_chapitre2.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[165] = $d04;
      // 166
      $d04 = new D04Document();
      $d04->setD80($d80_array[10]);
      $d04->setD01($d01_array[48]);
      $d04->setD02($d02_array[27]);
      $d04->setD03($d03_array[24]);
      $d04->setDate(date_create('2003-09-01T00:00:00+0000'));
      $d04->setTexte('Liaison et réactions chimique - Chapitre 3 - Les liaisons covalentes');
      $d04->setPdf('20030901_Liaisons_et_reactions_chimique_chapitre3.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[166] = $d04;
      // 167
      $d04 = new D04Document();
      $d04->setD80($d80_array[10]);
      $d04->setD01($d01_array[48]);
      $d04->setD02($d02_array[27]);
      $d04->setD03($d03_array[24]);
      $d04->setDate(date_create('2003-09-01T00:00:00+0000'));
      $d04->setTexte('Liaison et réactions chimique - Chapitre 4 - Détermination des formules et des compositions');
      $d04->setPdf('20030901_Liaisons_et_reactions_chimique_chapitre4.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[167] = $d04;
      // 168
      $d04 = new D04Document();
      $d04->setD80($d80_array[10]);
      $d04->setD01($d01_array[48]);
      $d04->setD02($d02_array[27]);
      $d04->setD03($d03_array[24]);
      $d04->setDate(date_create('2003-09-01T00:00:00+0000'));
      $d04->setTexte('Liaison et réactions chimique - Chapitre 5 - La réaction chimique');
      $d04->setPdf('20030901_Liaisons_et_reactions_chimique_chapitre5.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[168] = $d04;
      // 169
      $d04 = new D04Document();
      $d04->setD80($d80_array[10]);
      $d04->setD01($d01_array[48]);
      $d04->setD02($d02_array[27]);
      $d04->setD03($d03_array[24]);
      $d04->setDate(date_create('2003-09-01T00:00:00+0000'));
      $d04->setTexte('Liaison et réactions chimique - Chapitre 6 - Notion de toxicologie');
      $d04->setPdf('20030901_Liaisons_et_reactions_chimique_chapitre6.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[169] = $d04;
      // 170
      $d04 = new D04Document();
      $d04->setD80($d80_array[10]);
      $d04->setD01($d01_array[48]);
      $d04->setD02($d02_array[27]);
      $d04->setD03($d03_array[24]);
      $d04->setDate(date_create('2003-09-01T00:00:00+0000'));
      $d04->setTexte('Classification périodique des éléments');
      $d04->setPdf('20030901_Clasification_periodique_des_elements.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[170] = $d04;
      // 171
      $d04 = new D04Document();
      $d04->setD80($d80_array[10]);
      $d04->setD01($d01_array[48]);
      $d04->setD02($d02_array[27]);
      $d04->setD03($d03_array[24]);
      $d04->setDate(date_create('2003-09-02T00:00:00+0000'));
      $d04->setTexte('Solutions et reactions chimique - Chapitre 0');
      $d04->setPdf('20030902_Solutions_et_reactions_chimique_chapitre0.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[171] = $d04;
      // 172
      $d04 = new D04Document();
      $d04->setD80($d80_array[10]);
      $d04->setD01($d01_array[48]);
      $d04->setD02($d02_array[27]);
      $d04->setD03($d03_array[24]);
      $d04->setDate(date_create('2003-09-02T00:00:00+0000'));
      $d04->setTexte('Solutions et reactions chimique - Chapitre 1 - Les solutions');
      $d04->setPdf('20030902_Solutions_et_reactions_chimique_chapitre1.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[172] = $d04;
      // 173
      $d04 = new D04Document();
      $d04->setD80($d80_array[10]);
      $d04->setD01($d01_array[48]);
      $d04->setD02($d02_array[27]);
      $d04->setD03($d03_array[24]);
      $d04->setDate(date_create('2003-09-02T00:00:00+0000'));
      $d04->setTexte('Solutions et reactions chimique - Chapitre 2 - Acides et bases');
      $d04->setPdf('20030902_Solutions_et_reactions_chimique_chapitre2.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[173] = $d04;
      // 174
      $d04 = new D04Document();
      $d04->setD80($d80_array[10]);
      $d04->setD01($d01_array[48]);
      $d04->setD02($d02_array[27]);
      $d04->setD03($d03_array[24]);
      $d04->setDate(date_create('2003-09-02T00:00:00+0000'));
      $d04->setTexte('Solutions et reactions chimique - Chapitre 3 - Réactions de précipitation et de neutralisation');
      $d04->setPdf('20030902_Solutions_et_reactions_chimique_chapitre3.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[174] = $d04;
      // 175
      $d04 = new D04Document();
      $d04->setD80($d80_array[10]);
      $d04->setD01($d01_array[48]);
      $d04->setD02($d02_array[27]);
      $d04->setD03($d03_array[24]);
      $d04->setDate(date_create('2003-09-02T00:00:00+0000'));
      $d04->setTexte('Solutions et reactions chimique - Chapitre 4 - Le pH, mesure d\'acidité');
      $d04->setPdf('20030902_Solutions_et_reactions_chimique_chapitre4.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[175] = $d04;
      // 176
      $d04 = new D04Document();
      $d04->setD80($d80_array[10]);
      $d04->setD01($d01_array[48]);
      $d04->setD02($d02_array[27]);
      $d04->setD03($d03_array[24]);
      $d04->setDate(date_create('2003-09-02T00:00:00+0000'));
      $d04->setTexte('Solutions et reactions chimique - Chapitre 5 - Le titrage');
      $d04->setPdf('20030902_Solutions_et_reactions_chimique_chapitre5.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[176] = $d04;
      // 177
      $d04 = new D04Document();
      $d04->setD80($d80_array[10]);
      $d04->setD01($d01_array[48]);
      $d04->setD02($d02_array[27]);
      $d04->setD03($d03_array[24]);
      $d04->setDate(date_create('2003-09-02T00:00:00+0000'));
      $d04->setTexte('Solutions et reactions chimique - Chapitre 6 - La valence et le degré d\'oxydation');
      $d04->setPdf('20030902_Solutions_et_reactions_chimique_chapitre6.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[177] = $d04;
      // 178
      $d04 = new D04Document();
      $d04->setD80($d80_array[10]);
      $d04->setD01($d01_array[48]);
      $d04->setD02($d02_array[27]);
      $d04->setD03($d03_array[24]);
      $d04->setDate(date_create('2003-09-02T00:00:00+0000'));
      $d04->setTexte('Solutions et reactions chimique - Chapitre 7 - Oxydoréduction');
      $d04->setPdf('20030902_Solutions_et_reactions_chimique_chapitre7.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[178] = $d04;
      // 179
      $d04 = new D04Document();
      $d04->setD80($d80_array[10]);
      $d04->setD01($d01_array[48]);
      $d04->setD02($d02_array[27]);
      $d04->setD03($d03_array[24]);
      $d04->setDate(date_create('2003-09-02T00:00:00+0000'));
      $d04->setTexte('Solutions et reactions chimique - Chapitre 8 - Electrolyse');
      $d04->setPdf('20030902_Solutions_et_reactions_chimique_chapitre8.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[179] = $d04;
      // 180
      $d04 = new D04Document();
      $d04->setD80($d80_array[10]);
      $d04->setD01($d01_array[48]);
      $d04->setD02($d02_array[27]);
      $d04->setD03($d03_array[24]);
      $d04->setDate(date_create('2003-09-02T00:00:00+0000'));
      $d04->setTexte('Solutions et reactions chimique - Chapitre 9 - Piles et accumulateurs');
      $d04->setPdf('20030902_Solutions_et_reactions_chimique_chapitre9.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[180] = $d04;
      // 181
      $d04 = new D04Document();
      $d04->setD80($d80_array[10]);
      $d04->setD01($d01_array[48]);
      $d04->setD02($d02_array[27]);
      $d04->setD03($d03_array[24]);
      $d04->setDate(date_create('2003-09-03T00:00:00+0000'));
      $d04->setTexte('Chimie organique - Chapitre 1 - Notions de base');
      $d04->setPdf('20030903_Chimie_organique_chapitre1.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[181] = $d04;
      // 182
      $d04 = new D04Document();
      $d04->setD80($d80_array[10]);
      $d04->setD01($d01_array[48]);
      $d04->setD02($d02_array[27]);
      $d04->setD03($d03_array[24]);
      $d04->setDate(date_create('2003-09-03T00:00:00+0000'));
      $d04->setTexte('Chimie organique - Chapitre 2 - Les hydrocarbures');
      $d04->setPdf('20030903_Chimie_organique_chapitre2.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[182] = $d04;
      // 183
      $d04 = new D04Document();
      $d04->setD80($d80_array[10]);
      $d04->setD01($d01_array[48]);
      $d04->setD02($d02_array[27]);
      $d04->setD03($d03_array[24]);
      $d04->setDate(date_create('2003-09-04T00:00:00+0000'));
      $d04->setTexte('Les fonctions chimiques');
      $d04->setPdf('20030904_Chimie_les_fonctions_chimique.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[183] = $d04;
      // 184
      $d04 = new D04Document();
      $d04->setD80($d80_array[10]);
      $d04->setD01($d01_array[48]);
      $d04->setD02($d02_array[27]);
      $d04->setD03($d03_array[24]);
      $d04->setDate(date_create('2003-09-05T00:00:00+0000'));
      $d04->setTexte('Les matières plastiques');
      $d04->setPdf('20030905_Chimie_les_matieres_platstiques.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[184] = $d04;
      // 185
      $d04 = new D04Document();
      $d04->setD80($d80_array[10]);
      $d04->setD01($d01_array[48]);
      $d04->setD02($d02_array[27]);
      $d04->setD03($d03_array[22]);
      $d04->setDate(date_create('2004-04-29T00:00:00+0000'));
      $d04->setTexte('Epreuve de chimie');
      $d04->setPdf('20040429_Epreuve_chimie.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[185] = $d04;
      // 186
      $d04 = new D04Document();
      $d04->setD80($d80_array[10]);
      $d04->setD01($d01_array[47]);
      $d04->setD02($d02_array[26]);
      $d04->setD03($d03_array[24]);
      $d04->setDate(date_create('2002-09-01T00:00:00+0000'));
      $d04->setTexte('Les piles ou générateurs primaires');
      $d04->setPdf('20020901_Mecatronique_les_piles_ou_generateur_primaires.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[186] = $d04;
      // 187
      $d04 = new D04Document();
      $d04->setD80($d80_array[10]);
      $d04->setD01($d01_array[47]);
      $d04->setD02($d02_array[26]);
      $d04->setD03($d03_array[24]);
      $d04->setDate(date_create('2002-09-01T00:00:00+0000'));
      $d04->setTexte('Introduction à Orcad Capture et Orcad Layout');
      $d04->setPdf('20020901_Mecatronique_orcad.pdf');
      $manager->persist($d04);
      $manager->flush();
      $d04_array[187] = $d04;
  }

//  public function getOrder()
//  {
//      return 1;
//  }
}
?>