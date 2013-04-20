<?php
global $HISTORIAL;
$HISTORIAL = $_POST['historial'];

global $VARS;
$VARS = unserialize($_POST['vars']);

$result = '';
$final_result = '';

if (isset($_POST['command'])) {
    $commands = preg_split('/(?<!\\\\);/', $_POST['command']);
    include 'bin/Command.php';

    foreach ($commands as $command) {
        $command = ltrim($command);
        if (preg_match("/[a-zA-Z_][a-zA-Z0-9_]*=.*/", $command)) {
            list($a, $b) = explode('=', $command);
            
            $VARS[$a] = $b;
            
        } else {
            $parameter = explode(' ', $command);
            
            if (file_exists('bin/' . $parameter[0] . '.php')) {
                include_once 'bin/' . $parameter[0] . '.php';
            }

            $_class = ucfirst($parameter[0]);
            $class = class_exists('_' . $_class) ? '_' . $_class :
                    (class_exists($_class) ? $_class : null);
            if ($class <> null) {
                $object = new $class();
                $result = $object->execute($parameter);
            } else {
                $result = 'nch: ' . $parameter[0] . ': command not found';
            }
        }

        $final_result .= $result . PHP_EOL;
    }

    $final_result = htmlentities($final_result);
    $HISTORIAL .= $final_result;
}
?>

<html>
    <head>
        <title>Nonchalant</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <body>
        <pre><?php echo $HISTORIAL ?></pre>
        <form action="" method="post">
            <input type="hidden" name="historial" value="<?php echo $HISTORIAL ?>" />
            <input type="hidden" name="vars" value="<?php echo htmlentities(serialize($VARS)) ?>" />
            <input name="command" type="text" />
            <input type="submit" value="execute"/>
        </form>
    </body>
</html>
