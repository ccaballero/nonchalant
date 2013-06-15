<?php

abstract class FS_Tree_Default implements FS_Tree {
    protected $files;
    protected $attribute;
    
    public function __construct($attribute = null) {
        $this->files = array();
        $this->attribute = $attribute;
    }
    
    public function getFiles() {
        return $this->files;
    }

    public function getAttribute() {
        return $this->attribute;
    }

    public function setFiles($files) {
        $this->files = $files;
    }

    public function setAttribute($attribute) {
        $this->attribute = $attribute;
    }
}
