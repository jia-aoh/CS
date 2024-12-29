local, 網路速度都要考慮
1. 叢集：完整whole

mysql的pk
sql server可以改



2. 二級：只其中1 coll

查詢程序，越多越慢：
select * -- 通常查找兩處
where 條件 > secondary(值，叢集位置) > 叢集
sql server：一個node可以包含其他欄位

二級索引unique複合存在同個node?

雲端預算：硬體、流量(select不要帶太多)

3. 表掃描：
table scan線性搜尋

explain sql server工具可以看到很清楚的performance有沒有吃到index...

type: 
1. 等號兩端設索引
2. 複合pk第二欄位不吃索引

system, 
const, 
er_ref, 
ref, 
ref_or_null, 
index_merge, 
range, -- like '王%'
index索引掃描,
ALL線性: 沒where, 沒index, like '%', 等號左邊func: left(cname, 1)='', ifnull(cname, '')=''

performance tuning: is null vs is not null 會跟計資料null數量需不需要索引

------------------------------------------------------------------
explain 
select * 
from UserInfo, Live, House
where UserInfo.uid = Live.uid and Live.hid = House.hid
and address = '臺中市大里區'

and UserInfo.uid = 'A01'



where cname is null -- 資料庫評估計畫：內部判斷用哪個索引or不吃索引(資料太少)
-- where cname like '王%'
-- where left(cname, 1) = '王' -- 等號左邊func
----------------------------------------------------------------
drop procedure if exists inject_user;
delimiter $$
create procedure inject_user()
begin 
    declare n int default 1;

    while n <= 100000 do

        insert into UserInfo (uid, cname) values (concat('Z', n), concat('Tom', n) );
        set n = n + 1;
    end while;
end $$
delimiter;

call inject_house();

drop procedure if exists inject_house;
delimiter $$
create procedure inject_user()
begin 
    declare n int default 6;

    while n <= 5000 do

        insert into House (hid, address) values (concat(n), concat('台中', n, '號') );
        set n = n + 1;
    end while;
end $$
delimiter;


drop procedure if exists inject_live;
delimiter $$
create procedure inject_live()
begin 
    declare n int default 10000;

    while n <= 20000 do

        insert into Live (uid, hid) values (concat('Z',n), 4000);
        set n = n + 1;
    end while;
end $$
delimiter;

-- 時間

explain
select * 
from Bill 
where dd between '2024/1/1' and '2024/12/31 23:59:59.999' -- 時間一律用between and, 或><
where year(dd) = 2024 -- 等號左邊func所以type all

-- 群組運算，相當於select * group by，一定index，有沒有設索引都沒差

EXPLAIN
select tel, sum(fee)
from Bill
group by tel -- 所有電話做群組運算所以一定index，有沒有設索引都沒差

-- 指定索引 use index()

EXPLAIN
select *
from Bill
use index(tel_2)
-- use index() -- 不用索引
where tel = '1111'

-- 複合: 不用重複設索引
-- 編輯複合欄位主要索引：mysql可以
EXPLAIN
select *
from UserInfo
where uid = ''



-- order

EXPLAIN
select *
from UserInfo
where uid like 'A%' -- 限制範圍避免形成type all: table scan
order by birthday -- using filesort代表不吃索引（因為排序與索引排序不同）
1. 使排序在索引內
2. 此例子無法直接將birthday索引排序

-- 排序：考慮常用複合欄位查詢，順向還是逆向
mysql要下指令，但還是會變順向
create index index_uid
on UserInfo (uid desc)

別家：單一欄位索引順逆向都行，複合欄位符合以下吃到索引
/*
uid(+), cname(+), birthday(+)
uid(+), cname(+)
uid(+)
uid(-)
uid(-), cname(-)
uid(-), cname(-), birthday(-)
單獨cname也不行
*/

EXPLAIN
select *
from UserInfo
where uid like 'A%'
order by uid, cname desc -- 吃不到

考慮頻率
-- 索引 vs 改資料效能(刪除 > 新增 > 更新 > truncate)-索引每一筆資料異動，就全調

最佳化索引(重建) - tree平衡
mongodb說不用最佳化
mysql重建 - 離峰時間（一兩年一次就可，停止服務半天一天）
optimize table my_table
alter table my_table engine=InnoDB
sql server有報表，索引破碎程度，根據數據做索引最佳化