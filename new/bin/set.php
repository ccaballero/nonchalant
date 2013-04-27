<?php
class Set implements Command{
    
    public function execute($parameter) {
        global $VARS;
        global $OPENED_FILES;
        
        $result = Array() ;
        ksort($VARS);
        foreach ($VARS as $key => $value) {
          $result[] = $key.'='.$value;  
        }
        
        $result=  implode(PHP_EOL, $result);
        
        $OPENED_FILES[1] = $result;
//        return $result;
    }
  
  }
