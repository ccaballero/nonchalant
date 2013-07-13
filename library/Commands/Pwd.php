<?php

class Commands_Pwd {
    public static function main() {
        $memory = Memory::getInstance();
        return $memory->get("current_directory");
    }
}
