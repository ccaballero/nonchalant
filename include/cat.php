<?php

class Cat {

    function main($options = array()) {
        global $OUTPUT;
        global $OPENED_FILES;
        //Filssystem initialization
        if (count($options) > 1) {
            array_shift($options);
            foreach ($options as $path) {
                $file = new FS_File_Files($OPENED_FILES);

                $fd = $file->open(translate($path), 'r');

                $buffer = '';
                while (($aux = $file->read($fd, 1)) != null) {
                    $buffer .= $aux;
                }

                //var_dump($buffer);

                $OUTPUT .= $buffer . PHP_EOL;
                $file->close($fd);
            }
        }
    }

}

