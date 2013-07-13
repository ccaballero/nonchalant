<?php

class Main extends Generic_Object
{
    public function initialize($config) {
        $this->config = Config::getInstance();
        $this->config->loadConfig(
            APPLICATION_PATH . '/config/' . $config . '.json');

        $this->input = $this->config->getInput();
        $this->output = $this->config->getOutput();

        $this->memory = Memory::getInstance();

        $this->kernel = Kernel::getInstance();
        
        // setting of default vars
        $this->memory->set('current_directory', '/');

        $root = new FS_Tree_Files();
        $this->memory->set('fs', $root);
        
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

                if (preg_match("/[a-zA-Z_][a-zA-Z0-9_]*=.*/", $instruction)) {
                    list($a, $b) = explode('=', $instruction);

                    $vars = $this->memory->get('vars', array());
                    $vars[$a] = $b;
                    $this->memory->set('vars', $vars);
                } else {
                    $pieces = preg_split('/ +/', $instruction);

                    $command = ucfirst($pieces[0]);
                    $command = 'Commands_' . $command;

                    $result = $command::main($instruction);

                    $history = $this->memory->get('history', array());
                    $history[] = $result;
                    $this->memory->set('history', $history);
                }
            }
        }

        $template = $this->memory->get('template', 'default');

        $view = new View();
        $view->layout_directory = APPLICATION_PATH . '/templates';
        $view->template_dir = '/templates/' . $template;
        $view->ps1 = '#';
        $view->history = $this->memory->get('history', array());
        echo $view->render('/' . $template . '.php');
    }
}
