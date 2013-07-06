<?php

class Parser
{
    public static function parseInstruction($string) {
        $sentences = array();
        $sentence = '';

        $string .= ';';

        for ($i = 0; $i < strlen($string); $i++) {
            switch ($string[$i]) {
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
                case '0':
                case '1':
                case '2':
                    if ($string[$i + 1] == '>') {
                        $sentences[] = $sentence;
                        $sentence = $string[$i];
                    }
                default:
                    $sentence .= $string[$i];
                    break;
            }
        }

        return $sentences;
    }

    public static function parseArguments($string) {
        $result = array(
            'command' => '',
            'options' => array(),
            'parameters' => array());

        $pieces = preg_split('/ +/', $string);
        $result['command'] = array_shift($pieces);

        for ($index = 0; $index < count($pieces); $index++) {
            $string = $pieces[$index];

            // large options
            if (preg_match("/--.+(=.+)?/", $string)) {
                @list($key, $value) = explode('=', substr($string, 2));
                    $result['options'][$key] = $value;
            // larges without parameters
            } else if (preg_match("/-.=.+/", $string)) {
                @list($key, $value) = explode('=', substr($string, 1));
                    $result['options'][$key] = $value;
            // short options
            } else if (preg_match('/-.+/', $string)) {
                for ($i = 1; $i < strlen($string) - 1; $i++) {
                    $result['options'][$string[$i]] = true;
                }
                if ($index + 1 < count($pieces)) {
                    $result['options'][$string[$i]] = $pieces[$index + 1];
                    $index++;
                } else {
                    $result['options'][$string[$i]] = true;
                }
            } else {
                $result['parameters'][] = $pieces[$index];
            }
        }

        return $result;
    }
}
