<?php

class _Echo implements Command
{
    public function execute($parameter) {
        global $VARS;

        if (!empty($parameter[1])) {
            unset($parameter[0]);
            $result = trim(implode(' ', $parameter));

            if (preg_match("/\\$[a-zA-Z_][a-zA-Z0-9_]*/", $result)) {
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
              var_dump($regex_vars);
              var_dump($values_vars);
              var_dump($result);
              var_dump($final);
            }
        }
        return $final;
    }
}
