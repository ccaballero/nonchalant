<?php

class Term_Input_Complex {
    protected $instruction;
    protected $commands = array();

    public function setInstruction($instruction) {
        $this->instruction = $instruction;

        $commands = preg_split('/(?<!\\\\);/', $instruction);
        $this->commands = array();

        foreach ($commands as $command) {
            $input = new Term_Input_Simple();
            $input->setInstruction($command);

            $this->commands[] = $input;
        }
    }

    public function getInstruction() {
        return $this->instruction;
    }

    public function getCommands() {
        return $this->commands;
    }
}
