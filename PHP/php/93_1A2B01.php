<?php
//謎底(不重複數字)
$q = [];
for($i=0;$i<4;){
  $tmp = rand(0, 9);
  if(!in_array($tmp, $q)){
    $q[] = $tmp;
    $i++;
  }
}

?>

<form action="1A2B02.php">
  <input name="x" placeholder="請輸入4位不重複數字">

  <!-- 謎底 -->
  <?php foreach($q as $k => $v){?>
  <input name="y[<?php echo "$k"; ?>]" value="<?php echo "{$v}"; ?>" hidden>
  <?php } ?>
  <button type="submit">送出答案</button>
</form>


<!-- 練習：
1統編
2大陸身分證
3表格10x10 > 質數背景顏色不同（除了1及本身）> 到數字一半 > 開根號
應該出1-1000 -->



