<?php
error_reporting(E_ALL);
require("../libs/Smarty.class.php");
include("func_img/upload_check.php");
include("func_img/formating.php");
use Smarty\Smarty;

$smarty = new Smarty;

if(isset($_POST['upload']) && $_POST['upload'] == 'upload'){

  $temp_path = $_FILES['img']['tmp_name']; // 臨時目錄
  $temp_filename = $_FILES['img']['name']; // 臨時文件名
  
  checkMimeType($temp_path);
  
  $img_dir = __DIR__ . "/img/";
  $file_actual_path = generateNewFilePath($temp_filename, $img_dir);
  
  if(move_uploaded_file($temp_path, $file_actual_path)){
    $smarty->assign("error", "1");
    // $img_relative_path = toRelativePath($file_actual_path);
    // $smarty->assign("img_path", htmlspecialchars($img_relative_path, ENT_QUOTES, 'UTF-8'));
    
    $thumb_path = thumb($file_actual_path, $img_dir);
    $thumb_relative_path = toRelativePath($thumb_path);
    $smarty->assign("thumb_path", htmlspecialchars($thumb_relative_path, ENT_QUOTES, 'UTF-8'));

  } else {
    $smarty->assign("error", "Upload failed。");
  }
}
$smarty->display('uploadimg.tpl');