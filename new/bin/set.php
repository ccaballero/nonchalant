<?php
class Set implements Command{
    
    public function execute($parameter) {
        global $VARS;
        
        $result = Array() ;
        ksort($VARS);
        foreach ($VARS as $key => $value) {
          $result[] = $key.'='.$value;  
        }
        
        $result=  implode(PHP_EOL, $result);
        return $result;
    }
  
  }
