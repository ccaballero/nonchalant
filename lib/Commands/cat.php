<?php
// vlady
class Cat implements Command {
    public function execute($parameter) {
        global $OPENED_FILES;

        $stdin = $OPENED_FILES[0];
        $OPENED_FILES[1] = $stdin;
    }
}


//class Cat
//{
//    public function main($getopt) {
//        global $OPENED_FILES;
//        
//        //Filssystem initialization
//        if (count($getopt->arguments) >= 1) {
//            foreach ($getopt->arguments as $path) {
//                $file = new FS_File_Files($OPENED_FILES);
//
//                $fd = $file->open(translate($path), 'r');
//
//                $buffer = '';
//                while (($aux = $file->read($fd, 1)) != null) {
//                    $buffer .= $aux;
//                }
//
//                echo $buffer . PHP_EOL;
//                $file->close($fd);
//            }
//        }
//    }
//
//}
//
