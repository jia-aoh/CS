/* 極端值查詢：會有同分 */

-- 各電話費用
select tel, sum(fee) as sum_fee
from Bill
group by tel;

-- 排序
select tel, sum(fee) as sum_fee
from Bill
group by tel
order by sum_fee desc -- 逆向排序
limit 1; -- 只取第一筆

/* 選擇費用最低的 */
select *
FROM (
    select tel, sum(fee) as sum_fee
    from Bill
    group by tel
) as tmp
WHERE sum_fee = (
    select sum(fee) as sum_fee
    from Bill
    group by tel
    order by sum_fee
    limit 1
) ;
-- 誰有最多房
select *
from (
select cname, count(Live.hid) as livehid_count
    from UserInfo left join Live
        on UserInfo.uid = Live.uid
    group by cname
) as tmp
where livehid_count = (
select count(Live.hid)
from UserInfo left join Live
    on UserInfo.uid = Live.uid
    group by cname
    order by count(Live.hid) desc
    limit 1
);

--最大值
select cname, count(Live.hid)
from UserInfo left join Live
    on UserInfo.uid = Live.uid
    group by cname
    order by count(Live.hid) desc
    limit 1;

-- 老師

-- 結構
-- 包裝指令，唯讀無法改資料表
-- 檢視表>結構>編輯檢視表
-- 執行view省語法檢查時間
create view vw_richman as -- 包裝有錢人查詢指令
select * 
from (
    select uid, count(hid) as n
    from Live
    group by uid
) as tmp 
where n = (
    select count(hid) as n
    from Live
    group by uid
    order by n desc 
    limit 1
);

/* 後端工程師用 */
select * from vw_richman -- 叫指令


-- 總
select uid, count(hid) as n
from Live
group by uid;

-- join 水平合併
-- union all 垂直合併('救命用：與distinct')
-- 資料型態要一致
select uid, cname 
from UserInfo
union all 
select 'B01','陳小弟'
union -- 沒all重複就不併了
select 'B01','陳小弟'

-- 重複的只留一個: distinct(救命用：知道不會重複的出現了，先用distinct，原因1.沒設pk，原因2.打錯)
select distinct left(cname, 1) as lastname
from UserInfo
where cname <> ''; -- 排除無名者








    