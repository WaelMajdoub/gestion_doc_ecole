<?php
namespace Gde\GestionDocEcoleBundle\ClasseDivers;

class SortArrayClasseDivers
{
    private $_array;
    private $_champ_a_trier;
            
    public function __construct($array,$champ_a_trier) 
    {
        $this->_array = $array;
        $this->_champ_a_trier = $champ_a_trier;
    }

    public function getSortAscStr()
    {
        setlocale(LC_COLLATE, 'fr_FR.utf8');
        usort($this->_array['data'], [$this, 'custom_sort_str_asc']);
        return $this->_array;
    }
    
    public function getSortDescStr()
    {
        setlocale(LC_COLLATE, 'fr_FR.utf8');
        usort($this->_array['data'], [$this, 'custom_sort_str_desc']);
        return $this->_array;
    }
    
    public function getSortAscInt()
    {
        usort($this->_array['data'], [$this, 'custom_sort_int_asc']);
        return $this->_array;
    }
    
    public function getSortDescInt()
    {
        usort($this->_array['data'], [$this, 'custom_sort_int_desc']);
        return $this->_array;
    }
    
    private function custom_sort_str_asc($a, $b) 
    {
        return strcoll ($a[$this->_champ_a_trier], $b[$this->_champ_a_trier]);
    }
    
    private function custom_sort_str_desc($a, $b) 
    {
        return strcoll ($b[$this->_champ_a_trier], $a[$this->_champ_a_trier]);
    }
    
    private function custom_sort_int_asc($a, $b)
    {
        return $a[$this->_champ_a_trier] > $b[$this->_champ_a_trier] ? -1 : 1;
    }
    
    private function custom_sort_int_desc($a, $b)
    {
        return $b[$this->_champ_a_trier] > $a[$this->_champ_a_trier] ? -1 : 1;
    }

} 
