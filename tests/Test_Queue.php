<?php

include '../library/Collections/Lineable.php';
include '../library/Collections/Queue.php';

$memory = new Collections_Queue();

// test of magic setting #1
$memory->push('test1');
$memory->push('test2');
$memory->push('test3');

$expected = 'test1';
$result = $memory->pop();

echo 'test3 ' . ($expected === $result). PHP_EOL;
