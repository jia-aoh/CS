/* mySQL 
select now(4); -- 今天(微秒精度)
select utc_timestamp()
select unix_timestamp() epoch time
select from_unixtime(11碼數字) epoch time轉人看得懂的

*/

/* 加減
select adddate(now(), -5); -- 減5天
select adddate(now(), interval 3 hour); -- 小時加單位參數
select datediff(now(), '2024/1/1'); -- 兩個時間差(單位：天)
select abs(timestampdiff(hour, now(), '2024/1/1')); -- 兩個時間差(單位：小時)(有加絕對值)
select timestampdiff(hour, '2024/1/1', now()); -- 兩個時間差(單位：小時)
*/

/* function 
select year(now()); -- 年月日時分秒都有
select microsecend(now(6)); -- 微秒
select quarter(now()); -- 季(季報表好用)
select week(now()); -- 週
select weekday(now()); -- 禮拜
*/

/* 生日 
select cname, ceil(datediff(now(),birthday) / 365.25) as age
from UserInfo
where birthday is not null

*/

/* 格式化輸出 */
select date_format(now(), '西元%Y年'); --date_formate()輸出一律string型態

-- 加一筆帳單
-- insert into Bill values ('3333', 1000, now(), 3);
select *, fee from Bill;
/*
-- 2019年每季帳單金額總和
select year(dd) as '年度', quarter(dd) as '季度', sum(fee) as '費用'
from Bill
-- where year(dd) = 2019 -- 先選了2019再group(快) -- 等號左邊有函數不吃index，會線性搜尋
where dd between '2019/1/1' and '2019/12/31 23:59:59.999' -- 先選了2019再group(快) -- 等號左邊有函數不吃index，會線性搜尋
group by year(dd), quarter(dd); -- 群組運算是把資料抓到記憶體算，可能記憶體不足
-- having year(dd) = 2019; -- (慢)

-- 高級：union all用在缺項補0
select q, sum(sum_fee) as sum_fee
from(
    select quarter(dd) as q, sum(fee) as sum_fee from Bill 
 -- where dd between '2019/1/1' and '2019/12/31 23:59:59.999' 
    where dd >= '2024/1/1' and dd < '2025/1/1'
    group by quarter(dd)
    union all select 1, 0
    union all select 2, 0
    union all select 3, 0
    union all select 4, 0
) as tmp 
group by q
*/

/* 上下半年

select halfyear, sum(sum_fee) as sum_fee
from(
    select floor(month(dd) / 7.0) as halfyear, sum(fee) as sum_fee from Bill 
    where dd >= '2019/1/1' and dd < '2020/1/1'
    group by quarter(dd)
    union all select 0, 0
    union all select 1, 0

) as tmp 
group by halfyear
*/

/* 時間格式：資料庫默認utc */
-- insert into Bill values ('3333', 2000, '2024/5/1 20:5:3', 3)
