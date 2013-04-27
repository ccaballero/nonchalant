<?php

class Cat implements Command {
    public function execute($parameter) {
        global $OPENED_FILES;

        $stdin = $OPENED_FILES[0];
        $OPENED_FILES[1] = $stdin;
    }
}