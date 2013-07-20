<?php

/**
 * @author: Vladimir Cespedes - Franz Lopez
 */
class Commands_Mkdir
{
    public static function main($args) {
        $memory = Memory::getInstance();
        $root = $memory->get('fs');

        $getopt = Parser::parseArguments($args);
        $parameters = $getopt['parameters'];

        foreach ($parameters as $parameter) {
            if (!file_exists(Utils::translate($parameter))) {
                $root->mkdir(Utils::translate($parameter), 0777);
            } else {
                echo 'mkdir: no se puede crear el directorio «' .
                     $parameter . '»: El fichero ya existe';
            }
        }
    }
}
