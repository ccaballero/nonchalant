<?php

class Input_Http_Post implements Input
{
    public function getInput() {
        if (isset($_POST['command'])) {
            return $_POST['command'];
        }
        return '';
    }
}
