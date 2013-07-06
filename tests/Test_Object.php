<?php

include '../library/Generic/Object.php';

$memory = new Generic_Object();

// test of magic setting #1
$memory->setTest1('test1');

$expected = 'test1';
$result = $memory->getTest1();

echo 'test1: ' . ($expected === $result) . PHP_EOL;

// test of magic setting #1
$memory->settest('test1');

$expected = 'test1';
$result = $memory->gettest();

echo 'test2: ' . ($expected === $result) . PHP_EOL;
