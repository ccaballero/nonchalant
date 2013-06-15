<?php

class Collections_Stack implements Collections_Lineable {
    protected $_data;

    public function __construct() {
        $this->_data = array();
    }

    public function isEmpty() {
        return empty($this->_data);
    }

    public function pop() {
        return array_pop($this->_data);
    }

    public function push($element){
        $this->_data[] = $element;
    }
}
