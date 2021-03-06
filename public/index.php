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

$main = new Main($config);
$main->initialize()->run()->render();
