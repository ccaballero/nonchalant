<?php

include '../library/Collections/Lineable.php';
include '../library/Collections/Stack.php';

$object = new Collections_Stack();

// test of magic setting #1
$object->push('test1');
$object->push('test2');
$object->push('test3');

$expected = 'test3';
$result = $object->pop();

echo 'test3 ' . ($expected === $result). PHP_EOL;
