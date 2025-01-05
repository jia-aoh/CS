<?php
function thumb($file_path, $dir) {
  $img = imagecreatefromjpeg($file_path);
  $width = imageSX($img);
  $height = imageSY($img);

  $thumb_width = 150;
  $thumb_height = ($thumb_width / $width) * $height;

  $thumb = imagecreatetruecolor($thumb_width, $thumb_height);
  imagecopyresampled($thumb, $img, 0, 0, 0, 0, $thumb_width, $thumb_height, $width, $height);

  $file_name = pathinfo($file_path, PATHINFO_BASENAME);
  imagejpeg($thumb, $dir . "thumb_" . $file_name);

  imagedestroy($img);
  imagedestroy($thumb);
  return $dir . "thumb_" . $file_name;
}