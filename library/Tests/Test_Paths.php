<?php

include '../library/Generic/Object.php';
include '../library/Memory.php';
include '../library/Collections/Lineable.php';
include '../library/Collections/Queue.php';
include '../library/Utils.php';

$memory= Memory::getInstance();

if (!$memory->exists('directories')) {
    $directories = array(
        'current' => '/test',
        'home' => '/home',
    );
    $memory->set('directories', $directories);
}

$paths = array(
    array('/', '/'),
    array('/home', '/home'),
    array('home/', '/test/home/'),
    array('~', '/home'),
    array('~/test', '/home/test'),
    array('.', '/test'),
    array('..', '/'),
    array('../nuevo', '/nuevo'),
    array('../nuevo/../nuevo1/', '/nuevo1/'),
    array('./test/test1/.', '/test/test/test1'),
    array('../../.././../nuevo', '/nuevo'),
    array('/home/test', '/home/test'),
    array('/home/test/test/', '/home/test/test/'),
);

foreach ($paths as $test) {
    $result = Utils::canonical($test[0]);
    $expected = $test[1];
    
    echo str_pad($test[0], 20) . ' -> ';
    echo str_pad($result, 20) . ' -> ';
    echo ($result === $expected) ? 'yes' : 'no';
    echo PHP_EOL;
}
