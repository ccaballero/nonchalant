<?php

class Commands_Touch {
    public static function main($args) {
        $getopt = Parser::parseArguments($args);
        $parameters = $getopt['parameters'];
        if (count($parameters) <= 0) {
            echo 'touch: falta un fichero como operando'
                . PHP_EOL
                . 'Try \'touch --help\' for more information.';
            return;
        }

        $file = $parameters[0];
        $paths = Utils::split_path($file);

        $memory = Memory::getInstance();
        $node = $memory->get('fs');

        for ($i = 2; $i < count($paths); $i++) {
            if ($node->exists($paths[$i - 1])) {
                $node = $node->getChild($paths[$i - 1]);
            } else {
                echo 'no such file';
                return;
            }
        }

        $name_file = $paths[$i - 1];
        if ($node->exists($name_file)) {
            echo 'change date in existent file';
        } else {
            $new_file = new FS_File_Files($name_file, $node);
            $node->addChild($new_file);
            $node->sync();
        }

    }
}
