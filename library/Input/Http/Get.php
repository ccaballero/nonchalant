<?php
class Input_Http_Get implements Input {
    public function getInput() {
        if (isset($_GET['command'])) {
            return $_GET['command'];
        }
        return '';
    }
}
