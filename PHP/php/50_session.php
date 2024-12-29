<?php

  session_start();
  //登出session全部摧毀
  session_destroy();

  //拿掉單一
  // unset($_SESSION['rand']);

  // header('Location: brad48.php');

  //網銀時間到直接fetch後端網銀帶走

?>