<?php

class Command_Cat
{
    public function main($getopt) {
        global $OPENED_FILES;
        
        //Filssystem initialization
        if (count($getopt->arguments) >= 1) {
            foreach ($getopt->arguments as $path) {
                
                $file = new system->get('fs');
                $fd = $file->open(translate($path), 'r');

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

