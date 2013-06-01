<?php

abstract class Generic_Singleton extends Generic_Object {
    protected static $instance = null;

    protected abstract function __construct();

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = $this->__construct();
        }
        return self::$instance;
    }
}
