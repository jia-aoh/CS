<?php
require("../libs/Smarty.class.php");
use Smarty\Smarty;
$smarty = new Smarty;
error_reporting(E_ALL);
if (isset($_GET['series_id'])) {
  
  include "config/connect.php";
  $pdo = connectDB();

  include "products/selectSeriesInfo.php";
  $series = new Series($pdo);
  $smarty->assign('series', $series->loadSeries($_GET['series_id']));
  

  if(isset($_POST['submit']) && $_POST['submit']=='save'){
    $msg = $series->updateStock($_POST['id'], $_POST['stock']);
    $smarty->assign('error_msg', $msg);
    header("Location: index.php");
  }
  
} else {
  header("Location: index.php");
  
  exit;
  
}

$smarty->display("edit.tpl");