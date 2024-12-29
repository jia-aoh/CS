<?php
/*
檔案上傳web server會放到組態檔指定的資料夾，
後端就是把檔案從伺服器的資料夾，
放到我們要的地方
*/

$upload = $_FILES['upload'];
var_dump($upload);
echo '<hr>';
//多檔上傳結構
foreach($upload as $key => $value){
  echo "$key<br>";
  foreach($value as $k => $v){
    echo "$k => $v<br>";
  }
  echo '<hr>';
}
//上傳成功存取（練習打浮水印再存）
foreach($upload['error'] as $key => $value){
  if($value == UPLOAD_ERR_OK){
    move_uploaded_file($upload['tmp_name'][$key], "./upload/{$upload['name'][$key]}");
    //轉成base64以文字方式存、資料表blob
  }
}
//裁切imagecopyresized：空白、影像、空白xy、影像xy、寬高(mapping)


/*
if($upload['error'] == 0){ //上傳成功
  //將上傳檔案移至指定資料夾
  move_uploaded_file($upload['tmp_name'], "./upload/{$upload['name']}"); //通常檔名會再調整

}
  */

/*
本機回路tcp/ip: 127.0.0.1
子網遮罩：2^8，255.255.255.0
10.0.2就在相同網段，封包碰撞，會退回，所以切割網段，防止碰撞
網路我有營業，試其他人，網路概論，該怎麼利用路由去做傳遞動作？
檔案系統：執行身份：透過網路是一般用戶
網管人員開出漏洞


*/

//可以限制type
//tmp_name：伺服器暫存檔案的位置

//memory_limit(php script限制) > upload_max_filesize 


//檔案上傳打上浮水印
?>
