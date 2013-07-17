<?php

class Commands_Template {
    public $template_path = '';

    public function __construct() {
        $this->template_path = APPLICATION_PATH . '/templates';
    }

    public static function main($args) {
        $getopt = Parser::parseArguments($args);
        $parameters = $getopt['parameters'];
        $options = $getopt['options'];

        $template = new Commands_Template();
        
        $memory = Memory::getInstance();
        $tpl = $memory->get('template', 'default');

        if (array_key_exists('l', $options) || array_key_exists('list', $options)) {
            $list = array();
            foreach ($template->list_files() as $templates) {
                $list[] = substr($templates, 0, -4);
            }

            echo implode(PHP_EOL, $list);
            return;
        }

        switch (count($parameters)) {
            case 0:
                echo $tpl;
            case 1:
                $new_template = $parameters[0];

                $available_templates = $template->list_files();
                if (in_array($new_template . '.php', $available_templates)) {
                    $memory->set('template', $new_template);
                    echo 'template changed for ' . $new_template;
                } else {
                    echo 'template not found!!';
                }
        }
    }

    public function list_files() {
        $files = array();

        if ($handle = opendir($this->template_path)) {
            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") {
                    $files[] = $entry;
                }
            }
        }

        closedir($handle);

        return $files;
    }
}
