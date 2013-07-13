<?php

class Commands_Ls
{
    public static function main() {
        $files = array();

        if ($handle = opendir(Utils::translate('/'))) {
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
