<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\User;
use Gde\GestionDocEcoleBundle\Entity\D01Periode;
use Gde\GestionDocEcoleBundle\Entity\D80Utilisateur;

class LoadD00Data implements FixtureInterface
{
    private $essai;
    
    public function load(ObjectManager $manager)
    {
        /**
         * D80Utilisateur
         */
        $d80 = new D80Utilisateur();
        $d80->setUser('Stéphane');
        $d80->setEmail('s.bressani@bluewin.ch');
        $d80->setPassword('awesome');
        $d80->setPhoto('null');
        $manager->persist($d80);
        $manager->flush();
        $essai = $d80->getId();
        /**
         * D01Periode
         */
        $d01 = new D01Periode();
        $d01->setId_d80($essai);
        $d01->setNom('1ère année CFC');
        $manager->persist($d01);
        $manager->flush();
    }
    
    public function getOrder()
    {
        return 1;
    }
}
?>