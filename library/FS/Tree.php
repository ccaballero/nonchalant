<?php

interface FS_Tree {
    public function mkdir($path, $mode);
    public function rmdir($path);
    public function rename($oldpath,$newpath);
    public function link($oldpath, $newPath);
    public function unlink($path);
    public function symlink($oldPath,$newPath);
    public function sync();
}
