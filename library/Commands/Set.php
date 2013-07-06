<?php

class Commands_Set {

    public static function main() {
        $memory = Memory::getInstance();
        $vars = $memory->get('vars');

        $result = array();

        ksort($vars);
        foreach ($vars as $key => $value) {
          $result[] = $key . '=' . $value;
        }

        $result = implode(PHP_EOL, $result);
        return $result;
    }
}
