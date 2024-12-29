<?php

echo "統計擲骰子<br>";

// 初始化
$p0 = $p1 = $p2 = $p3 = $p4 = $p5 = $p6 = 0;

// 迴圈版
for ($i = 0; $i < 100; $i++) {
  $point = rand(1, 6);
  echo "{$point}, ";
  switch ($point) {
    case 1:
      $p1++;
      break;
    case 2:
      $p2++;
      break;
    case 3:
      $p3++;
      break;
    case 4:
      $p4++;
      break;
    case 5:
      $p5++;
      break;
    case 6:
      $p6++;
      break;
    default:
      $p0++; // 安全性考量不要相信開發軟體，使自己堅固性更高
  }
}

// 槓槓：預告即將更改語言
echo "<br>";
if (!$p0) {
  echo "1點{$p1}次<br>";
  echo "2點{$p2}次<br>";
  echo "3點{$p3}次<br>";
  echo "4點{$p4}次<br>";
  echo "5點{$p5}次<br>";
  echo "6點{$p6}次<br>";
} else {
  echo "壞點{$p0}次<br>";
}

// 陣列版
$p0 = 0;
$p = [1 => 0, 0, 0, 0, 0, 0]; //index從1開始6個0

for ($i = 0; $i < 100; $i++) {
  $point = rand(1, 6);
  if ($point <= 6 && $point > 0) {
    $p[$point]++;
  } else {
    $p0++;
  }
}

echo "<br>";
if (!$p0) {
  foreach ($p as $key => $value) {
    echo "{$key}點{$value}次<br>";
  }
} else {
  echo "壞點{$p0}次<br>";
}

// 賠率版：陣列index特性
$p0 = 0;
$p = [1 => 0, 0, 0, 0, 0, 0]; //index從1開始6個0

for ($i = 0; $i < 100; $i++) {
  $point = rand(1, 9);
  if ($point <= 9 && $point > 0) {
    $p[$point > 6 ? $point - 3 : $point]++;
  } else {
    $p0++;
  }
}

echo "<br>";
if (!$p0) {
  foreach ($p as $key => $value) {
    echo "{$key}點{$value}次<br>";
  }
} else {
  echo "壞點{$p0}次<br>";
}

// 仔細程度(三個數字、正負數)

// array(線性無空間)不只是matrix：記憶體實作狀態，畫樹狀圖好除錯

$a[] = 1;
$a[] = [1, 2 ,3];
$a[] = [1, 2, 3, 4, array(3, 4, 5), 6];
var_dump($a);


