<?php

abstract class Abstract_Kernel {
    protected $vars;
    protected $history;
    
    public abstract function execute();
    public abstract function parser();
}  