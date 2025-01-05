<?php
require("../../../../vendor/autoload.php");
use Smarty\Smarty;
$smarty = new Smarty;

//XSS
$smarty->setEscapeHtml(true);

// production打開
// $smarty->setCompileCheck(\Smarty\Smarty::COMPILECHECK_OFF);


// section細項放前----------------------------
// for($i = 0; $i < 2; $i++){
//   $img[] = [
//     'img' => 'img' . $i, 
//   ]; 
// }
// for($i = 0; $i < 10; $i++){
//   $data[] = [
//     'series' => 'series' . $i,
//     'img' => $img,
//   ];
// }
// $smarty->assign("data", $data);
//

//--------------------------------------------
error_reporting(E_ALL);
include "config/connect.php";
// include "select/seeCharacter.php";
$pdo = connectDB();
// $result = selectCharactersBySeries($pdo, 1);
// $smarty->assign("result", $result);
//

// form select option
include "select/address.php";
$county = county($pdo);
$smarty->assign("county", $county);
//

include "insert/user.php";
if(isset($_POST['state'])){
  if($_POST['state'] == 'save'){ //save用函數包可觸發不同function
    $state = register(
      $pdo, 
      $_POST['name'],
      $_POST['email'],
      $_POST['password'],
      $_POST['county_id'],
      $_POST['birth']
    );
  }
  $smarty->assign("state", $state);
}

//------------------------------------------
include "products/selectSeriesInfo.php";
$series = new Series($pdo);
$smarty->assign("series", $series->loadSeries());


$smarty->display("index.tpl");

$pdo = null;
?>