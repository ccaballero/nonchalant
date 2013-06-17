<?php

class Collections_List implements Collections_Listable
{
    protected $_data;
    protected $_index;

    public function __construct() {
        $this->_data = array();
        $this->_index = 0;
    }

    public function isEmpty() {
        return empty($this->_data);
    }

    public function add($element) {
        $this->_data[$this->_index] = $element;
        $this->_index++;
        return $this->_index - 1;
    }

    public function remove($index) {
        unset($this->array[$index]);
    }
}

