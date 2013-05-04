<?php

class Term_Default_Input implements Term_Input {

    protected $command;
    protected $options;
    protected $parameters;

    public function __construct($instruction) {
        $pieces = preg_split('/ +/', $instruction);
        $this->command = array_shift($pieces);

        // Options
        $this->parse($pieces);
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

    private function parse($pieces) {
        $command = 'Commands_' . ucfirst($this->getCommand());
        $input = Term_Abstract_Command::validateOptions(
            $command::$valid_options
        );

        for ($index = 0; $index < count($pieces); $index++) {
            $string = $pieces[$index];

            if (preg_match("/--.+(=.+)?/", $string)) {
                @list($key, $value) = explode('=', substr($string, 2));
                if (array_key_exists($key, $input)) {
                    $this->options[$key] = $value;
                } else {
                    throw new Term_Exceptions_Parser('Invalid large option');
                }
            } else if (preg_match("/-.=.+/", $string)) {
                @list($key, $value) = explode('=', substr($string, 1));
                if (array_key_exists($key, $input)) {
                    $this->options[$input[$key]['large']] = $value;
                } else {
                    throw new Term_Exceptions_Parser('Invalid short option');
                }
            } else if (preg_match('/-.+/', $string)) {
                for ($i = 1; $i < strlen($string); $i++) {
                    if (array_key_exists($string[$i], $input)) {
                        $this->options[$input[$string[$i]]['large']] = '';
                    } else {
                        throw new Term_Exceptions_Parser('Invalid short option');
                    }
                }
            } else {
                $this->parameters[] = $pieces[$index];
            }
        }
    }

    public function hasOption($parameter) {
        return array_key_exists($parameter, $this->options);
    }
}
