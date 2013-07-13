<?php

class Commands_Rmdir
{
    public static function main($args) {
        $memory = Memory::getInstance();
        $root = $memory->get('fs');

        $getopt = Parser::parseArguments($args);
        $parameters = $getopt['parameters'];

        foreach ($parameters as $parameter) {
            if (file_exists(Utils::translate($parameter))) {
                $root->rmdir(Utils::translate($parameter));
            } else {
                echo 'rmdir: fallo al borrar «' . $parameter .
                     '»: No existe el fichero o el directorio';
            }
        }
    }
}
