<?php

include '../library/Generic/Object.php';
include '../library/Config.php';
include '../library/Input/Http/Post.php';
include '../library/Output/Text.php';
include '../library/Log.php';


$test1 = Config::getInstance();

$test1->loadConfig('../config/settings.json');

var_dump($test1);