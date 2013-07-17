<?php

class Tests_Config extends Test {

    public function test() {
        $test1 = Config::getInstance();
        $test1->loadConfig(APPLICATION_PATH . '/config/settings-cli.json');

        var_dump($test1);
    }
}
