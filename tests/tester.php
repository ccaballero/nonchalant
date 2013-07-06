<?php

$input_file = 'tests';
$handle = @fopen($input_file, 'r');

if ($handle) {
    while (($buffer = fgets($handle)) !== false) {
        $buffer = substr($buffer, 0, -1);
        echo '-> ' . $buffer . ']' . PHP_EOL;
        
    }
    if (!feof($handle)) {
        echo "Error: unexpected fgets() fail\n";
    }
    fclose($handle);
}
















