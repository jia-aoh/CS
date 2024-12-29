<?php
  //預設時區
  date_default_timezone_set("Asia/Taipei");
  //$_SERVER抓用戶端時區，遠端退房，設電子鎖
  
/*
filesystem

開opendir
串流stream
關
@xx or die(=exit)(""); 隱藏warning訊息，redirect
*/

  $fp = @opendir(".") or die('Server Busy');
  // var_dump($fp);
?>

<table border="1" width="100%">
  <tr>
    <th>Filename</th>
    <th>Type</th>
    <th>Size</th>
    <th>aTate</th>
    <th>mTime</th>
  </tr>
  <?php
    //串流(readdir注意空字串也是false)
    while(($file = readdir($fp))!==false){
      echo "<tr>";
      echo "<td>$file</td>";
      echo "<td>" . filetype($file) . "</td>";
      echo "<td align='right'>" . filesize($file) . "bytes</td>";
      echo "<td>" . date("Y-m-d H:i:s",fileatime($file)) . "</td>";
      echo "<td>" . date("Y-m-d H:i:s",filemtime($file)) . "</td>";
      echo "</tr>";
    }
  
    closedir($fp);
  ?>
  

</table>