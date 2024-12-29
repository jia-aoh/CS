<?php
// 注入資料，可用於備份


  $url = "https://data.moa.gov.tw/Service/OpenData/ODwsv/ODwsvAgriculturalProduce.aspx";
  
  // 拿全部資料
  $json = file_get_contents($url);
  // echo $json; // 檢查

  $datas = json_decode($json); //encode編碼
  // var_dump($datas); // 檢查：解成功會有陣列標示stdClass是底層建構式

  //連到資料庫
  $mysqli = new mysqli('localhost', 'root', '', 'brad');
  $mysqli->set_charset('utf8');

  //砍資料
  $mysqli->query('delete from gift');
  $mysqli->query('alter table gift auto_increment = 1');

  foreach($datas as $row){
    $name = $row->Name;
    $feature = $row->Feature;
    $addr = $row->SalePlace;
    $tel = $row->ContactTel;
    $picurl = $row->Column1;
    $lat = $row->Latitude;
    $lng = $row->Longitude;

    $sql = 'insert into gift(name, feature, addr, tel, picurl, lat, lng)' . 
           " values ('$name', '$feature', '$addr', '$tel', '$picurl', $lat, $lng)";
    
    $mysqli->query($sql);
  }

?>