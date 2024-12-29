<?php
// 綁定輸出、做分頁？


//分頁公式
  $rpp = 10;
  $page = 1; // 默認頁1
  if(isset($_GET["page"])){
    $page = $_GET['page'];
  } // 用戶自選
  $start = ($page-1) * $rpp;
  $prev = $page == 1 ? 1 : $page-1;
  $next = $page+1;

  define('PAGE', $page); // row per page
  define('RPP', $rpp); // row per page

  $mysqli = new mysqli('localhost','root','','brad');
  $mysqli->set_charset('utf8');

  // 正式專案不會有select *

  $sql = 'select id, name, feature, addr, tel, picurl from gift';
  if(isset($_GET['key']) && strlen($_GET['key']>0)){
    $key = $_GET['key'];
    $skey = "%{$key}%";
    $sql .= ' where name like ? or feature like ? or addr like ? limit ?, ?';
    
    $stmt = $mysqli->prepare($sql);
    // 綁定??
    $stmt->bind_param('sssii', $skey, $skey, $skey, $start, $rpp); //where parameter
  }else{
    $sql .= ' limit ?, ?';
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('ii', $start, $rpp); //limit parameter        
  }
  


  // 執行
  if($stmt->execute()){

    //儲存結果(不一定要寫)
    $stmt->store_result();
    //綁定結果
    $stmt->bind_result($id, $name, $feature, $addr, $tel, $picurl);

    
    // limit做分頁
    
    ?>
<form action="">
  <input type="text" name="key" placeholder="Keyword" value="<?php if(isset($_GET['key']) && strlen($_GET['key']>0)) echo $key;?>">
  <input type="submit" value="search">
</form>
<a href="?page=<?php echo $prev;?>">Pref</a> | <a href="?page=<?php echo $next;?>">Next</a>
<select name="rpp" id="">
  <option value="5">顯示5筆</option>
  <option value="10">顯示10筆</option>
  <option value="20">顯示20筆</option>
</select>
<hr>
<table border="1" width="100%">
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Feature</th>
    <th>Address</th>
    <th>Tel</th>
    <th>Pic</th>
  </tr>
  <?php
  while($stmt->fetch()){
    // 指標在before first, fetch再往後
    echo "<tr>";
    echo "<td>{$id}</td>";
    echo "<td>{$name}</td>";
    echo "<td>{$feature}</td>";
    echo "<td>{$addr}</td>";
    echo "<td>{$tel}</td>";
    echo "<td><img src='{$picurl}' width='80px'></td>";
    echo "</td>";

  }
  
  ?>
</table>

<?php

}else{
  echo 'stmt->execute有問題';
}

?>