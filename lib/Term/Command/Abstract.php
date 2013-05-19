<?php

abstract class Term_Command_Abstract {

    protected $kernel;
    
    public function __construct($kernel) {
        $this->kernel = $kernel;
    }
    
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
            );
            
            $valid_options[$large] = $result;
            $valid_options[$o] = $result;
        }
        
        return $valid_options;
    }
}
