<?php

interface FS_Tree {
    public function mkdir($path, $mode);
    public function rmdir($path);
    public function rename($path);
    public function link($oldpath, $newPath);
    public function unlink($path);
    public function symlink($oldPath,$newPath);
}
