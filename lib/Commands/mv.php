<?php
// franz
class Mv
{
    public function main($getopt) {
        global $ROOT_DIR;
        
        $arguments = $getopt->arguments;
        if(!$ROOT_DIR->rename(translate($arguments[0]),translate($arguments[1])))
        {
            echo "Error...";
        }
        
    }
}
