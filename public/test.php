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

include APPLICATION_PATH . '/library/Loader.php';

$test = $_GET['test'];

$main = new Main($config);
$main->initialize()->run('echo ejecutando test: ' . $test);

ob_start();
ob_implicit_flush(false);

$class = 'Tests_' . ucfirst(strtolower($test));
$ob_test = new $class();
$ob_test->header();
$ob_test->test();
$ob_test->header();
$result_test = PHP_EOL . ob_get_clean();

$main->result .= $result_test;

$main->render(false);
