<?php

function fecha() {
    return date('r');
}

$comando = $_POST['comando'];
if ($comando == 'date') {
    $result = fecha();
}

?>

<html>
    <head>
        <title>Nonchalant</title>
    </head>
    <body>
        <h1></h1>
        <pre><?php echo $comando . PHP_EOL ?><?php echo $result ?></pre>
        <form action="" method="post">
            <input name="comando" type="text" />
            <input type="submit" />
        </form>
    </body>
</html>

