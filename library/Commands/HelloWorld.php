<?php

// Final definition for commands
// Features:
// > No inheritance.
// > Pass the getopt estructure as parameter to main
// > static calling for main method
class Commands_HelloWorld {
    public static function main() {
        return 'Hello World';
    }
}
