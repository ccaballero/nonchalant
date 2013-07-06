<?php

class Main extends Generic_Object
{
    public function initialize($config) {
        $this->config = Config::getInstance();
        $this->config->loadConfig(APPLICATION_PATH . '/config/' . $config . '.json');

        $this->input = $this->config->getInput();
        $this->output = $this->config->getOutput();

        $this->memory = Memory::getInstance();

        $this->kernel = Kernel::getInstance();
        return $this;
    }

    public function run() {
        $string_instruction = $this->input->getInput();

        if (empty($string_instruction)) {
            echo <<<BEGIN
<html>
    <head>
        <title>Nonchalant</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <body>
        <form action="" method="post">
            <input name="command" type="text" />
            <input type="submit" value="execute"/>
        </form>
    </body>
</html>
BEGIN;
        } else {
            $sentences = Parser::parseInstruction($string_instruction);

            $stack = new Collections_Stack();
            foreach ($sentences as $sentence) {
                $stack->push($sentence);
            }

            while (!$stack->isEmpty()) {
                $instruction = $stack->pop();
                $getopt = Parser::parseArguments($instruction);

                $command = 'Commands_' . ucfirst($getopt['command']);
                echo $command::main($instruction);
            }
        }
    }
}
