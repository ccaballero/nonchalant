<?php

class Commands_Clear {
    public static function main() {
        $memory = Memory::getInstance();
        $memory->clear('history');
    }
}
