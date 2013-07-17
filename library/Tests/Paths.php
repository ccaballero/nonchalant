<?php

class Tests_Paths extends Test
{
    public function pre() {
        $directories = array(
            'current' => '/test',
            'home' => '/home',
        );

        $memory= Memory::getInstance();
        $memory->set('directories', $directories);
    }

    public function test() {
        $paths = array(
            array('/', '/'),
            array('/home', '/home'),
            array('home/', '/test/home/'),
            array('~', '/home'),
            array('~/test', '/home/test'),
            array('.', '/test'),
            array('..', '/'),
            array('../nuevo', '/nuevo'),
            array('../nuevo/../nuevo1/', '/nuevo1/'),
            array('./test/test1/.', '/test/test/test1'),
            array('../../.././../nuevo', '/nuevo'),
            array('/home/test', '/home/test'),
            array('/home/test/test/', '/home/test/test/'),
        );

        foreach ($paths as $test) {
            $result = Utils::canonical($test[0]);
            $expected = $test[1];

            $this->assert(
                $result, $expected,
                str_pad($test[0], 20) . ' -> ' .
                str_pad($result, 20) . ' -> ' .
                str_pad($expected, 20)
            );
        }
    }
}
