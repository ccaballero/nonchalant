<?php

class Generic_Object {
    private $_data = array();

    public function __set($key, $value) {
        $this->_data[$key] = $value;
    }

    public function __get($key) {
        if (isset($this->_data[$key])) {
            return $this->_data[$key];
        } else {
            return null;
        }
    }

    public function __call($name, $arguments) {
        $property = substr($name, 3);

        preg_match_all('/[A-Z][a-z]*/', $property, $parts);

        $transform = array();
        foreach ($parts[0] as $part) {
            $transform[] = strtolower($part);
        }
        $real_property = implode('_', $transform);

        if (preg_match('/^set.*/', $name)) {
            $this->$real_property = $arguments[0];
        } else if (preg_match('/^get.*/', $name)) {
            return $this->$real_property;
        }
    }
}
