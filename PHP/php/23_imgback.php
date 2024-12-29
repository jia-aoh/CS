<?php
/*
資料庫
聊天室web socket
檔案上傳（server端、base64、aws server）
電子商務（圖片無限制寬高，後端裁切、resize、浮水印promotion）
*/

//後端影像先處理再給後端
//img process generation > gd 
?>
<?php
//動態影像資料(內容動態)

  define('WIDTH', 400);
  define('HEIGHT', 20);

  $rate = 0;
  if(isset($_GET['rate'])) $rate = $_GET['rate']; // 50 => 50%

  //1_創建空白畫布
  $img = imagecreate(WIDTH, HEIGHT);
  // var_dump($img);
  //物件是裝存記憶體位置

  //2_挑選原色、工具
  // 電腦座標、數學座標、世界座標
  $yellow = imagecolorallocate($img, 255, 255, 0);
  $red = imagecolorallocate($img, 255, 0, 0);
  imagefill($img, 0, 0, $yellow);
  imagefilledrectangle($img, 0, 0, (int)(WIDTH*$rate/100), HEIGHT, $red);
  
  //3_存檔、輸出(browser, download)
  //why頁面而不是原始碼：瀏覽器收到原始碼預設解讀為html或文字，所以文件先宣告以下content-type為⋯⋯
  header('content-type:image/jpeg');
  imagejpeg($img);
  /* 
  文字：text/html; charset=utf-8
  原始碼：⋯⋯查表
  */
  
  //4_記憶體釋放
  imagedestroy($img);
  ?>
<?php



?>
<hr>
<?php
$info = gd_info();
foreach ($info as $k=> $v) {
  echo "{$k}:{$v}<br>";
}
//1創畫布
//2挑選原色、工具
//3存檔、輸出
//4記憶體釋放
?>