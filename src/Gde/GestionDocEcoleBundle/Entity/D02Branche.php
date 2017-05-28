<?php

namespace Gde\GestionDocEcoleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * D02Branche
 *
 * @ORM\Table(name="d02_branche")
 * @ORM\Entity(repositoryClass="Gde\GestionDocEcoleBundle\Repository\D02BrancheRepository")
 */
class D02Branche
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="id_d80", type="integer")
     */
    private $id_d80;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set id_d80
     *
     * @param integer $id_d80
     *
     * @return D02Branche
     */
    public function setId_d80($id_d80)
    {
        $this->id_d80 = $id_d80;

        return $this;
    }

    /**
     * Get id_d80
     *
     * @return int
     */
    public function getId_d80()
    {
        return $this->id_d80;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return D02Branche
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }
}

