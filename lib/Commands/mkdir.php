<?php
// franz
class Mkdir
{
    public function main($getopt) {
        global $ROOT_DIR;

        $arguments = $getopt->arguments;
        
        foreach ($arguments as $argument) {
            if (!file_exists(translate($argument))) {
                $ROOT_DIR->mkdir(translate($argument), 0777);
            } else {
                echo 'mkdir: no se puede crear el directorio «' .
                     $argument . '»: El fichero ya existe';
            }
        }
    }
}
