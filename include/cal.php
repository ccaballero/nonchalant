<?php

function nch_cal() {
    $fecha = time();

    $salida = str_pad(date('F', $fecha) . '/' . date('Y', $fecha), 20, ' ', STR_PAD_BOTH) . PHP_EOL;
    $salida .= 'do lu ma mi ju vi sá' . PHP_EOL;

    $primero = mktime(0, 0, 0, date('n', $fecha), 1, date('Y', $fecha));
    $dia_primero = date('w', $primero);

    $salida .= str_repeat(' ', 3 * $dia_primero);

    $b = $dia_primero;
    $condicion = 0;

    for ($i = 1; $i <= date('t', $primero); $i++) {
        $salida .= str_pad($i, 2, ' ', STR_PAD_LEFT) . ' ';
         if ($i % (7 - $b) == $condicion) {
             $salida .= PHP_EOL;
             $condicion = 7 - $dia_primero; 
             $b = 0;
        }
    }

    return $salida;
}

