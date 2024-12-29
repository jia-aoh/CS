<?php

  $img = imagecreatefromjpeg('./img/img.jpg');
  $yellow = imagecolorallocate($img, 255, 255, 0);

  imagettftext($img, 64, -90, 500, 300, $yellow, './font/Nunito-Regular.ttf', 'Hello, World');
  //角度：圖型驗證器

  //輸出在網頁
  header('content-type: image/jpeg');
  imagejpeg($img);
  
  //另存新檔(存用戶編輯好的圖片到我們本地端，下次就不用精後端修改)
  imagejpeg($img, 'img/ok.jpg'); //要看權限

  imagedestroy($img);

// jpeg2000醫療影像：另一協定，不能失真
?>