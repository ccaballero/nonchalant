<?php

class Test
{
    public static $max_columns = 80;

    public function header() {
        $this->println(str_repeat('#', Test::$max_columns));
    }

    public function println($input, $columns = 0) {
        if (empty($columns)) {
            $columns = Test::$max_columns;
        }
        echo str_pad($input, $columns) . PHP_EOL;
    }

    public function assert($input, $expected, $message) {
        $result = $this->_assert($input, $expected);
        if ($result) {
            $print = '[OK]';
        } else {
            $print = '[!!]';
        }

        $this->println(str_pad($message, Test::$max_columns - strlen($print)) . $print);
    }

    private function _assert($input, $expected) {
        // TODO
        return $input === $expected;
    }

    public function pre() {}
    public function post() {}
}
