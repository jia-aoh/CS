pl sql(oracle的程式語言)
mysql(mysql程式)

session等級變數(在azure無效，因為同一次連線視為同一個變數)
set @
select @n := value from

區域變數
(放在store procedure沒return值 
或 function有return值)
好處：比後端快，怎麼運作後穿不一樣
缺點：寫程式>若換系統就要全部重新寫

declare n 型態 default 初始值(null)
select value into n from -- 存入變數

/* 沒有return值的procedure */
-- 一個procedure只能傳出一個select，所以多個值就增加欄位

drop procedure if exists loginCheck;
delimiter $$
create procedure loginCheck(myuid varchar(20), mypassword varchar(20)) -- 新增procedure
BEGIN
    declare n int default null;
    select count(*) into n from UserInfo where uid = myuid and password = mypassword; -- 變數名稱不能跟欄位名稱相沖
    if n = 1 then 
        select n as status, null as error; -- select欄是1或0
    else 
        select n as status, '帳號密碼錯誤' as error;
    end if;
END $$
delimiter;

call loginCheck('A01','1234'); -- 呼叫procedure，回傳1 or 0

ls *upgrade*
sudo ./執行檔，安全性機制

選課系統procedure：（團隊兩人1個月）
登入、查詢、加選、退選、交換志願序
前端：web, 語音選課

c#: linq在c#端呼叫資料庫，不用下sqlcommend（慢了8倍）

low balence平衡附載，後端系統忙不過來沒關係，一口氣server開60台
sql server基本上一台就好，兩台很麻煩，32核cpu，512GB插到滿，上百萬

會員註冊
drop procedure if exists register;
delimiter $$
create procedure register(myuid varchar(20), mypassword varchar(20), mycname varchar(51))
BEGIN
    declare n int default null;
    select count(*) into n from UserInfo where uid = myuid;
    if n = 1 then 
        select n as status, '帳號已被註冊' as title;
    else 
        insert into UserInfo(uid, password, cname) values (myuid, password(mypassword), mycname);
        select n as status, '註冊成功' as title;
    end if;
END $$
delimiter;

如果住址在house有就hid
password不能存明碼 select password('1234')資料庫內建hash，欄位名稱不要password
沒地方住、沒名字就⋯⋯
傳回註冊成功、註冊失敗（）
呼叫： call register('C01', '1234', 'David')
前後端都拿得到密碼

會員註冊老師
drop procedure if exists register;
delimiter $$
create procedure register(myuid varchar(20), mypassword varchar(20), mycname varchar(51))
BEGIN
    declare n int default 0;
    select count(*) into n from UserInfo where uid = myuid;
    if n = 1 then 
        select 0 as status, '帳號已被註冊' as title;
    else 
        insert into UserInfo(uid, password, cname) values (myuid, password(mypassword), mycname);
        select 1 as status, '註冊成功' as title;
    end if;
END $$
delimiter;

先前端hash到後端可以看到原始碼，星巴克你打什麼我網路封包分析
前端到後端一定需要網路，加裝網路封包分析儀，就看得到，作業系統、瀏覽器也會知道，瀏覽器插件不要亂裝，keylog作業系統打什麼mis都知道
