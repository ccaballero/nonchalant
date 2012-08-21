<?php

class FS_File_Files extends FS_File_Default {
    private $real_fd;
    private $virtual_fd;
    private $offset;

    public function __construct(Collections_Listable $opened_files, 
                                $attribute = null) {
        parent::__construct($opened_files, $attribute);
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
    public function creat($name, $node) {

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

    }
}
