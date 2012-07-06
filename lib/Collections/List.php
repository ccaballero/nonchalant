<?php

class Collections_List implements Collections_Listable {
    private $array;
    private $index;
    
    public function __construct($array = array()) {
        $this->array = $array;
        $this->index = 0;
    }
    
    public function add($element){        
        $aux = $this->index;
        $this->array[$aux] = $element;
        $this->index++;
        return $aux;
    }
        
    public function remove($index) {
        unset($this->array[$index]);
    }
}

//$collection = new Collections_List();
//$value = $collection->add(3);
//var_dump($collection);
//$collection->remove($value);
//var_dump($collection);
//$value = $collection->add(3);
//var_dump($collection);
