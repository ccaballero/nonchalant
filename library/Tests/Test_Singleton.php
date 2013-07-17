<?php
include '../library/Generic/Object.php';
include '../library/Generic/Singleton.php';

//testing singleton.

$test1 = Generic_Singleton::getInstance();
$test2 = Generic_Singleton::getInstance();

$test1->setTest1('test1');

$expected = 'test1';
$result = $test2->getTest1();

echo 'test1: ' . ($expected === $result) . PHP_EOL;

// testing of inheritance
class Singleton2 extends Generic_Singleton {
    protected function __construct() {}
}

class Singleton3 extends Generic_Singleton {
    protected function __construct() {}
}

$test1 = Singleton2::getInstance();
$test2 = Singleton3::getInstance();

$test1->setTest1('test1');

$expected = 'test1';
$result = $test2->getTest1();

var_dump($test1);
var_dump($test2);
echo 'test2: ' . ($expected === $result) . PHP_EOL;