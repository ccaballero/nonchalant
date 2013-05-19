<?php
// elvis
class Clear implements Command
{
    public function execute($parameter) {
        global $HISTORIAL;
        $HISTORIAL = '';
    }
}
//class Clear
//{
//    public function main() {
//        global $OUTPUTS;
//        $OUTPUTS = array();    
//    }
//}
