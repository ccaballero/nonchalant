<?php

class FS_Tree_Files extends FS_Tree_Default {

    public function __construct($name, $parent, $attribute = null) {
        parent::__construct($name, $parent, $attribute);
    }

    public function mkdir($path, $mode = 0777) {
        return mkdir($path, $mode);
    }

    public function rmdir($path) {
        return rmdir($path);
    }

    public function rename($oldpath, $newpath) {
        return rename($oldpath, $newpath);
    }

    public function link($oldpath, $newPath) {
        
    }

    public function unlink($path) {
        
    }

    public function symlink($oldPath, $newPath) {
        
    }

    public function exists($node = '') {
        $path = $this->getPath();
        return file_exists(Utils::translate($path . '/' . $node));
    }

    public function getPath() {
        $paths = array($this->name);
        $node = $this->parent;

        while ($node != null) {
            $paths[] = $node->name;
            $node = $node->parent;
        }

        return implode('/', $paths);
    }

    public function getChild($name) {
        if (!$this->exists($name)) {
            return null;
        }
        $child = new FS_Tree_Files($name, $this);
        return $child;
    }

}
