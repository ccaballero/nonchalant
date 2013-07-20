<?php

/**
 * @author: Jazz - Jose Valdivia
 */
class Commands_Mv
{
    public static function main($args) {
        $memory = Memory::getInstance();
        $root = $memory->get('fs');

        $getopt = Parser::parseArguments($args);
        $parameters = $getopt['parameters'];

        if (!$root->rename(
            Utils::translate($parameters[0]),
            Utils::translate($parameters[1])))
        {
            echo "Error...";
        }
        
    }
}
