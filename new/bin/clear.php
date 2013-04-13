<?php

class Clear implements Command
{
    public function execute($parameter) {
        global $HISTORIAL;
        $HISTORIAL = '';
    }
}
