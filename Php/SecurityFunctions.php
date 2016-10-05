<?php

function sqlInjection($input) {
  if(!preg_match('/[!"$&\/()=?^\;:_,.-]/', $input)) {
    return true;
  } else {
    return false;
  }
}

?>
