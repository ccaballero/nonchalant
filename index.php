<?php

$historial = '';

if (isset($_POST['comando'])) {
    $comando = $_POST['comando'];
    $lista = array('date', 'cal');
    if (in_array($comando, $lista)) {
        include "include/$comando.php";
        $funcion = "nch_$comando";
        $result = $funcion();
    } else {
        $result = 'nch: ' . $comando . ': no se encontró la orden';
    }

    $historial = $comando . PHP_EOL . $result;
}

?>

<html>
    <head>
        <title>Nonchalant</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <body>
        <h1></h1>
        <pre><?php echo $historial ?></pre>
        <form action="" method="post">
            <input name="comando" type="text" />
            <input type="submit" />
        </form>
    </body>

</html>

