<?php

class Commands_Ls
{
    public static function main($args) {
        $getopt = Parser::parseArguments($args);
        $parameters = $getopt['parameters'];

        $memory = Memory::getInstance();
        $directories = $memory->get('directories');
        
        switch (count($parameters)) {
            case 0:
                $path = Utils::translate($directories['current']);
                break;
            case 1:
                $path = Utils::translate($parameters[0]);
                break;
        }
        
        $files = array();
        
        if ($handle = opendir($path)) {
            while (false !== ($entry = readdir($handle))) {
                if (substr($entry, 0, 1) <> '.') {
                    $files[] = $entry;
                }
            }
        }

        closedir($handle);
        sort($files);
        
        echo implode(' ', $files);
    }
}
