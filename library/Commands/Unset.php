<?php

class Commands_Unset {

    public static function main($args) {
        $memory = Memory::getInstance();
        $vars = $memory->get('vars');

        $getopt = Parser::parseArguments($args);
        $parameters = $getopt['parameters'];

        foreach ($parameters as $value) {
            unset($vars[$value]);
        }
        
        $memory->set('vars', $vars);

        return;
    }
}
