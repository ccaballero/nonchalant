<?php

class Cal {

    protected $messages = array(
        'error' => 'cal: Valor de año no permitido: utilice 1-9999',
    );

    public function cal($options = array()) {
        global $OUTPUT;

        $salida = '';
        switch (count($options)) {
            case 1:
                $salida = $this->print_month1(time());
                break;
            case 2:
                $year1 = $options[1];
                $year2 = intval($year1);
             
                if (is_int($year2)) {
                    if (1 < $year2 && $year2 < 9999) {
                        $salida = str_pad($year2, 64, ' ', STR_PAD_BOTH) . PHP_EOL . PHP_EOL;

                        $months = array();
                        for ($i = 0; $i < 12; $i++) {
                            $months = $this->print_month(time());
                        }
                        
                        for ($i = 0; $i < 3; $i++) {
                            
                        }
                        
                    } else {
                        $salida = "{$this->messages['error']}";
                    }                
                } else {
                    $salida = "{$this->messages['error']}: '$year1'";
                }                
                // [año] todos los meses
                break;
            case 3:
            case 4:
                // [mes del año] con todos sus dias
                break;
            default:
                // manual
                break;
        }

        $OUTPUT .= $salida;        
    }

    private function print_month1($time) {
        return implode('', $this->print_month);
    }
    
    private function print_month($time) {
        $array = array();
        
        $array[] = str_pad(date('F', $time) . ' ' . date('Y', $time), 20, ' ', STR_PAD_BOTH) . PHP_EOL;
        $array[] = 'do lu ma mi ju vi sá' . PHP_EOL;

        $primero = mktime(0, 0, 0, date('n', $time), 1, date('Y', $time));
        $dia_primero = date('w', $primero);

        $array[] = str_repeat(' ', 3 * $dia_primero);

        $b = $dia_primero;
        $condicion = 0;

        for ($i = 1; $i <= date('t', $primero); $i++) {
            $array[] = str_pad($i, 2, ' ', STR_PAD_LEFT) . ' ';
            if ($i % (7 - $b) == $condicion) {
                $array[] = PHP_EOL;
                $condicion = 7 - $dia_primero; 
                $b = 0;
            }
        }

        return $array;
    }
}
