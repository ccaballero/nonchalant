<?php

abstract class Term_Abstract_Command {

    public static function validateOptions($options) {
        $valid_options = array();
        foreach ($options as $option => $description) {
            list($large, $short) = explode('|', $option);
            $length = strlen($short);

            $o = '';
            if ($length >= 1) {
                $o = $short[0];
            }
            
            $m = '';
            $t = '';
            if ($length >= 2) {
                $m = $short[1];
                $t = $short[2];
            }

            $result = array(
                'large' => $large,
                'short' => $o,
//                'cardinality' => $m,
//                'type' => $t,
            );
            
            $valid_options[$large] = $result;
            $valid_options[$o] = $result;
        }
        
        return $valid_options;
    }
}
