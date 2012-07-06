<?php

interface FS_Attribute {
    public function chmod($path, $mode);
    public function chown($path, $owner, $group);
    public function stat($path, $buffer);
    public function fcntl($fd, $cmd);
    public function umask($mask);
}
