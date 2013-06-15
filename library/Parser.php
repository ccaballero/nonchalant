<?php

class Parser {

    public static function parseInstruction($string) {
        $sentences = array();
        $sentence = '';

        $string .= ';';

        for ($i = 0; $i < strlen($string); $i++) {
            switch ($string[$i]) {
                case '0':
                case '1':
                case '2':
                    if ($string[$i + 1] == '>') {
                        $sentences[] = $sentence;
                        $sentence = $string[$i];
                    }
                    break;
                case '\\':
                    if (!in_array($string[$i + 1],
                        array('|', '>', ';', '<', '&'))) {
                        $sentence .= $string[$i];
                    }
                    $sentence .= $string[$i + 1];
                    $i++;
                    break;
                case '|':
                case '>':
                case ';':
                case '<':
                case '&':
                    if ($string[$i] == $string[$i - 1]
                        || $string[$i - 1] == '0'
                        || $string[$i - 1] == '1'
                        || $string[$i - 1] == '2') {
                        $sentence .= $string[$i];
                    } else {
                        $sentences[] = $sentence;
                        $sentence = $string[$i];
                    }
                    break;
                default:
                    $sentence .= $string[$i];
                    break;
            }
        }

        return $sentences;
    }

    public static function parseArguments($string) {
        
    }
}
