<?php

class Commands_Pwd {
    public static function main() {
        $memory = Memory::getInstance();
        echo $memory->get('directories')['current'];
    }
}
