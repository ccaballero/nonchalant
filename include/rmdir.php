<?php
class Rmdir
{
    public function main($getopt) {
        global $ROOT_DIR;

        $arguments = $getopt->arguments;

        foreach ($arguments as $argument) {
            if (file_exists(translate($argument))) {
                $ROOT_DIR->rmdir(translate($argument));
            } else {
                echo 'rmdir: fallo al borrar «' . $argument .
                     '»: No existe el fichero o el directorio';
            }
        }
    }
}
