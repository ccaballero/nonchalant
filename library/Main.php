<?php

class Main extends Generic_Object {

    public function initialize() {
        $this->config = Config::getInstance();
        $this->config->loadConfig('../config/settings.json');

        $this->input = $config->getInput();
        $this->output = $config->getOutput();

        $this->memory = Memory::getInstance();

        $this->kernel = Kernel::getInstance();
    }

    public function run() {
        $string_instruction = $this->input->getInput();
        
        $instruction = Parse::parseInstruction($string_instruction);
    }
}
