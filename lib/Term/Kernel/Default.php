<?php

class Term_Kernel_Default extends Term_Kernel {

    public function __construct($input, $output) {
        $this->input = $input;
        $this->output = $output;
    }

    public function init() {
        $this->historial = '';
        if (isset($_POST['historial'])) {
            $this->historial = $_POST['historial'];
        }

        $this->vars = '';
        if (isset($_POST['vars'])) {
            $this->vars = unserialize($_POST['vars']);
        }

        // 0 -> stdin
        // 1 -> stdout
        // 2 -> stderr
        $this->opened_files = array('', '', '');

        return $this;
    }

    public function parser() {
        if (isset($_POST['command'])) {
            $this->input->setInstruction($_POST['command']);
            $this->historial .= $this->input->getInstruction();
        }

        return $this;
    }

    public function execute() {
        $result = '';
        $final_result = '';

        foreach ($this->input->getCommands() as $_command) {
            $command = ltrim($_command->getCommand());
            if (preg_match("/[a-zA-Z_][a-zA-Z0-9_]*=.*/", $command)) {
//                list($a, $b) = explode('=', $command);
//                $VARS[$a] = $b;
    //        } else if (preg_match(".+(|.+)+", $command)) {
    //            $pipes = explode('|', $command);
    //            foreach ($pipes as $pipe) {
    //
    //            }
            } else {
                $_result = $this->command($_command);
                $result = $_result['result'];
            }

            $final_result .= $result . PHP_EOL;
        }

        $final_result = htmlentities($final_result);

        $this->output->layout->historial = $this->historial . PHP_EOL
            . $final_result . PHP_EOL;
        $this->output->render();
    }

    private function command($command) {
        $parameter = $command->getParameters();

        $class = 'Commands_' . ucfirst($command->getCommand());
        if ($class <> null) {
            $object = new $class($this);
            $result = $object->main($command);
            $flag = true;
        } else {
            $result = 'nch: ' . $parameter[0] . ': command not found';
            $flag = false;
        }

        return array(
            'flag' => $flag,
            'result' => $result,
        );
    }
}
