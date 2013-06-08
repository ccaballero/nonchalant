<?php

class Test {
    public function test() {
        var_dump($_SERVER);
    }
}

$test = new Test();
$test->test();
