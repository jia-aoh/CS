<?php
// 檢查圖片格式
function checkMimeType($temp_path){
  $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
  $file_type = mime_content_type($temp_path);

  if (!in_array($file_type, $allowed_types)) {
    die("Type Not Allowed.");
  }
}
// 生成新檔名
function generateNewFilePath($temp_filename, $base_path){
  $ext = pathinfo($temp_filename, PATHINFO_EXTENSION);
  $new_file_name = uniqid() . '.' . $ext;
  $actual_path = $base_path . $new_file_name;
  return $actual_path; // 新路徑
}
// 換web路徑
function toRelativePath($absolutePath){
  $relative_path = str_replace($_SERVER['DOCUMENT_ROOT'], '', $absolutePath);
  return $relative_path; // 換到tpl的相對路徑
}