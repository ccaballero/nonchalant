<?php

class Generic {

    public static function main (array $args) {
        
        System::out::println();
        System::err::println();

        System::in::read();
        System::in::flush();
        
    }
}



$commands = split('|', $commando);


$comands[0]::main();
$res = $system::out::getOut();
$res = $system::out::flush();

$comands[1]::main($res);
