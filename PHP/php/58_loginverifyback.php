<?php

//先驗證，拿到token(binary?)，只告訴結果，透過restful api回傳
  if(isset($_REQUEST['Account'])) header('Location: mysql8.php'); //redirect回註冊頁
  
  //加密
  $account = $_REQUEST['account'];
  $passwd = password_hash($_REQUEST['passwd'], PASSWORD_BCRYPT);
  $name = $_REQUEST['name'];
  $icon = $_FILES['icon'];
  
  // $icon['tmp_name'] //他是一個檔案，上傳檔案的位置
  $iconData = file_get_contents($icon['tmp_name']); //file_get_contents回傳base64字串
  $iconErr = $icon['error']; $iconType = $icon['type']; //存儲參數做格式判斷
  
  $mysqli = new mysqli('localhost','root','','brad');
  $mysqli->set_charset('utf8');

  $sql = 'insert into member(account, passwd, name, icon) values (?,?,?,?)';
  $stmt = $mysqli->prepare($sql);

  //存成功、能查、能把字串變圖片
  $stmt->bind_param('ssss', $account, $passwd, $name, $iconData);

  if($stmt->execute()){
    echo "ok";
  }else{
    echo "ERROR:{$mysqli->error}"; //只執行上一個執行的mysql出現的錯誤
  }


?>
<form action="58_frontverify.php">
  <input type="submit" value="回上頁">
</form>