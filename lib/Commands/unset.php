<?php
// franz
class _Unset implements Command {

  public function execute($parameter) {
    global $VARS;
    unset($parameter[0]);
    foreach ($parameter as $value) {
        unset($VARS[$value]);
    }
    return;
  }

}