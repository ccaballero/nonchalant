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
$view->output = $OUTPUT;
echo $view->render('carlos.php');

?>
