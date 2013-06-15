<?php

include '../library/Parser.php';

foreach ($examples as $i => $example) {
    $result = Parser::parseArguments($example[0]);
    $expected = $example[1];
    
    $equals = count($result) == count($expected);
    for ($j = 0; $j < count($result); $j++) {
        $equals &= ($result[$j] === $expected[$j]);
    }
    
    echo ($equals) ? 'yes:test ' : 'failed:test';
    echo $i;
    echo PHP_EOL;
    echo ' =>   ';
    echo implode('', $result);
    echo PHP_EOL;
    echo ' =>   ';
    echo implode('', $expected);
    echo PHP_EOL;
}
