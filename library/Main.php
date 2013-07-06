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

        if (!empty($string_instruction)) {
            $sentences = Parser::parseInstruction($string_instruction);

            $stack = new Collections_Stack();
            foreach ($sentences as $sentence) {
                $stack->push($sentence);
            }

            while (!$stack->isEmpty()) {
                $instruction = $stack->pop();
                $pieces = preg_split('/ +/', $instruction);

                $command = ucfirst($pieces[0]);
                $command = 'Commands_' . $command;

//                $history = $command::main($instruction);
                $result = $command::main($instruction);
                
                $history = $this->memory->get('history');
                $history[] = $result;
                $this->memory->set('history', $history);
            }
        }

        $view = new View();
        $view->layout_directory = APPLICATION_PATH . '/templates';
        
        $view->history = $this->memory->get('history');
        echo $view->render('/default.php');
    }
}
