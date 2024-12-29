-- 第二筆上傳

update UserInfo set password = null 
where uid = 'A01';

-- 直到第一筆rollback或commit就會執行
s
select * from UserInfo where uid = 'A01'
-- 照理來說mysql: s, x不能共存
-- 但mysql查詢不上s鎖，增加效率，但可能是看到舊資料

-- 由於第一筆是查詢s鎖，查到就會解鎖，所以可以馬上看到
x
update UserInfo set password = null 
where uid = 'A01';
select 'done'

-- 超賣
call buy();
select * from Product;

-- 超賣通用解法
call buy1();
select * from Product;

-- mysql強制上鎖 (where 後 lock in share mode)
select * 
from UserInfo 
where uid = 'A01'
for update -- 強制上x鎖(也可以用於查詢，占資源)
lock in share mode -- 手動強制上s鎖但卡住，無法查看，等前一筆交易結束，或留給mysql timeout

-- 3.強制上鎖解法
call buy2();
select * from Product;

-- 隔離repeatable read
update Product set n = 40 where pid = 1;
select n from Product where pid = 1;

start transaction;
update Product set n = 40 where pid = 1; --先卡訂房位子
do sleep(10); -- 5分鐘給訂房考慮時間
rollback;
select n from Product where pid = 1;

-- deadlock

start transaction;
    select * from Product where pid = 1 lock in share mode; -- T2的S1
    do sleep(10);

    update Product set n = 40 where pid = 1;
    do sleep(10);
    commit;
select n as 'final' from Product where pid = 1; -- 查詢不出來，資料庫判定失敗收藏。

-- 資料庫監控管理員dba
查耗資源
or trigger如果太長，判斷是不是形成loop，先kill，去查

show processlist; -- 資料庫監控管理員
kill 2634; -- 殺掉process id

