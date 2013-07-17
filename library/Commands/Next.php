<?php

class Commands_Next {
    public static function main($args) {
	$getopt = Parser::parseArguments($args);
        $parameters = $getopt['parameters'];
        
        $index = rand(0, count($parameters));
        for ($i = 0; $i <= $index; $i++) {
            shuffle($parameters);
        }

        $result = 'The machine say that the pilot will be: '
                . array_shift($parameters) . PHP_EOL
                . ' and the co-pilot is: '
                . array_pop($parameters);

        echo $result;
    }
}
