<?php

  $op = $x = $y = $r = ''; // 騙他原本就存在
  if(isset($_GET['x'])){ // 問一個參數就好，因為送一次表單，所有參數都會送
    $x = $_GET["x"];
    $y = $_GET["y"];
    $op = $_GET["op"];
    switch($op){
      case '1': 
        $r = $x + $y;
        break;
      case '2': 
        $r = $x - $y;
        break;
      case '3': 
        $r = $x * $y;
        break;
      case '4': 
        $r1 = (int)($x / $y);
        $r2 = $x % $y;
        $r = "$r1...$r2";
        break;

    }
  }
?>

<form action="cal.php">
  <input name="x" value="<?php echo "$x";?>">
  <select name="op">
    <!-- +/會另外編碼 -->
    <option value="1" <?php echo $op == "1" ? "selected" : "";?>>+</option>
    <option value="2" <?php echo $op == "2" ? "selected" : "";?>>-</option>
    <option value="3" <?php echo $op == "3" ? "selected" : "";?>>x</option>
    <option value="4" <?php echo $op == "4" ? "selected" : "";?>>/</option>
  </select>
  <input name="y" value="<?php echo "$y";?>">
  <input type="submit" value="=">
  <?php echo $r; ?>
</form>

