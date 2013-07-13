<?php

defined('APPLICATION_PATH') ||
        define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/..'));

set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/library'),
    get_include_path(),
)));

$config = getenv('CONFIG');
if (empty($config)) {
    $config = 'settings-cli';
}

function __autoload($class) {
    include str_replace('_', '/', $class) . '.php';
}

$main = new Main();
$main->initialize($config)->run();
