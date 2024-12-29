<?php
  include("92_idfunction.php");

  if (checkTWid("A123456789")) {
    echo "正確";
  } else {
    echo "錯誤";
  } 
  echo "<hr>";
  echo createTWIdByRandom() . "<br>";
  echo createTWIdByGender(false) . "<br>";
  echo createTWIdByArea('B') . "<br>";
  echo createTWIdByBoth('C', true) . "<br>";

?>