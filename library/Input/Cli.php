<?php

class Input_Cli implements Input
{
    public function getInput() {
        if ($_SERVER['argc'] > 1) {
            return $_SERVER['argv'][1];
        }
        return '';
    }
}

