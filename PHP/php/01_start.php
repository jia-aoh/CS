<?php
// javascript'',""沒差
// 前端拿到的是伺服器執行過的結果，所以php原始碼在前端拿不到

    echo '1. document';
    // phpinfo();
    // 我們user 瀏覽器代理agent 請求 伺服器接收代理請求 送原始碼 由瀏覽器解意
    // php組態檔 Loaded Configuration File	/Applications/XAMPP/xamppfiles/etc/php.ini

    // 除了core其他都是外掛
    // mysqli先天有工具能連到這個工具
      // 如果沒有要安裝驅動程式

    // PDO可以連多家資料庫(以物件導向的方式連接)
    // mysql是資料庫是伺服器，會對外營業
    // sqlite：android, ios都用是資料庫但不是伺服器

    echo '<hr>3. 查看資料型態<br>';
    // 弱型別(運算與型別有關)
    // 看得到就是document: html+js
    
    // php程式語言有對錯
    // 系統環境變數 $_
    // 大小寫嚴格區分，盡量別大小寫，首英文
    
    // gettype()
    // 看doc, zend, ZCE認證
    
    $var1 = 123;
    $var2 = 'Brad';
    echo gettype($var1) . '<br>';
    $var1 = 12.3;
    echo gettype($var1);
    
    // 殭屍程式zombie: 記憶體不清除
    
    // 螢幕報錯：初學、開發階段
    // 錯誤等級notice, warning, error, emergency, 500網頁不能跑
    // 到.ini改display_errors = on 重啟Apache server
    
    echo '<hr>5. 加減乘除<br>';
    $a = 10; $b = 3;
    $r1 = $a + $b;
    $r2 = $a - $b;
    $r3 = $a * $b;
    $r4 = (int)($a / $b);
    $r5 = $a % $b;
    // '你打啥我顯示啥', "\n跳脫字元：整理原始碼"
    echo "{$a} + {$b} = {$r1}<br>\n";
    echo "{$a} - {$b} = {$r2}<br>\n";
    echo "{$a} x {$b} = {$r3}<br>\n";
    echo "{$a} / {$b} = {$r4}...{$r5}<br>\n";
    

?>
