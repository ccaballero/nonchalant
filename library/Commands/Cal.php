<?php

/**
 * @author: Jmejia - Jazz
 */

class Commands_Cal {
    protected $messages = array(
        'year' => 'cal: Valor de año no permitido: utilice 1-9999',
        'month' => 'cal: Valor de mes no permitido: utilice 1-12',
    );

    public static function main($args) {
        $getopt = Parser::parseArguments($args);
        $parameters = $getopt['parameters'];

        $cal = new Commands_Cal();
        $salida = '';
        switch (count($parameters)) {
            case 0:
                $salida = implode(PHP_EOL, $cal->print_array_month(time()));
                break;
            case 1:
                $year1 = $parameters[0];
                $year2 = intval($year1);

                if (is_int($year2)) {
                    if (1 < $year2 && $year2 < 9999) {
                        $salida = str_pad($year2, 64, ' ', STR_PAD_BOTH) . PHP_EOL . PHP_EOL;

                        $months = array();
                        for ($i = 0; $i < 12; $i++) {
                            $months[] = $cal->print_array_month(mktime(0, 0, 0, $i + 1, 1, $year2), false);
                        }

                        for ($i = 0; $i < 12; $i+=3) {

                            $counts = array(
                                count($months[$i]),
                                count($months[$i+1]),
                                count($months[$i+2]),
                            );

                            for ($j = 0; $j < max($counts); $j++) {
                                $lines_0 = isset($months[$i][$j]) ? $months[$i][$j] : str_repeat(' ', 20);
                                $lines_1 = isset($months[$i+1][$j]) ? $months[$i+1][$j] : str_repeat(' ', 20);
                                $lines_2 = isset($months[$i+2][$j]) ? $months[$i+2][$j] : str_repeat(' ', 20);

                                $salida .= "$lines_0  $lines_1  $lines_2" . PHP_EOL;
                            }
                            $salida .= PHP_EOL;
                        }
                    } else {
                        $salida = "{$cal->messages['year']}";
                    }
                } else {
                    $salida = "{$cal->messages['year']}: '$year1'";
                }
                break;
            case 2:
            case 3:
                $month1 = $parameters[0];
                $month2 = intval($month1);

                $year1 = $parameters[1];
                $year2 = intval($year1);

                if (is_int($year2)) {
                    if (1 < $year2 && $year2 < 9999) {
                        if (is_int($month2)){
                            if (1 <= $month2 && $month2 <= 12) {
                                $time = mktime(0, 0, 0, $month2, 1,$year2);
                                $salida = implode(PHP_EOL, $cal->print_array_month($time));
                            } else {
                                $salida = "{$cal->messages['month']}";
                            }
                        } else {
                            $salida = "{$cal->messages['month']}: '$month1'";
                        }
                    } else {
                        $salida = "{$cal->messages['year']}";
                    }
                } else {
                    $salida = "{$cal->messages['year']}: '$year1'";
                }
                break;
            default:
                // manual
                break;
        }
        
        echo $salida;
    }
    
    private function print_array_month($time, $print_year = true) {
        $array = array();

        // Impresion del nombre del mes
        if ($print_year) {
            $array[] = str_pad(date('F', $time) . ' ' .
                       date('Y', $time), 20, ' ', STR_PAD_BOTH);
        } else {
            $array[] = str_pad(date('F', $time), 20, ' ', STR_PAD_BOTH);
        }
        // Impresion de las cabeceras de dia
        $array[] = 'do lu ma mi ju vi sá';

        //Calculo el time de la semana que cae primero de mes
        $time_first_day = mktime(0, 0, 0, date('n', $time), 1, date('Y', $time));
        $time_last_day = mktime(0, 0, 0, date('n', $time), date('t', $time), date('Y', $time));
        $time_day = $time_first_day;

        // Recorro cada dia del mes
        while ($time_day <= $time_last_day) {
            $array_week[] = str_pad(date('j', $time_day), 2, ' ', STR_PAD_LEFT);

            if (date('w', $time_day) == 6) {
                $array[] = implode(' ', $array_week);
                $array_week = array();
            }

            $time_day = $time_day + 86400;
        }

        if(!empty($array_week)) {
            $array[] = implode(' ', $array_week);
        }

        $array[2] = str_repeat(' ', 3 * (date('w', $time_first_day))) . $array[2];
        $array[count($array) - 1] .= str_repeat(' ', 3 * (6 - date('w', $time_day - 86400)));

        return $array;
    }
}
