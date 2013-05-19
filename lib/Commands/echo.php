<?php
// pepe
class _Echo implements Command {

    public function execute($parameter) {
        global $VARS;
        global $OPENED_FILES;

        if (!empty($parameter[1])) {
            unset($parameter[0]);
            $result = trim(implode(' ', $parameter));
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

            $OPENED_FILES[1] = $final;
//        return $final;
        }
    }
}
