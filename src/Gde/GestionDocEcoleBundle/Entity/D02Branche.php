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
     * @ORM\ManyToOne(targetEntity="Gde\GestionDocEcoleBundle\Entity\D80Utilisateur")
     * @ORM\JoinColumn(nullable=false)
     */
    private $d80;

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
     * Set d80
     *
     * @param integer $d80
     *
     * @return D02Branche
     */
    public function setD80($d80)
    {
        $this->d80 = $d80;

        return $this;
    }

    /**
     * Get d80
     *
     * @return int
     */
    public function getD80()
    {
        return $this->d80;
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

