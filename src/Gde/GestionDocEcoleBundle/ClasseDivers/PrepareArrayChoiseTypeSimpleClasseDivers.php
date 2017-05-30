<?php
namespace Gde\GestionDocEcoleBundle\ClasseDivers;

use JMS\Serializer\SerializerBuilder;

class PrepareArrayChoiseTypeSimpleClasseDivers
{
    private $_nom;
    private $_champ_no;
    private $_champ_contenu;
    /**
     * 
     * @param type $entite
     * @param type $champ_no
     * @param type $champ_contenu
     */ 
    public function __construct($entite,$champ_no,$champ_contenu) 
    {
        $this->_entite = $entite;
        $this->_champ_no = $champ_no;
        $this->_champ_contenu = $champ_contenu;
    }

    /**
     * Retourne un array pour le ChoiseType
     * @return array
     * @throws type
     */
    public function getArray()
    {
        $array_ct_d01 = array();
        if (!$this->_entite) 
        {
            throw $this->createNotFoundException('La table est vide');
        }
        else
        {
            // Serialisation de l'entité vers Json
            $serializer = SerializerBuilder::create()->build();
            $response = $serializer->serialize($this->_entite,'json');
            // Passage du json en array php
            $array_d01 = json_decode($response, true);
            for($j = 0;$j < count($array_d01); $j++)
            {
                $id = 0;
                $nom = "";
                foreach ($array_d01[$j] as $k => $v) 
                {
                    if (!is_array($v))
                    {
                        switch ($k)
                        {
                            case $this->_champ_no:
                                $id = $v;
                                break;
                            case $this->_champ_contenu:
                                $nom = $v;
                                break;
                        }
                        
                    }
                }
                $array_ct_d01[$nom] = $id;
            }
        }
        return $array_ct_d01;
    }

} 
