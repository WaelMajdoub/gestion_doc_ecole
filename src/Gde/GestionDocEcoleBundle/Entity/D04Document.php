<?php

namespace Gde\GestionDocEcoleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * D04Document
 *
 * @ORM\Table(name="d04_document")
 * @ORM\Entity(repositoryClass="Gde\GestionDocEcoleBundle\Repository\D04DocumentRepository")
 */
class D04Document
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
     * @var int
     *
     * @ORM\Column(name="id_d01", type="integer")
     */
    private $id_d01;

    /**
     * @var int
     *
     * @ORM\Column(name="id_d02", type="integer")
     */
    private $id_d02;

    /**
     * @var int
     *
     * @ORM\Column(name="id_d03", type="integer")
     */
    private $id_d03;

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
     * @param integer $id_dD80
     *
     * @return D04Document
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
     * Set id_d01
     *
     * @param integer $id_d01
     *
     * @return D04Document
     */
    public function setId_d01($id_d01)
    {
        $this->id_d01 = $id_d01;

        return $this;
    }

    /**
     * Get id_d01
     *
     * @return int
     */
    public function getId_d01()
    {
        return $this->id_d01;
    }

    /**
     * Set id_d02
     *
     * @param integer $id_d02
     *
     * @return D04Document
     */
    public function setId_d02($id_d02)
    {
        $this->id_d02 = $id_d02;

        return $this;
    }

    /**
     * Get id_d02
     *
     * @return int
     */
    public function getId_d02()
    {
        return $this->id_d02;
    }

    /**
     * Set id_d03
     *
     * @param integer $id_d03
     *
     * @return D04Document
     */
    public function setId_d03($id_d03)
    {
        $this->id_d03 = $id_d03;

        return $this;
    }

    /**
     * Get id_d03
     *
     * @return int
     */
    public function getId_d03()
    {
        return $this->id_d03;
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

