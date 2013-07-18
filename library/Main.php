<?php

class Main extends Generic_Object
{
    public function Main($config = null) {
        $this->setConfig($config);
    }

    public function setConfig($config) {
        if (!empty($config)) {
            $this->config = Config::getInstance();
            $this->config->loadConfig(
                APPLICATION_PATH . '/config/' . $config . '.json');
            $this->input = $this->config->getInput();
            $this->output = $this->config->getOutput();
        }
    }

    public function initialize($config = null) {
        $this->setConfig($config);

        $this->memory = Memory::getInstance();
        $this->kernel = Kernel::getInstance();

        // setting of default vars
        if (!$this->memory->exists('directories')) {
            $directories = array(
                'current' => '/',
                'home' => '/home',
            );
            $this->memory->set('directories', $directories);
        }

        $root = new FS_Tree_Files();
        $this->memory->set('fs', $root);

        $opened_files = new Collections_List();
        $this->memory->set('opened_files', $opened_files);

        return $this;
    }

    public function run($string_instruction = '') {
        if ($this->config == null) {
            throw new Exception('config file not defined');
        }

        if (empty($string_instruction)) {
            $string_instruction = $this->input->getInput();
        }

        $result = '';
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

                    ob_start();
                    ob_implicit_flush(false);

                    if (class_exists($command)) {
                        $command::main($instruction);
                    } else {
                        echo 'nch: ' . $pieces[0] . ': no se encontró la orden';
                    }

                    $result = ob_get_clean();
                }
            }
        }

        $this->instruction = $string_instruction;
        $this->result = $result;
        return $this;
    }

    public function render($render_instruction = true) {
        $history = $this->memory->get('history', array());
        if ($history <> null) {
            $result = '';
            if ($render_instruction) {
                $result .= $this->instruction . PHP_EOL;
            }
            $result .= $this->result;
        } else {
            $result = '';
        }
        $history[] = $result;

        // color management
        $color = array();
        foreach ($history as $entry) {
            $color[] = Utils::transform_color($entry);
        }

        $this->memory->set('history', $history);

        $template = $this->memory->get('template', 'default');

        $view = new View();
        $view->layout_directory = APPLICATION_PATH . '/templates';
        $view->template_dir = '/templates/' . $template;
        $view->ps1 = 'nch #';
        $view->history = $color;
        echo $view->render('/' . $template . '.php');
    }
}
