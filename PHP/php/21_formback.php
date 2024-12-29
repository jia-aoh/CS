<?php

$account = $_GET["account"];
$password = $_GET["password"];
$gender = $_GET["gender"];
$interests = $_GET["interests"];

echo "$account : $password : $gender";

foreach($interests as $k => $v){
  echo $v;
}

/*
用在增刪修put查crud - RESTful
get透過url
post資料存在body中: 沒辦法加到我的最愛
request不安全？

talend tester api
用戶發出請求
----------
伺服器回應資料:post藏在body

postman
*/

?>