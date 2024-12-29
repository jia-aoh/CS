<?php
/*
/Applications/XAMPP/xamppfiles/bin
./mysql -u root -p

desc table_name;看結構
int = 2^32 = 42億 = 4G
*/

  // 網域, 帳號, 密碼, (資料庫)也可以不指定只連到伺服器
  $mysqli = new mysqli('localhost', 'root', '', 'brad');
  $mysqli->set_charset('utf8');
  $sql = 'insert into cust(cname, tel, birthday)' . 
         ' values ("brad","123","1999-01-02")';
  $mysqli->query($sql);

  /*
  終端溝通：
  1. 建立連線./mysql -u root -p = new mysqli
  2. 準備對話
  3. 處理程式邏輯：1.請求資料query, prepare stmt(需要bind參數、結果) 2.
  */

/*
sql injection應用程式呼叫資料庫會發生
delete from ...
*/

?>