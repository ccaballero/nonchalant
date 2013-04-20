<?php

//      $var1='$a es mayor $b ';
//      $var2='q $b';
//      $var = preg_match_all("/\\$[a-zA-Z_][a-zA-Z0-9_]*/", $var1,$res);
//      var_dump($res);

$VARS = array(
    'a' => '1',
    'b' => '2',
);

$vars = array();
$result = '$a es mayor $b';

preg_match_all("/\\$[a-zA-Z_][a-zA-Z0-9_]*/", $result, $vars);

$regex_vars = array();
$values_vars = array();

foreach ($vars[0] as $var) {
  $regex_vars[] = '/\\' . $var . '/';

  if (isset($VARS[substr($var, 1)])) {
    $values_vars[] = $VARS[substr($var, 1)];
  } else {
    $values_vars[] = '';
  }
}

$regex_vars[] = '/mayor/';
$values_vars[] = 'menor';

var_dump($regex_vars);
var_dump($values_vars);

$final = preg_replace($regex_vars, $values_vars, $result);
echo $final;
