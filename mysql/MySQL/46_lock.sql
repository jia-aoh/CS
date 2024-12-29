鎖：控制資料是否能被存取

現在電腦沒辦法同時兩人寫同一筆資料，都要排隊，因為架構關系

寫的時候鎖，寫完上鎖

sql server U鎖

s(share): read上鎖，同時間數量不限
x(exclusive) : 改資料上鎖，同時間只能一個
-- 再上層結構加intend防止做白工，一開始就會知道指令要不要執行，而不是執行到一半遇到鎖rollback
is(intend s): 
ix(intend x): 

第一筆上鎖（未commit）X
start transaction;
update UserInfo set password = null 
where uid = 'A01'
-- rollback;
-- commit

第一筆上鎖（未commit）s -- 為了效率，查詢一結束會立刻解鎖
start transaction;
select * from UserInfo where uid = 'A01'
-- rollback;
-- commit

mysql所的狀態不完整
sql server要很複雜的指令
mongodb很容易就可以看得到

-- 超賣
-- 預設商品一件
update Product set n = 1 where pid = 1;
call buy();
select * from Product;



-- 購物procedure沒超賣
drop procedure if exists buy;
delimiter $$
create procedure buy()
begin 
    declare amount int;
    select n into amount from Product where pid = 1;

    if amount > 0 then 
        select '買走一個';
        update Product set n = n - 1 where pid = 1;
    else 
        select '賣完了';
    end if;
end $$
delimiter;


drop procedure if exists buy;
delimiter $$
create procedure buy()
begin 
    declare amount int;
    select n into amount from Product where pid = 1;
    -- do sleep(5); -- 休息3秒執行下個指令

    if amount > 0 then 
        select '買走一個';
        update Product set n = n - 1 where pid = 1;
    else 
        select '賣完了';
    end if;
end $$
delimiter;

--  do sleep(5); 模擬後端同一時間會有很多人一起執行

超賣解法：

1.通用transaction
查詢 > 判斷 > 修改剩餘數量
變
transaction 修改 > 查詢 > 判斷 剩餘數量

drop procedure if exists buy1;
delimiter $$
create procedure buy1()
begin 
    declare amount int;

    start transaction;  -- 若start transaction上s就放行了，所以一開始一定要x鎖，也就是改資料，再還
    -- mysql會timeout解鎖 -- sql server永遠不解鎖
    update Product set n = n - 1 where pid = 1; -- 先減
    select n into amount from Product where pid = 1; -- 因為x鎖前兩行，所以保證這一行一次只能夠服務一個人
    -- do sleep(5); -- 休息3秒執行下個指令

    if amount >= 0 then -- 0代表還有一項
        select '買走一個';
        commit;
    else -- 已經賣完，但多減了所以rollback（第二個人以後都是這個動作）
        select '賣完了';
        rollback;
    end if;
end $$
delimiter;

update Product set n = 1 where pid = 1;
call buy1();
select * from Product;

2. mysql專有解法

start transaction;
    update UserInfo set cname = '' where uid = 'A01'

-- rollback;
-- commit;

3. 查詢 > 判斷(加for update, x鎖) > 修改

drop procedure if exists buy2;
delimiter $$
create procedure buy2()
begin 
    declare amount int;

    start transaction;
    select n into amount from Product where pid = 1 for update; --上x鎖
    -- do sleep(5);

    if amount > 0 then
        select '買走一個';
        update Product set n = n - 1 where pid = 1; --扣庫存
        commit;
    else
        select '賣完了';
        commit; -- rollback也可以，因為沒修改到資料，但一定要解鎖
    end if;
end $$
delimiter;

update Product set n = 1 where pid = 1;
call buy2();
select * from Product;

僅有啟動交易才能ac'i'd一致性
i 隔離等級：會依本地或azure端有所區別

-- 1 repeatable read(在同一交易中讀好幾次：不被外界干擾，或不知道外界發生什麼事)
update Product set n = 20 where pid = 1;
start transaction;
select n as R1 from Product;
do sleep(10);
select n as R2 from Product;
commit;

-- 2 read committed(搜尋資料會根據外界commit一起變動)
update Product set n = 20 where pid = 1;

set transaction isolation level read committed; -- set 交易 isolation level ~
start TRANSACTION;
select n as R1 from Product;
do sleep(10);
select n as R2 from Product;
commit;

-- 3 read uncommitted(未卜先知，但dirty read讀到的資料可能是rollback的)
-- 訂房給考慮時間5分鐘：數量少，不會急，很多人要房間
-- 演唱會不能用，因為可以rollback很多票派不出去
update Product set n = 20 where pid = 1;
-- set 交易 isolation level ~
set transaction isolation level read UNCOMMITTED; 
start TRANSACTION;
select n as R1 from Product;
do sleep(10);
select n as R2 from Product;
do sleep(10);
select n as R3 from Product;
commit;

-- *4 serializable(交易絕對不會被干擾，其他人外面等，效能極耗)
-- 等於是卡了一堆x鎖，沒事不要用
update Product set n = 20 where pid = 1;

set transaction isolation level serializable; -- set 交易 isolation level ~
start TRANSACTION;
select n as R1 from Product;
do sleep(10);
select n as R2 from Product;
do sleep(10);
select n as R3 from Product;
commit;

-- deadlock：出現時機，兩個未解s（查看出現未解s原因）都接續執行x -- 不要lock in share mode就好
資料庫會強制以失敗收藏，只有一個成功。

原因：同時多人用store procedure, 所以一開始用x防止s鎖能多人進入交易, deadlock不能避免，工程師只是讓機率小一點
1. 自己在檢查上s（系統上的會自動解鎖）
2. 自己在隔離機制檢查上serializable
直到commit才unlock。
後端攔截deadlock訊息，random一個delay時間retry transaction。

update Product set n = 0 where pid = 1;
start transaction;
    select * from Product where pid = 1 lock in share mode; -- T1的S1(相當於serialixable)
    do sleep(10);

    update Product set n = 20 where pid = 1;
    do sleep(10);
    commit;
select n as 'final' from Product where pid = 1;

-- 題目：查詢 > 判斷 > 修改

buy2查詢去掉手動上鎖
改隔離機制成serializable
create procedure buy2()
begin 
    declare amount int;

    set transaction isolation level serializable;
    start transaction;
    select n into amount from Product where pid = 1; --上s鎖(serializable)要commit or rollback才能解
    -- do sleep(5);

    if amount > 0 then
        select '買走一個';
        update Product set n = n - 1 where pid = 1; -- 上x鎖，使T1, T2形成deadlock
        commit;
    else
        select '賣完了';
        commit;
    end if;
end $$
delimiter;

-- 資料庫執行管理員測試：query

update Product set n = 0 where pid = 1;
start transaction;
    select * from Product where pid = 1 lock in share mode;
    do sleep(10);

    update Product set n = 20 where pid = 1;
    do sleep(10);
    commit;
select n as 'final' from Product where pid = 1;

-- 鎖時間default is the best除非你知道自己在幹嘛

-- mysql鎖時間是控制update指令時間
-- mongodb是控制x locker時間
-- sql server控制不了