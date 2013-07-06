<?php

class Memory extends Generic_Object {

    private static $instance = null;

    private function __construct() {
        session_start();
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function exists($namespace) {
        return array_key_exists($namespace, $_SESSION);
    }

    public function add($namespace) {
        if (!$this->exists($namespace)) {
            $_SESSION[$namespace] = null;
            return true;
        }
    }

    public function set($namespace, $object) {
        if (!$this->exists($namespace)) {
            $this->add($namespace);
        }
        $_SESSION[$namespace] = $object;
    }

    public function get($namespace, $default_value = null) {
        if ($this->exists($namespace)) {
            return $_SESSION[$namespace];
        } else {
            return $default_value;
        }
    }

    public function clear($namespace) {
        if ($this->exists($namespace)) {
            $_SESSION[$namespace] = null;
        }
    }

    public function remove($namespace) {
        if ($this->exists($namespace)) {
            unset($_SESSION[$namespace]);
        }
    }

}

