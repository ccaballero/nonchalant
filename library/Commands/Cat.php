<?php

class Commands_Cat
{
    public static function main($args) {
        $getopt = Parser::parseArguments($args);
        $parameters = $getopt['parameters'];

        $memory = Memory::getInstance();
        $opened_files = $memory->get('opened_files');

        if (count($parameters) >= 1) {
            foreach ($parameters as $path) {
                $file = new FS_File_Files($opened_files);
                $fd = $file->open(Utils::translate($path), 'r');

                $buffer = '';
                while (($aux = $file->read($fd, 1)) != null) {
                    $buffer .= $aux;
                }

                echo $buffer . PHP_EOL;
                $file->close($fd);
            }
        }
    }

}

