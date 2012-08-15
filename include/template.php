<?php

class Template {

    public $template_path = '';

    public function __construct() {
        $this->template_path = APPLICATION_PATH . '/templates';
    }

    public function main($getopt) {
        global $TEMPLATE;

        $do_list = get_option($getopt, 'list', 'l');
        
        if (!empty($do_list)) {
            echo implode(PHP_EOL, list_files($this->template_path));
        } else {
            // Parameter verification
            $arguments = $getopt->arguments;

            switch (count($arguments)) {
                case 0:
                    echo $TEMPLATE . PHP_EOL;
                    break;
                case 1:
                    $new_template = $arguments[0];

                    $available_templates = list_files($this->template_path);
                    if (in_array($new_template, $available_templates)) {
                        $TEMPLATE = $new_template . '.php';
                        $_SESSION['template'] = $TEMPLATE;
                        echo 'cambiada a la plantilla ' . $new_template . PHP_EOL;                        
                    } else {
                        echo 'la plantilla not found!!';
                    }
                    
                    break;
                default:
                    echo '';
                    break;
            }
        }
    }
}
