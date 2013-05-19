<?php

class Commands_Next
    extends Term_Command_Abstract {

    public static $valid_options = array();
    
    public function main($input) {
        //global $OPENED_FILES;
        $parameter = $input->getParameters();
        
        array_shift($parameter);

        $index = rand(0, count($parameter));
        for ($i = 0; $i <= $index; $i++) {
            shuffle($parameter);
        }

        $result = 'The machine say that the pilot will be: '
                . array_shift($parameter) . PHP_EOL
                . ' and the co-pilot is: '
                . array_pop($parameter);

        //$OPENED_FILES[1] = $result;
        return $result;
    }
}