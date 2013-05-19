<?php

class Term_Output_Default_Simple extends Object
    implements Term_Output_Simple {

    public $layout;
    
    public function __construct() {
        $config = Config::getInstance();

        $this->layout = new View();
        $this->layout->layout_directory = $config->layout_directory;
        $this->layout->layout_file = $config->layout_file;
    }

    public function render() {
        echo $this->layout->render();
    }
}
