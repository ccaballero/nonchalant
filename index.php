<?php

global $OUTPUT;

session_start();

if (!isset($_SESSION['historial'])) {
    $_SESSION['historial'] = '';
}

$OUTPUT = $_SESSION['historial'];

if (isset($_POST['comando'])) {
    $comando = $_POST['comando'];
    $options = explode(' ', $comando);
    $comando = $options[0];

    $lista = array('date', 'cal', 'clear');
    if (in_array($options[0], $lista)) {

        include "include/$comando.php";
        
        $object_name = ucfirst($comando);
        $object = new $object_name();

        $OUTPUT .= '# ' . $comando . PHP_EOL;
        $object->main($options);
        $OUTPUT .= PHP_EOL;

    } else {
        $OUTPUT .= 'nch: ' . $comando . ': no se encontró la orden' . PHP_EOL;
    }

    $_SESSION['historial'] = $OUTPUT;
}

include('Zend/View.php');
$view = new Zend_View();
$view->setScriptPath('templates');

$available_templates = array('carlos', 'crhyst', 'jmejia');
$random_index = rand(0, count($available_templates) - 1);
$random_template = $available_templates[$random_index];

if (!isset($_SESSION['template'])) {
    $_SESSION['template'] = $random_template . '.php';
}

$view->output = $OUTPUT;
echo $view->render($_SESSION['template']);


/*
$db_connect = mysql_connect('localhost', 'carlos', 'asdf');
mysql_select_db('nonchalant');

if (!$db_connect) {
    die('No pudo conectarse: ' . mysql_error());
}

echo 'Conectado satisfactoriamente';


mysql_close($db_connect);
 */

?>
