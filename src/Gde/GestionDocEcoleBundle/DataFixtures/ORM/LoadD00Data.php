<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\User;
use Gde\GestionDocEcoleBundle\Entity\D01Periode;

class LoadD01Data implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $d01 = new D01Periode();
        $d01->setId_d80(1);
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