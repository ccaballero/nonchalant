<?php

class Tests_Default extends Test {

    public function test() {
        $this->assert(1, '1', 'Testing 1');
        $this->assert('a', "a", 'Testing 2');
        $this->assert(new stdClass(), new StdClass(), 'Testing 3');
        $this->assert(4 + 5, 9, 'Testing 4');
        $this->assert(null, '', 'Testing 5');
    }
}
