<?php
  $mysqli = new mysqli('localhost', 'root', '', 'brad');
  $mysqli->set_charset('utf8');

  $id = 6;
  $tel = '123';
  $lat = 24.123456;

  $sql = 'update gift set tel = ?, lat = ? where id = ?';

  //int, double, string, blob
  $stmt = $mysqli->prepare($sql);
  $stmt->bind_param('sdi', $tel, $lat, $id);
  if($stmt->execute()){
    echo "update success";
  } else {
    echo "update failure";
  }

?>