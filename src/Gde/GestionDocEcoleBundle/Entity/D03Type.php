<?php

namespace Gde\GestionDocEcoleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;

/**
 * D03Type
 *
 * @ORM\Table(name="d03_type")
 * @ORM\Entity(repositoryClass="Gde\GestionDocEcoleBundle\Repository\D03TypeRepository")
 */
class D03Type implements JsonSerializable
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
     * Tableau pour json
     * @return array
     */
    public function jsonSerialize()
    {
        return array(
            'id' => $this->id,
            'nom'=> $this->nom,
            'search'=> $this->nom,
        );
    }
    
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
     * @return D03Type
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
     * @return D03Type
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

