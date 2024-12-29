<?php

  $account = 'brad';
  $passwd = '123456';
  $name = '布萊德';

  // 連結伺服器
  $mysqli = new mysqli('localhost','root','','brad');
  $mysqli-> set_charset('utf8');

  //砍資料
  $mysqli->query('delete from member');
  $mysqli->query('alter table member auto_increment = 1');

  
  $sql = 'insert into member (account, passwd, name) values (?,?,?)';
  $stmt = $mysqli->prepare($sql);
  $stmt->bind_param('sss', $account, $passwd, $name);
  if ($stmt->execute()){
    echo "new member insert";
  }else{
    echo "insert error";
  }

?>