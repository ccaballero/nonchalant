<?php

/**
 * @author: Elvis Ramirez - Vladwelt
 */

class Commands_Cd
{
    public static function main($args) {
        $getopt = Parser::parseArguments($args);
        $parameters = $getopt['parameters'];

        $memory = Memory::getInstance();

        switch (count($parameters)) {
            case 0:
                $directories = $memory->get('directories');
                $directories['current'] = $directories['home'];
                $memory->set('directories', $directories);
                break;
            default:
                $d1 = $parameters[0];
                $d2 = Utils::absolute($d1);
                $d3 = Utils::split_path($d2);
                
                $node = $memory->get('fs');
                foreach ($d3 as $directory) {
                    if ($node->exists($directory)) {
                        $node = $node->getChild($directory);
                    } else {
                        echo 'nch: cd: ' . $d1 . ': '
                            . 'No existe el fichero o el directorio';
                        return;
                    }
                }
                
                $directories = $memory->get('directories');
                $directories['current'] = $d2;
                $memory->set('directories', $directories);
        }
    }
}
