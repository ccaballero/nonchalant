<?php

session_start();
define('APPLICATION_PATH', realpath(dirname(__FILE__)));
ini_set('include_path',
    ini_get('include_path') . PATH_SEPARATOR .
    APPLICATION_PATH . DIRECTORY_SEPARATOR . 'lib');

// Tracking of current position
global $CURRENT_DIRECTORY;
$CURRENT_DIRECTORY = '/';

// Template initialization
global $TEMPLATE;
if (!isset($_SESSION['template'])) {
    $_SESSION['template'] = 'default.php';
}
$TEMPLATE = $_SESSION['template'];

// Loading classes
include('Zend/Loader/Autoloader.php');
$loader = Zend_Loader_Autoloader::getInstance();
$loader->registerNamespace('Zend');
$loader->registerNamespace('FS');
$loader->registerNamespace('Collections');

function translate($path) {
    global $CURRENT_DIRECTORY;

    if (substr($path, 0, 1) == '/') { // path absoluto
        return APPLICATION_PATH . '/data/fs_example' . $path;
    } else { // path relativo
        return APPLICATION_PATH . '/data/fs_example' . $CURRENT_DIRECTORY . $path;
    }
}

function list_files($path) {
    $directories = scandir($path);

    foreach ($directories as $i => $directory) {
        $directories[$i] = substr($directory, 0, -4);
        if($directory == '.' || $directory == '..') {
            unset($directories[$i]);
        }
    }
    return $directories;
}

function options($command) {
    $parameters = preg_split("/[\s]+/", $command);
    $getopt = new StdClass();

    $long_options = array();
    $short_options = array();
    $arguments = array();

    $getopt->command = array_shift($parameters);
    foreach ($parameters as $parameter) {
        // Opciones largas
        if (substr($parameter, 0, 2) == '--') {
            // Compruebo si tiene un igual
            $pos = strrpos($parameter, '=');
            if (empty($pos)) {
                $long_options[substr($parameter, 2)] = true;
            } else {
                $long_options[substr($parameter, 2, $pos - 2)] =
                    substr($parameter, $pos + 1);
            }
        } else if (substr($parameter, 0, 1) == '-') {
            $short_options[] = substr($parameter, 1);
        } else {
            $arguments[] = $parameter;
        }
    }
    $getopt->long_options = $long_options;
    $getopt->short_options = $short_options;
    $getopt->arguments = $arguments;

    return $getopt;
}
function get_option($getopt, $long_option, $short_option) {
    $short_options = $getopt->short_options;
    $long_options = $getopt->long_options;

    if (in_array($short_option, $short_options)) {
        return true;
    }

    if (array_key_exists($long_option, $long_options)) {
        return $getopt->long_options[$long_option];
    }

    return false;
}

global $OPENED_FILES;
$OPENED_FILES = new Collections_List();

global $ROOT_DIR;
$ROOT_DIR = new FS_Tree_Files();

if (!isset($_SESSION['historial'])) {
    $_SESSION['historial'] = array();
}

global $OUTPUTS;
$OUTPUTS = $_SESSION['historial'];

if (isset($_POST['comando'])) {
    $command = $_POST['comando'];
    $getopt = options($command);
    $script = $getopt->command;

    $lista = list_files(APPLICATION_PATH . '/include');
    if (in_array($script, $lista)) {
        include "include/$script.php";

        $object_name = ucfirst($script);
        $object = new $object_name();

        ob_start();
        $object->main($getopt);
        $result = ob_get_contents();
        if (!empty($result)) {
            $result = $command . PHP_EOL . $result . PHP_EOL;
        }
        ob_clean();

        $OUTPUTS[] = $result;
    } else {
        $OUTPUTS[] = 'nch: ' . $script . ': no se encontró la orden' . PHP_EOL;
    }

    $_SESSION['historial'] = $OUTPUTS;
}

// Template renderization
$view = new Zend_View();
$view->setScriptPath('templates');

$view->outputs = $OUTPUTS;
$view->user = 'scesi';
$view->prompt= '$';
$view->hostname = 'nonchalant';

echo $view->render($TEMPLATE);

/*
$db_connect = mysql_connect('localhost', 'carlos', 'asdf');
mysql_select_db('nonchalant');

if (!$db_connect) {
    die('No pudo conectarse: ' . mysql_error());
}

echo 'Conectado satisfactoriamente';
mysql_close($db_connect);
*/
