<?php
require("../../libs/Smarty.class.php");
use Smarty\Smarty;
$smarty = new Smarty;
error_reporting(E_ALL);

$navItem = [
  '首頁',
  '分頁1',
  '分頁2'
];

$smarty->assign('navItem', $navItem);

$smarty->display("nav.tpl");