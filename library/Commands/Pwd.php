<?php

class Commands_Pwd {
    public static function main() {
        $memory = Memory::getInstance();
        $directories = $memory->get('directories');
        echo $directories['current'];
    }
}
