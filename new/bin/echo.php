<?php

class _Echo implements Command
{
    public function execute($parameter) {
        if (!empty($parameter[1])) {
            unset($parameter[0]);
            $result = implode(' ', $parameter);
        }
        return $result;
    }
}
