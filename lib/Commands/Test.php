<?php

class Commands_Test
    extends Term_Command_Abstract {

    public static $valid_options = array(
        'apple|a'    => 'apple option, with no parameter',
        'banana|b=i' => 'banana option, with required integer parameter',
        'pear|p-s'   => 'pear option, with optional string parameter'
    );

    public function main($input) {
        return '-->test';
    }
}
