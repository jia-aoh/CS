<?php
header("Access-Control-Allow-Origin: *");
// laravel 如何設定？要查

$curDate = date('Y-m-d H:i:s');
echo '{"time": "' . $curDate . '"}';
?>
