<?php 
echo strToTime("1970-1-1 00:00:00"), "<hr>";
// 設定php.ini, 瀏覽器自動轉為時區
echo date("Y-m-d H:i:s"), "<hr>";
echo time(), "<hr>";
?>