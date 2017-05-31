<?php

namespace Gde\GestionDocEcoleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;

/**
 * D04Document
 *
 * @ORM\Table(name="d04_document")
 * @ORM\Entity(repositoryClass="Gde\GestionDocEcoleBundle\Repository\D04DocumentRepository")
 */
class D04Document implements JsonSerializable
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
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Gde\GestionDocEcoleBundle\Entity\D01Periode")
     * @ORM\JoinColumn(nullable=false)
     */
    private $d01;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Gde\GestionDocEcoleBundle\Entity\D02Branche")
     * @ORM\JoinColumn(nullable=false)
     */
    private $d02;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Gde\GestionDocEcoleBundle\Entity\D03Type")
     * @ORM\JoinColumn(nullable=false)
     */
    private $d03;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="texte", type="string", length=255)
     */
    private $texte;
    
    /**
     * @var string
     *
     * @ORM\Column(name="pdf", type="string", length=255)
     */
    private $pdf;
    
    
    public function __construct()
    {
        $this->date = new \Datetime();
    }
    
    /**
     * Tableau pour json
     * @return array
     */
    public function jsonSerialize()
    {
        return array(
            'id' => $this->id,
            //'d80'=> $this->d80->getId(),
            'd01'=> $this->d01->getNom(),
            'd02'=> $this->d02->getNom(),
            'd03'=> $this->d03->getNom(),
            'date'=> $this->date->format('d-m-Y'),
            'pdf'=> $this->pdf,
            'texte'=> $this->texte,
            'search'=> $this->d01->getNom().' '
                        .$this->d02->getNom().' '
                        .$this->d03->getNom().' '
                        .$this->texte,
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
     * @return D04Document
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
     * Set d01
     *
     * @param integer $d01
     *
     * @return D04Document
     */
    public function setD01($d01)
    {
        $this->d01 = $d01;

        return $this;
    }

    /**
     * Get d01
     *
     * @return int
     */
    public function getD01()
    {
        return $this->d01;
    }

    /**
     * Set d02
     *
     * @param integer $d02
     *
     * @return D04Document
     */
    public function setD02($d02)
    {
        $this->d02 = $d02;

        return $this;
    }

    /**
     * Get d02
     *
     * @return int
     */
    public function getD02()
    {
        return $this->d02;
    }

    /**
     * Set d03
     *
     * @param integer $d03
     *
     * @return D04Document
     */
    public function setD03($d03)
    {
        $this->d03 = $d03;

        return $this;
    }
    
    /**
     * Get d03
     *
     * @return int
     */
    public function getD03()
    {
        return $this->d03;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return D04Document
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set texte
     *
     * @param string $texte
     *
     * @return D04Document
     */
    public function setTexte($texte)
    {
        $this->texte = $texte;

        return $this;
    }

    /**
     * Get texte
     *
     * @return string
     */
    public function getTexte()
    {
        return $this->texte;
    }
    
    /**
     * Set texte
     *
     * @param string $pdf
     *
     * @return D04Document
     */
    public function setPdf($pdf)
    {
        $this->pdf = $pdf;

        return $this;
    }

    /**
     * Get texte
     *
     * @return string
     */
    public function getPdf()
    {
        return $this->pdf;
    }
}

