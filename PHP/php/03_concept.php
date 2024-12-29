// 網頁：在用戶端被執行，content type: 瀏覽器看到type/html會用html標準執行
// php：看到組態檔.php，就將文件內容進行解義，在伺服器執行，把結果跟前端一起送回去，通訊協定都一樣，有人跟我要，我就給他，連接拿回來
// 三層架構：mysql:web server(私有)3306 port, apache: web server 80port, 
// 

// apache sever同時應付多個請求會很累：大甲媽分身(去拜一樣有保佑)，fork(佔記憶體)分支做請求，賣完，伺服器把沒用的記憶體回收
// http 80 port 走名碼，密碼都心酸的
// https 443 port 
// java班用湯姆貓8080
// 1-1024 port 公眾預設port號，1024-自訂port

xampp:伺服器
config組態檔
httpd.conf網頁伺服器組態檔
  1. key value
    SRVROOT 在哪
    Listen 80 -- 傾聽機制(委託機制，觸發事件用的)-聽很重要，打麻將
    LoadModule 外掛
  2. <IfModule mod名>如果外掛存在執行 key value</IfModule>

  DocumentRoot "伺服器啟動的根path" 
    <Dictionary>
      indexes自動產生index頁面
    </Dictionary>
iso8859-1

伺服器response 只傳檔案內容不包含檔案名稱
單人單工＞多人

一個ip有2^16個port65536個(ip銀行地址, port窗口)

以前xampp在mac是用虛擬主機
apache穩定度高
城市執行會讀config知道要怎麼運作：httpd.conf
xampp/ apache/ bin放執行檔, httpd, 
mysql用戶端, mysqld伺服端demon背景常駐模式 - 鬼都有在運作
dll 動態函式庫

//相關：網際網路（如何運作？），資料庫（sql語法, 各家有port），作業系統（檔案系統如何存取：mod, usrgroupothers）

// pid: process id(由作業系統interrupt差斷訊號) ps aux, 重啟(stop and start) | 組態檔有修改 (重讀)