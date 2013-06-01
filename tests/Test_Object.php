<?php

include '../library/Generic/Object.php';

$object = new Generic_Object();

// test of magic setting #1
$object->setTest1('test1');

$expected = 'test1';
$result = $object->getTest1();

echo 'test1: ' . ($expected === $result) . PHP_EOL;

// test of magic setting #1
$object->settest('test1');

$expected = 'test1';
$result = $object->gettest();

echo 'test2: ' . ($expected === $result) . PHP_EOL;
