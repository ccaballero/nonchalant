<?php

class Term_Default_Input implements Term_Input {

    protected $command;
    protected $options;
    protected $parameters;

    public function __construct($instruction) {
        $pieces = preg_split('/ +/', $instruction);
        $this->command = array_shift($pieces);

        // Options
        $this->parserOptions($pieces);
        var_dump($this->options);
    }

    public function getCommand() {
        return $this->command;
    }

    public function getOptions() {
        return $this->options;
    }

    public function getParameters() {
        return $this->parameters;
    }

    private function parserOptions($pieces) {

        for ($index = 0; $index < count($pieces); $index++) {
            if (preg_match("/--.+(=.+)?/", $pieces[$index])) {
                //--user  / -u root  --color
                $values = explode('=', $pieces[$index]);
                $this->options[$values[0]] = $values[1];
            } else if (preg_match('/-./', $pieces[$index])) {
                $this->options[$pieces[$index]] = $pieces[$index + 1];
            }
        }
    }

}
