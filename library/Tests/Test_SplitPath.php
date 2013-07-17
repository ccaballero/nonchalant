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
    array('/', array('/')),
    array('/home', array('/', 'home')),
    array('home/', array('/', 'test', 'home')),
    array('~/asdf.txt', array('/', 'home', 'asdf.txt')),
//    array('~/test', '/home/test'),
//    array('.', '/test'),
//    array('..', '/'),
//    array('../nuevo', '/nuevo'),
//    array('../nuevo/../nuevo1/', '/nuevo1/'),
//    array('./test/test1/.', '/test/test/test1'),
//    array('../../.././../nuevo', '/nuevo'),
//    array('/home/test', '/home/test'),
//    array('/home/test/test/', '/home/test/test/'),
);

foreach ($paths as $arraytest) {
    $test=$arraytest[0];
    $testarray=$arraytest[1];
    $result =Utils::split_path($test);
    echo (($result === $testarray) ? 'yes' : 'no' ).PHP_EOL;;
    
}

//var_dump(Utils::split_path('home/'));