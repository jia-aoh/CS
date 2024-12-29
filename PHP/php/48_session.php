<?php
  //先讓session認識api的定義，才能session
  include('bradapis.php');

  // 啟用session, .ini的session_auto_start=0
  // 設定session存活時間(銀行)
  session_start();

  $nums = range(1,49);
  shuffle($nums);
  for($i=0; $i<6; $i++){
    $lottery[] = $nums[$i];
  }

  $_SESSION['lottery'] = $lottery;

  $brad = new Student('brad', 100, 90 ,80);
  $_SESSION['std1'] = $brad; // session放object傳址

  //session用物件比較省記憶體空間，濫用負擔大

  $brad->setMath(0);

?>

Lottery: <br>
<?php 
  foreach($lottery as $key => $value){
    echo "$value<br>" ;
  }
?><hr>
<?php
  echo $brad->getName() . ':' . $brad->sum() . ':' . $brad->avg();

?><hr>
<a href="49_session.php">Next</a>