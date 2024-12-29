<?php

  $mysqli = new mysqli('localhost','root','','brad');
  $mysqli->set_charset('utf8');

  $sql = 'select * from gift';
  $result = $mysqli->query($sql);
  // var_dump($result); 
  
  // before first, after last沒拿到回傳false
  while($row = $result->fetch_object()){
    echo "{$row->name}<br>";
    
  }
  
  // ->fetch_object()一筆一筆出來
  // $row = $result->fetch_object();




?>