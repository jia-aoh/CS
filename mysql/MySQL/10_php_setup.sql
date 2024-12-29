/* PHP Setup --------------------------------------------

***WARNING***
服務器關機前要關掉

1. 載點
XAMPP(MariaDB-Google)
MAMP(mySQL-Oracle)
2. Open In Browser
localhost/+檔名與副檔名

2.1 Terminal(mac要建立桌面捷徑設定權限)
cd /Application/XAMPP
ls (list directory)
sudo (superuser do身份會轉到最高)
sudo ln -fs htdocs ~/Desktop/htdocs（ln全功能的捷徑）

2.2 Terminal(修改權限)
cd xamppfiles/
ls
ls -ld htdocs
sudo chown -R 自己名字 htdocs(change owner)
密碼
上鍵
*/

-- 資料庫設定 ----------------------------------------------

/* 00_基本設定

一、
1. 名稱
2. 定序：utf8mt4_general_ci
-- 選擇語系、ci大小寫不分

二、
1. database名稱：
-- 大小寫敏感、開頭不數字、＿、不可符號
2. 欄數

三、欄名(engligh)：一開始就想好，事後改是大工程
1. 中文名－varchar(51=50字+結尾字元)：身分證名字長度限制
2. 英文名－
3. 地址 －varchar(100)經驗
4. 行動電話－varchar(20-30) + 資安：1.前端檢查<>$。2.發簡訊驗證。
          －int(+)省空間，安全 (-)只支援行動電話, or 分欄：區碼、電話、分機
5. 郵件地址－               + 資安：1.發email驗證

......
思考：
char v.s. varchar
1. 中文字(把握長度+1結束字元)*3位元/字。e.g.身分證、統編、行動電話
*/
------------------------------------------
/* 01_索引

1. PK：不重複，不為null
-- 身分證、學號、流水號

2. Unique index：不為null

3. 索引(銀鑰匙)：binary search
//時機：
  1.資料>1000筆。
  2.where欄位。
  3.關聯性兩端(反向)。
  4.int, 排序的欄位
  5.Acoustic裝置
//操作：結構＞勾欄位＞索引＞銀鑰匙就是binary search
//原理：排序＞建binary tree
//效率：logn/log2
//最大多欄索引：2^n-1個
*/

/*
刷million筆資料給後端後果：
塞網路、後端記憶體爆掉
*/