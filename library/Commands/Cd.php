<?php

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
                $destination = $parameters[0];
                if (Utils::file_exists($destination)) {
                    $directories = $memory->get('directories');
                    $directories['current'] = Utils::absolute($destination);
                    $memory->set('directories', $directories);
                }
        }
    }
}
