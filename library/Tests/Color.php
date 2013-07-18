<?php

class Tests_Color extends Test
{
    public function test() {
        $expected = array(
            array(
                'A\033[41mB\033[1;35mC',
                'A' .
                '<span class="regular background-red">B</span>' .
                '<span class="text-purple bold">C</span>'
            ),
            array(
                '\033[41mA\033[1;35mB',
                '<span class="regular background-red">A</span>
                 <span class="text-purple bold">B</span>'
            ),
            array(
                '\033[0;37mA',
                '<span class="regular text-white">A</span>'
            ),
            array(
                '\033[0;33mA',
                '<span class="regular text-yellow">A</span>'
            ),
            array(
                '\033[1;37mA',
                '<span class="bold text-white ">A</span>'
            ),
            array(
                '\033[4;32mA',
                '<span class="underline text-green">A</span>'
            ),
            array(
                '\033[41mA',
                '<span class="regular background-red">A</span>'
            ),
        );
        
        foreach ($expected as $i => $entry) {
            $color = Utils::transform_color($entry[0]);
            $this->assert($entry[1], $color, 'test nro: ' . $i);
        }
    }
}
