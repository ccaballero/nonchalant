<?php

class Collections_Queue implements Collections_Lineable {
    protected $_data;
    
    public function __construct() {
        $this->_data = array();
    }
    public function pop() {
        return array_shift($this->_data);
    }

    public function push($element) {
        $this->_data[] = $element;
    }    
}
