<?php
global $HISTORIAL, $OPENED_FILES, $VARS;

$HISTORIAL = '';
if (isset($_POST['historial'])) {
    $HISTORIAL = $_POST['historial'];
}

$VARS = '';
if (isset($_POST['vars'])) {
    $VARS = unserialize($_POST['vars']);
}
// 0 -> stdin
// 1 -> stdout
// 2 -> stderr
$OPENED_FILES = array('', '', '');

$result = '';
$final_result = '';

function command($command) {
    global $OPENED_FILES;
    $parameter = explode(' ', $command);

    if (file_exists('bin/' . $parameter[0] . '.php')) {
        include_once 'bin/' . $parameter[0] . '.php';
    }

    $_class = ucfirst($parameter[0]);
    $class = class_exists('_' . $_class) ? '_' . $_class :
            (class_exists($_class) ? $_class : null);
    if ($class <> null) {
        $object = new $class();
        $object->execute($parameter);
        $result = $OPENED_FILES[1];
        $flag = true;
    } else {
        $result = 'nch: ' . $parameter[0] . ': command not found';
        $flag = false;
    }

    return array(
        'flag' => $flag,
        'result' => $result,
    );
}

if (isset($_POST['command'])) {
    $commands = preg_split('/(?<!\\\\);/', $_POST['command']);
    include 'bin/Command.php';

    foreach ($commands as $command) {
        $command = ltrim($command);
        if (preg_match("/[a-zA-Z_][a-zA-Z0-9_]*=.*/", $command)) {
            list($a, $b) = explode('=', $command);
            $VARS[$a] = $b;
//        } else if (preg_match(".+(|.+)+", $command)) {
//            $pipes = explode('|', $command);
//            foreach ($pipes as $pipe) {
//                
//            }
        } else {
            $_result = command($command);
            $result = $_result['result'];
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
