<?php

interface Collections_Listable
{
    public function isEmpty();
    public function add($element);
    public function remove($index);
}

