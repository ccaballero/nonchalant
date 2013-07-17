<?php

include '../library/Generic/Object.php';
include '../library/Memory.php';


// test of magic setting #1
$memory = Memory::getInstance();

$res = $memory->add('history');
echo 'test1: ' . ($res === true) . PHP_EOL;

$expected = 'expect';
$res = $memory->set('history', $expected);
echo 'test2: ' . ($res === true) . PHP_EOL;

$result = $memory->get('history');
echo $expected . PHP_EOL;
echo $result . PHP_EOL;
echo 'test1: ' . ($expected === $result) . PHP_EOL;
/*
$memory->clear('history');

echo 'test2: ' . $memory->get('history') . PHP_EOL;

$memory->remove('history');

echo 'test3: ' . $memory->exist('history');
 * 
 */