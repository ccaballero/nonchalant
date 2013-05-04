<?php

defined('APPLICATION_PATH') ||
define('APPLICATION_PATH', realpath(dirname(__FILE__)));

set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/lib'),
    get_include_path(),
)));

function __autoload($class) {
    include str_replace('_', '/', $class) . '.php';
}

$input = new Term_Default_Input(
    'mysql -asdfsdk -u root   --user=carlos --pasword=asdf dbname1            dbname2'
);

//'command' => 'mysql',
//'options' => array(
//    'user' => 'carlos',
//    'password' => 'asdf',
//),
//'parameters' => array(
//    'dbname1',
//    'dbname2')
var_dump($input);





