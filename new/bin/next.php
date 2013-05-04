<?php

class Next implements Command {

    public function execute($parameter) {
        global $OPENED_FILES;

        array_shift($parameter);

        $index = rand(0, count($parameter));
        for ($i = 0; $i <= $index; $i++) {
            shuffle($parameter);
        }

        $result = 'The machine say that the pilot will be: '
                . array_shift($parameter) . PHP_EOL
                . ' and the co-pilot is: '
                . array_pop($parameter);

        $OPENED_FILES[1] = $result;
    }

}