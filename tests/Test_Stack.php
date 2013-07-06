<?php

include '../library/Collections/Lineable.php';
include '../library/Collections/Stack.php';

$memory = new Collections_Stack();

// test of magic setting #1
$memory->push('test1');
$memory->push('test2');
$memory->push('test3');

$expected = 'test3';
$result = $memory->pop();

echo 'test3 ' . ($expected === $result). PHP_EOL;
