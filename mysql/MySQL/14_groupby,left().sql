
/* 群組運算 sum(), avg(), max(), min(), count()
select僅一個群組運算，其他必group by

e.g.
select x, y, count(z)
...
group by x, y
*/

select tel, sum(fee), avg(fee), max(fee), min(fee), count(fee)
from Bill
group by tel;

select count(null);

-- 每個人有幾間房子
select UserInfo.uid, count(Live.uid)
from UserInfo left join Live
    on UserInfo.uid = Live.uid
group by UserInfo.uid;

-- 每間房子住了幾個人
select address, count(uid)
from House left join Live
    on House.hid = Live.hid
group by address;

-- 每個人幾間房(語法：群組運算，一個select只能有一個群組運算函數，其他都要在group by，否則mySQL以外語法錯誤)
select UserInfo.uid, cname, count(Live.uid)
from UserInfo left join Live
    on UserInfo.uid = Live.uid
group by UserInfo.uid, cname;


/* 別名 */

-- 1_ 格式：as '中文', as abc
-- 2_ 位置：select, 資料表
select a.uid as '帳號', cname as '姓名', count(b.uid) as n
from UserInfo as a left join Live as b
    on a.uid = b.uid
group by a.uid, cname;


/* 微軟當家函數 */

-- 拿左邊一個字: left(x,int)
select left(cname, 1) as lastname
from UserInfo
where cname <> ''; -- 排除無名者

-- 重複的只留一個: distinct(救命用：知道不會重複的出現了，先用distinct，原因1.沒設pk，原因2.打錯)
select distinct left(cname, 1) as lastname
from UserInfo
where cname <> ''; -- 排除無名者


/* 巢狀、子查詢: sub-querying */
-- 一定從from()內部查到外面

-- 每個姓有幾個

select lastname, count(lastname)
from (
    select left(cname, 1) as lastname
    from UserInfo
    where cname <> '' -- 排除無名者
) as L
group by lastname;


-- 空屋率
select (
    select count(*)
    from (
        select address, count(uid) as n
        from House left join Live
           on House.hid = Live.hid
        group by address
    ) as H
where n = 0
) / count(*) as '空屋率'
from House;

/* 總架構：
select () as '標題'
from (

) as x
where n = ( -- n在前面已有定義

)

*/