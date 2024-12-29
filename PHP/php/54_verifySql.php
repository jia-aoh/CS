<?php

  // 加密: 類似壓縮重新編碼
  $passwd = '123456';
  $hashPasswd = password_hash($passwd, PASSWORD_BCRYPT); // 雜湊通常用質數處理

  // 驗證
  if(password_verify('123456', $hashPasswd)){
    echo "ok";
  } else {
    echo "xx";
  };

  


  // bmp > jpg
  // wav > mp3
  // 壓縮原理：微積分

?>