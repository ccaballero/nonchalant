<?php

class Ls
{
    public function main() {
        $files = array();

        if ($handle = opendir(translate('/'))) {
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
