===值相同、型別也相同
!==全不等
^[A-Z]$開頭結尾
[^A-Z]排除
{n,m}n次以上(m次以下)

<?php
  define('LETTERS', 'ABCDEFGHJKLMNPQRSTUVXYWZIO');
  // 身分證驗證工具
  function checkTWid($id){
    $isRight = false;
    
    /*
    if (strlen($id) == 10) {
      $c1 = substr($id, 0 ,1);
      echo "$c1";
      $letter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

      if (strpos($letter, $c1) !== false) {
        $c2 = substr($id, 1 ,1);

        if ($c2 == '1' || $c2 == '2') {
          echo "$c2";          
        }          
      }         
    }
          */
          
    if (preg_match("/^[A-Z][12][0-9]{8}$/", $id)) {
      // $isRight = true;
      $letters = LETTERS;
      $c1 = substr($id, 0 ,1);
      // 英文編碼方式
      $a12 = strpos($letters, $c1) + 10;
      $a1 = (int) ($a12 / 10);
      $a2 = $a12 % 10;
      // 拿取數字
      $n1 = substr($id, 1, 1);
      $n2 = substr($id, 2, 1);
      $n3 = substr($id, 3, 1);
      $n4 = substr($id, 4, 1);
      $n5 = substr($id, 5, 1);
      $n6 = substr($id, 6, 1);
      $n7 = substr($id, 7, 1);
      $n8 = substr($id, 8, 1);
      $n9 = substr($id, 9, 1);
      // 驗證方式
      $sum = $a1*1 + $a2*9 + $n1*8 + $n2*7 + $n3*6 + $n4*5 + $n5*4 + $n6*3 + $n7*2 + $n8*1 + $n9*1;
      $isRight = $sum % 10 == 0;
      
    }
    return $isRight;
  }

  //身分證字號產生器
  //設計觀念：1.預設值，2.推給參數最多的
  function createTWIdByRandom() {
    $isMale = rand(0, 1) == 0;
    return createTWIdByGender($isMale);
  }
  function createTWIdByArea($area) {
    $isMale = rand(0, 1) == 0;
    return createTWIdByBoth($area, $isMale);
  }
  function createTWIdByGender($isMale) {
    $area = substr(LETTERS, rand(0, 25), 1);
    return createTWIdByBoth ($area, $isMale);
  }
  function createTWIdByBoth($area, $isMale) {
    $id = $area;
    $id .= $isMale ? '1' : '2';
    for ($i=0; $i<7; $i++) $id .= rand(0, 9);
    for ($i=0; $i<10; $i++) {
      if(checkTWid($id . $i)) {
        $id .= $i;
        break;
      }
    }
    return $id;
  }


    

  
  
  
  ?>

A123456789
192.168.3.4
2024-10-25
pattern、大小寫、搜尋完畢嗎
前端表單驗證，再送到後端
