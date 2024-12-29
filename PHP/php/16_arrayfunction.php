<?php

function sum(){
  $ary = func_get_args();
  $vv = 0;
  foreach ($ary as $v) {
    $vv += $v;
  }
  return $vv;
}

echo sum(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
function sum1(){
  return array_sum(func_get_args());
}

echo sum1(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11);
