<?php

class Tests_Splitpath extends Test {

    public function pre() {
        $directories = array(
            'current' => '/test',
            'home' => '/home',
        );

        $memory = Memory::getInstance();
        $memory->set('directories', $directories);
    }

    public function test() {
        $paths = array(
            array('/', array('/')),
            array('/home', array('/', 'home')),
            array('home/', array('/', 'test', 'home')),
            array('~/asdf.txt', array('/', 'home', 'asdf.txt')),
            array('~/test', array('/', 'home', 'test')),
            array('.', array('/', 'test')),
            array('..', array('/')),
            array('../nuevo', array('/', 'nuevo')),
            array('../nuevo/../nuevo1/', array('/', 'nuevo1')),
            array('./test/test1/.', array('/', 'test', 'test', 'test1')),
            array('../../.././../nuevo', array('/', 'nuevo')),
            array('/home/test', array('/', 'home', 'test')),
            array('/home/test/test/', array('/', 'home', 'test', 'test')),
        );

        foreach ($paths as $test) {
            $input = $test[1];
            $expected = Utils::split_path($test[0]);
            
            $this->assert(
                $input, $expected,
                str_pad('{' . implode(',', $input) . '}', 30) . ' -> ' .
                '{' . implode(',', $expected) . '}'
            );
        }
    }
}
