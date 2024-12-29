<?php
  //寫入
  $fp = fopen('./ns1hosp.csv', 'r');
  //r+不清空覆蓋, w+清空寫新 ,a+加在後面


  // fwrite($fp, "資策會");
  // $c1 = fread($fp, 1);
  // echo "$c1<hr>";
  
  //幾乎不用，因為io動作頻繁(底層機制)
  // while(($c = fgetc($fp))!== false){
  //   echo $c;
  // }
  
  //先把第一行讀完，就不會印出
  fgets($fp);
  while(($line = fgets($fp))!== false){
    // echo "$line<br>";

    //把字串拆成陣列
    $data = explode(",", $line);
    echo "{$data[2]} : {$data[4]}<br>";
  }



  // fflush();
  fclose($fp);

/*
檔案存取:
1. 文字資料：有換列特性
2. binary用byte存取

file_get_contents()
fgetcsv()

whole file name：根路徑(dirname)到檔名(basename)

server端內的事情：command line
chgrp, chmod, chown伺服器有
1.週期任務crontab：有用戶請求才有執行，設定拍賣結標時間
2.訂時任務at

權限：
1. 權限範圍：僅限contents內
 e.g.777不一定可以砍、變更檔案名稱，要看對父資料夾有沒有可寫入的權限
2. 資料夾只給用戶端x不給rw，讓用戶可以href, x就夠了（多一層保護）＿改檔案系統預設umask



*/
?>