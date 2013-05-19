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

$config = Config::getInstance();
$config->layout_directory = APPLICATION_PATH . '/templates/';
$config->layout_file = 'default.php';

$input = new Term_Input_Complex();
$output = new Term_Output_Default_Simple();
$kernel = new Term_Kernel_Default($input, $output);

$kernel->init()->parser()->execute();
