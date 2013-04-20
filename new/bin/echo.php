<?php

class _Echo implements Command
{
    public function execute($parameter) {
        global $VARS;
        
        if (!empty($parameter[1])) {
            unset($parameter[0]);
            $result = trim(implode(' ', $parameter));
            
            if (preg_match("/\\$[a-zA-Z_][a-zA-Z0-9_]*/", $result)) {
                $var = substr($result, 1);
                $result = $VARS[$var];
            }
        }
        return $result;
    }
}
