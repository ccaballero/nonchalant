<?php

abstract class Term_Kernel extends Object {
    
    public abstract function init();
    public abstract function parser();
    public abstract function execute();
}
