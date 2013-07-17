<?php

include '../library/Exceptions/Parser.php';
include '../library/Parser.php';

//esto es un diccionario
$examplesArgument = array(
    array('ls -l',
        array(
            'command' => 'ls',
            'options' => array(
                'l' => true,
            ),
            'parameters' => array(),
        )
    ),
    array('find . --type=f --name=\'*.php\'', array(
            'command' => 'find',
            'options' => array(
                'type' => 'f',
                'name'=> '\'*.php\''
            ),
            'parameters' => array(
                '.',
            ))),
    array('tar -cvjpf asdf.tbz asdf/ -C /usr/src', array(
            'command' => 'tar',
            'parameters' => array(
                'asdf/',
            ),
            'options' => array (
                'f' => 'asdf.tbz',
                'c' => true,
                'v' => true,
                'j' => true,
                'p' => true,
                'C' => '/usr/src',
            )
        )),
);

foreach ($examplesArgument as $i => $example) {
    $result = Parser::parseArguments($example[0]);
    $expected = $example[1];
    $equals = assertEquals($result, $expected);

    echo ($equals) ? 'yes:test ' : 'failed:test';
    echo $i;
    echo PHP_EOL;
    echo ' =>   ';
//    echo implode('', $result);
    echo PHP_EOL;
    echo ' =>   ';
//    echo implode('', $expected);
    echo PHP_EOL;
}

function assertEquals($input ,$output){
    if (is_array($input) && is_array($output)) {
        $result = true;
        
        foreach ($output as $key => $value) {
            if (!array_key_exists($key, $input)) {
                return false;
            }
            $result &= assertEquals($input[$key], $value);
        }
        return $result;
    }
    return $input === $output;
}
