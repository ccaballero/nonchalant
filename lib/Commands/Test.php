<?php

class Commands_Test extends Term_Abstract_Command {

    public static $valid_options = array(
        'apple|a'    => 'apple option, with no parameter',
        'banana|b=i' => 'banana option, with required integer parameter',
        'pear|p-s'   => 'pear option, with optional string parameter'
    );

    public function main(Term_Input $input) {
        if ($input->hasOption('a')) {
            // h option
            echo 'tiene h';
        } else {
            echo 'no tiene h';
        }
    }
}
