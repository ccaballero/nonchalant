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

try {
    $input = new Term_Default_Input($argv[1]);
    var_dump($input);
} catch (Term_Exceptions_Parser $ex) {
    echo $ex->getMessage() . PHP_EOL;
}
