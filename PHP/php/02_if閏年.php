<?php
// 過濾機制用在防火牆

// 4潤100年不閏年400潤

$year = 2024;

if (!($year % 400)) {
  echo "{$year} is leap year.";
} elseif (!($year % 100)) {
  echo "{$year} is normal year.";
} elseif (!($year % 4)) {
  echo "{$year} is leap year.";
} else {
  echo "{$year} is normal year.";
}



$isLeap = false;
if ($isLeap) {
  echo "{$year} is normal year.";
} else {
 echo "{$year} is leap year.";
}

if ($year % 4 == 0) {
  //ruen
  if ($year % 100 == 0) {
    //normal
    if ($year % 400 == 0) {
      //ruen
    } else {
      //normal
    }
  } else {
    //ruen
  }
} else {
  //normal排除大部分的資料，效能更好
}
