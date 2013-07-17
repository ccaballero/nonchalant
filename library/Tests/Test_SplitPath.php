<?php

$paths = array(
    array('/', array('/')),
    array('/home', array('/', 'home')),
    array('home/', array('/', 'test', 'home')),
    array('~/asdf.txt', array('/', 'home', 'asdf.txt')),
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