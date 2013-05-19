<?php

class Config extends Object {

    private static $instance = null;
    
    private function __construct() {}

    public static function getInstance() {
        if (Config::$instance == null) {
            Config::$instance = new Config();
        }
        return Config::$instance;
    }

}
