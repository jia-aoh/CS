<?php
$poker = range(0, 51);
// 洗牌演算法
shuffle($poker);

// 發牌給4個玩家
$players = [[], [], [], []];
foreach ($poker as $k => $v) {
  $players[$k % 4][(int)($k / 4)] = $v;
}
?>

攤牌
<table border="1" style="width: 100%;">

  <?php
  $suits = ['&spades;' ,'<span style="color:red">&hearts;</span>' ,'<span style = "color:red">&diams;</span>' ,'&clubs;'];
  $values = ['A', 2, 3, 4, 5, 6, 7, 8, 9, 10, 'J', 'Q', 'K'];
  foreach ($players as $i => $player) {
    sort($player); // 根據定義sort
    echo "<tr>";
    foreach ($player as $k => $card) {
      // 分配花色
      $suit = $suits[(int)($card/13)];
      $value = $values[$card%13];
      echo "<td>{$suit}{$value}</td>";
    }
    echo "</tr>";
  }
  ?>

</table>

可列印字元
&spades; &hearts; &diams; &clubs;