<?php

function __autoload($class) {
    @include str_replace('_', '/', $class) . '.php';   
}
