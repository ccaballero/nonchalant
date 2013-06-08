<?php

class Main extends Generic_Object {

    public function initialize() {
        $this->config = Config::getInstance();
        $this->config->loadConfig(APPLICATION_PATH . '/config/settings.json');

        $this->input = $this->config->getInput();
        $this->output = $this->config->getOutput();

        $this->memory = Memory::getInstance();

        $this->kernel = Kernel::getInstance();
        return $this;
        }

    public function run() {
        $string_instruction = $this->input->getInput();
        echo $string_instruction;
        $instruction = Parser::parseInstruction($string_instruction);
    }
}
