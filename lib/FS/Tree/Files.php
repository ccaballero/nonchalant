<?php

class FS_Tree_Files extends FS_Tree_Default {
    
    public function __construct($attribute = null)  {
        parent::__construct($attribute);
    }

    public function mkdir($path, $mode) {
        return mkdir($path);
    }

    public function rmdir($path) {
        
    }

    public function rename($oldpath, $newpath) {
        return rename($oldpath, $newpath);
    }

    public function link($oldpath, $newPath) {
        
    }

    public function unlink($path) {
        
    }

    public function symlink($oldPath,$newPath) {
        
    }
}
