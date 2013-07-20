<?php

/**
 * @author: Franz Lopez - Juan Pablo Mejia
 */

class Commands_Clear {
    public static function main() {
        $memory = Memory::getInstance();
        $memory->clear('history');
    }
}
