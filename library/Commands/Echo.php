<?php

class Commands_Echo {

    public static function main($args) {
        $memory = Memory::getInstance();
        $VARS =$memory->get('vars',array());
        
        $getopt = Parser::parseArguments($args);
        $parameters = $getopt['parameters'];


        if (!empty($parameters[0])) {
            $result = trim(implode(' ', $parameters));
            $final = $result;
            if (preg_match("/\\$[a-zA-Z_][a-zA-Z0-9_]*/", $result)) {
                $vars = array();
                preg_match_all("/\\$[a-zA-Z_][a-zA-Z0-9_]*/", $result, $vars);

                $regex_vars = array();
                $values_vars = array();

                foreach ($vars[0] as $var) {
                    $regex_vars[] = '/\\' . $var . '/';
                    if (isset($VARS[substr($var, 1)])) {
                        $values_vars[] = $VARS[substr($var, 1)];
                    } else {
                        $values_vars[] = '';
                    }
                }
                $final = preg_replace($regex_vars, $values_vars, $result);
            }
        return $final;
        }
    }

}
