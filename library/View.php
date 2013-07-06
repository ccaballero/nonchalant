<?php

class View extends Generic_Object {

    public function render($file = '') {
        $tpl = $file;
        if (empty($file)) {
            $tpl = $this->layout_file;
        }

        // Based in code of Fabien Potencier. (symfony 1.4)
        // sfPHPView.class.php
        // render method
        ob_start();
        ob_implicit_flush(false);
        try {
            require($this->layout_directory . $tpl);
        } catch (Exception $e) {
            // need to end output buffering before throwing the exception #7596
            ob_end_clean();
            throw $e;
        }

        return ob_get_clean();
    }
}
