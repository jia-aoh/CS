<!-- 洗牌＞發4家＞攤牌＞理牌(相同花色)
洗牌演算法：不重複單元輪播(廣告)
效能io差比較多，記憶體插不多 -->
<table border="1">
  <tr>
    <td>
      v1<br>
      <?php

      $poker = [];

      for ($i = 0; $i < 52; $i++) {
        $temp = rand(0, 51);
        // 檢查機制
        // 預設值，品管挑品管相反
        $isRepeat = false;
        for ($j = 0; $j < $i; $j++) {
          if ($temp == $poker[$j]) {
            //重複了
            $isRepeat = true;
            break;
          }
        }
        if (!$isRepeat) {
          $poker[] = $temp;
        } else {
          $i--;
        }
      }

      // 攤牌
      foreach ($poker as $k => $v) {
        echo "$k => $v<br>";
      }
      ?>
    </td>

    <td>
      v2<br>
      <?php
      $poker2 = [];
      for ($i = 0; $i < 52; $i++) {
        // 先做才能檢測（做了再說）
        do {
          $temp = rand(0, 51);
          $isRepeat = false;
          for ($j = 0; $j < $i; $j++) {
            if ($temp == $poker[$j]) {
              //重複了
              $isRepeat = true;
              break;
            }
          }
        } while ($isRepeat);
        $poker2[] = $temp;
      }

      // 攤牌
      foreach ($poker2 as $k => $v) {
        echo "$k => $v<br>";
      }
      ?>

    </td>
    <td>
      v4<br>
      <?php
      $poker3 = range(0, 51);
      // 洗牌演算法
      shuffle($poker3);

      foreach ($poker3 as $k => $v) {
        echo "$k => $v<br>";
      }
      ?>

    </td>
  </tr>
</table>