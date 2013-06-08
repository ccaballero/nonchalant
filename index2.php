<?php

defined('APPLICATION_PATH') ||
        define('APPLICATION_PATH', realpath(dirname(__FILE__)));

set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/library'),
    get_include_path(),
)));

function __autoload($class) {
    include str_replace('_', '/', $class) . '.php';
}

$main = new Main();
$main->initialize()->run();
