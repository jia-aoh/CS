store procedure沒有備份出來
直接下指令
windows路徑>環境變數，編輯，新增，c:/xampp/mysql/bin
cmd: mysqldump 如果出現command not found有問題

cd /Applications/XAMPP/bin
cd 
pico .zprofile
export Path="$PATH:/Applications/XAMPP/bin" -- 
control o 寫入
control x 關掉
重開

cd Desktop
mysqldump --socket=/Applications/XAMPP/xamppfiles/var/mysql/mysql.sock -u root -B AddressBook -R -r addressbook.bak (-R包含store procedure, function -r: 輸出名)

改備份drop, use兩個地方黨名，匯入

安全性：
新增＞使用者帳號＞刪除紅色使用者名稱
root只能從本機登入：一但任何人進到我的電腦，就可以登入密碼近資料庫
新增使用者：全域權限（權限跟root一樣）
資料庫＞dbo(wner)資料庫擁有者
給外包商：show view, execute (store procedure)
主機名稱：*全球各地都可以

防火牆要允許3306可以通過

連到資料庫
1. ip, 帳號, 密碼
2. 放到公有雲

lanscan網路工程師
angryip不用錢windows

phpmyadmin設定檔處理
才能顯示連哪個遠端資料庫
可以選擇動phpmyadmin or apache

家裡自己架站：
1. 中華電信資料庫ip放dmz（安全性低），外面直接連中華電信ip就能進

2. ipfowarding開3306就可以了

3. vpn直接進ip分享器