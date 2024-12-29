<?php

  if(isset($_REQUEST['account'])){
    $account = $_REQUEST['account'];
  }

  $mysqli = new mysqli('localhost','root','','brad');
  $mysqli->set_charset('utf8');

  $sql = 'select account from member where account = ?';
  $stmt = $mysqli->prepare($sql);
  $stmt->bind_param('s', $account);
  
  $stmt->execute();
  $stmt->store_result();

  if($stmt->num_rows > 0){ //1.找到 2. count(*) as count
    echo "Account Exist!";
  }else{
    echo "";
  }

?>