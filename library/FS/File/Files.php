<?php

class FS_File_Files extends FS_File_Default {
    private $real_fd;
    private $virtual_fd;
    private $offset;
    private $name;
    private $parent;

    public function __construct(
            $name, $parent,
            $opened_files = null, $attribute = null) {
        parent::__construct($opened_files, $attribute);
        $this->name = $name;
        $this->parent = $parent;
    }

    public function creat() {
        return fopen(Utils::translate($this->getPath()), 'w');
    }

    public function open($file, $mode) {
        $this->real_fd = fopen($file, $mode);
        $this->virtual_fd = $this->opened_files->add($file);
        $this->offset = 0;

        return $this->virtual_fd;
    }

    public Function close($fd) {
        $this->offset = null;

        $this->opened_files->remove($this->virtual_fd);
        fclose($this->real_fd);
    }

    public function read($fd, $length) {
        if (is_int($length) && $length >= 0) {
            $offset = $this->offset;
            $this->offset += $length;

            return fread($this->real_fd, $length);
        }
    }

    public function write($fd, $length) {

    }

    public function closedir($dir) {

    }

    public function lseek($fd, $offset, $whence) {

    }

    public function opendir($path) {

    }
    public function pipe($fd) {

    }
    public function rewinddir($dir) {

    }
    public function sync() {
        if(!file_exists($this->getPath())){
            $this->creat();
        }
    }
    
    public function getPath() {
        $paths = array($this->name);
        $node = $this->parent;

        while ($node != null) {
            $paths[] = $node->name;
            $node = $node->parent;
        }
        
        $paths = array_reverse($paths);
        return implode('/', $paths);
    }
}
