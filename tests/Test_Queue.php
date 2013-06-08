<?php

include '../library/Collections/Lineable.php';
include '../library/Collections/Queue.php';

$object = new Collections_Queue();

// test of magic setting #1
$object->push('test1');
$object->push('test2');
$object->push('test3');

$expected = 'test1';
$result = $object->pop();

echo 'test3 ' . ($expected === $result). PHP_EOL;
