<?php

// for: 1.迴圈，2.12345345345

$i = 0;
for (printBrad(); $i < 10; printLine()) {
  echo "$i";
  $i++;
}

function printBrad()
{
  echo "Brad<hr>";
}
function printLine()
{
  echo "<hr>";
}
?>

// dos攻擊：server一直接到請求
// 無窮迴圈做拆解

// 九九乘法表
<?php

// 彈性化

// 預設值
$start = 2;
$rows = 2;
$cols = 4;

// 有輸入
if (isset($_GET["start"])) {
  $start = $_GET["start"];
  $rows = $_GET["rows"];
  $cols = $_GET["cols"];
}

// 定義常數，brad習慣全大寫
define("START", $start);
define("ROWS", $rows);
define("COLS", $cols);

// 擴充


?>
<h1>Brad Big Company</h1>

<hr>
用戶介面(後做)
<form action="11define.php">
  start: <input type="number" name="start" value="<?php echo $start ?>">
  rows: <input type="number" name="rows" value="<?php echo $rows ?>">
  cols: <input type="number" name="cols" value="<?php echo $cols ?>">
  <input type="submit">
</form>

<hr>

核心功能：不破壞美工原本的設計
<table border="1" style="width: 100%;">

  <?php

  for ($k = 0; $k < ROWS; $k++) { //意義：一列兩列
    echo "<tr>";
    for ($i = START; $i < START + COLS; $i++) {
      $newi = $i + $k * COLS;

      if ($k % 2) {
        echo "<td bgcolor = " . ($newi % 2 ? 'yellow' : 'pink') . " >";
      } else {
        echo "<td bgcolor = " . ($newi % 2 ? 'pink' : 'yellow') . " >";
      }



      for ($j = 1; $j <= 9; $j++) {
        $r = $newi * $j;
        echo "{$newi} x {$j} = {$r}<br>";
      }
      echo "</td>";
    }
    echo "</tr>";
  }

  ?>

</table>