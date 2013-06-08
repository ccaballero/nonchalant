<?php

include '../library/Parser.php';

$tests = array(
    'echo $a',
    'echo \'\' > cat',
    'echo \'\' >> cat',
    'a=\'asdf\'; echo $a',
    'cat 2> asdf.txt',
    'find . -type f -name \'*.php\' | xargs grep -i \'asdf\'',
    'find . -type f -name \'*.php\' | xargs grep -i \'asdf\' 2>> asdf.txt',
);

foreach ($tests as $test) {
    echo '[' . implode('][', Parser::parseInstruction($test)) . ']' . PHP_EOL;
}
