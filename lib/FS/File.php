<?php

interface FS_File {
    public function creat($name, $node);
    public function open($file, $how);
    public function close($fd);
    public function read($fd, $length);
    public function write($fd, $length);
    public function opendir($path);
    public function closedir($dir);
    public function rewinddir($dir);
    public function pipe($fd);
    public function sync();
    public function lseek($fd,$offset, $whence);
}
    