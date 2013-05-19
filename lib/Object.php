<?php

class Object
{
    private $_data = array();

    public function __set($key, $value) {
        $this->_data[$key] = $value;
    }

    public function __get($key) {
        if (isset($this->_data[$key])) {
            return $this->_data[$key];
        } else {
            return '';
        }
    }

//    public function __call($name, $arguments = array()) {
//        if (preg_match('/^[s|g]et.*/', $name)) {
//            $property = substr($name, 3);
//
//            $method = substr($name, 0, 3);
//            switch ($method) {
//                case 'set':
//                    if (count($arguments) >= 1) {
//                        $this->$property = $arguments[0];
//                    }
//                    break;
//                case 'get':
//                    return $this->$property;
//            }
//        }
//    }
}
