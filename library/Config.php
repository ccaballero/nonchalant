<?php

class Config extends Generic_Object {
    private static $instance = null;

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function loadConfig($filename) {
        $array = json_decode(file_get_contents($filename), true);

        foreach ($array as $key => $value) {
            $method="set$key";
            $this->$method(new $value());
        }
    }
}
