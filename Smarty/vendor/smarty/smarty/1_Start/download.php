<?php
$path = 'img/';
$file_name = basename($_GET['id']);
$file_path = $path . $file_name;

if(!file_exists($file_path)){
  header("HTTP/1.1 404 Not Found");
  die('File not found.');
}

$file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

switch($file_extension){
  case "pdf": $type = "application/pdf"; break;
  case "exe": $type = "application/octet-stream"; break;
  case "zip": $type = "application/zip"; break;
  case "rar": $type = "application/x-rar-compressed"; break;
  case "doc": $type = "application/msword"; break;
  case "xls": $type = "application/vnd.ms-excel"; break;
  case "ppt": $type = "application/vnd.ms-powerpoint"; break;
  case "gif": $type = "image/gif"; break;
  case "png": $type = "image/png"; break;
  case "jpeg":
  case "jpg": $type = "image/jpeg"; break;
  default: 
    header("HTTP/1.1 415 Unsupported Content Type");
    die('Unsupported Content Type.');
}

header ("Pragma: private");
header ("Expires: 0");
header ("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header ("Cache-Control: private", false);
header ("Content-Type: $type");
header ("Content-Disposition: attachment; filename=\"".basename($file_name)."\";");
header ("Content-Length:".filesize($path . $file_name));
readfile("$file_path");
?>