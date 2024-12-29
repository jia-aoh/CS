<?php
//過濾輸入數字
$a = $b = 0;
$result = '';
$round = 1;
if (isset($_GET["x"])) {
  $input = $_GET["x"];
  $q = $_GET["y"];
}
if (isset($_GET["result"])) {
  $result = $_GET["result"];
  $round = $_GET["round"];
}
  // 輸入檢查
  $aInput = str_split($input);
  if(preg_match('/^[0-9]{4}$/',$input) && count($aInput) == count(array_unique($aInput))){      
    //檢查AB
    for($i=0;$i<4;$i++){
      //A
      if($aInput[$i]==$q[$i]){
        $a++;        
        //B
      }elseif($q[$i]==$aInput[($i+1)%4] || $q[$i]==$aInput[($i+2)%4] || $q[$i]==$aInput[($i+3)%4]){
        $b++;        
      }      
    }
    if($a == 4){
      $result = "答對";
    }else{
      if($round==5){
        $result = "沒中⋯答案是";
        foreach($q as $k => $v){
          $result .= "{$v}";
        }
        $result .= "，下次加油";

      }else{
        $text = "第{$round}次結果{$a}A{$b}B（您輸入{$input}）<br>";
        $round += 1;
        $result = $result . $text;
      }
    }    
  }else{
    echo "<br>4位數不重複";
  }

?>

<form action="1A2B02.php">
  <input name="x" placeholder="剩<?php echo 6-$round; ?>次機會">
  
  <!-- 謎底 -->
  <?php foreach($q as $k => $v){?>
    <input name="y[<?php echo "$k"; ?>]" value="<?php echo "{$v}"; ?>" hidden>
    <?php } ?>
    <input hidden name="round" value="<?php echo $round; ?>">
    <input hidden name="result" value="<?php echo $result; ?>">
    <button type="submit">確定</button>
    <br>

    結果：<br>
    <?php echo "{$result}"; ?>
</form>
<form action="1A2B01.php">
  <button type="submit">重新一局</button>
</form>


<?php

//答案（到時候去掉）

//答案（到時候去掉）

//random謎底(不重複數字) 


//比對幾A幾B 

/*
練習：
1統編
2大陸身分證
3表格10x10 > 質數背景顏色不同（除了1及本身）> 到數字一半 > 開根號
應該出1-1000
*/
?>