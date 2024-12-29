<?php
/*
prepare會篩選隱碼攻擊
*/



  $url = "https://data.moa.gov.tw/Service/OpenData/ODwsv/ODwsvAgriculturalProduce.aspx";


  $json = file_get_contents($url);
  $datas = json_decode($json);

  $mysqli = new mysqli('localhost', 'root', '', 'brad');
  $mysqli->set_charset('utf8');

  $mysqli->query('delete from gift');
  $mysqli->query('alter table gift auto_increment = 1');

  // 檢查隱碼攻擊

  $sql = 'insert into gift(name, feature, addr, tel, picurl, lat, lng)' . 
         ' values (?,?,?,?,?,?,?)'; // 字串不用'?'

  // prepare return回來的
  $stmt = $mysqli->prepare($sql);

foreach($datas as $row){
  $name = $row->Name;
  $feature = $row->Feature;
  $addr = $row->SalePlace;
  $tel = $row->ContactTel;
  $picurl = $row->Column1;
  $lat = $row->Latitude;
  $lng = $row->Longitude;

  // 看mysqli_stmt文件
  // 綁定
  $stmt->bind_param('sssssdd', $name, $feature, $addr, $tel, $picurl, $lat, $lng);
  // 執行
  $stmt->execute();

}



?>