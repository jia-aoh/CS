/* create table：設pk, varchar長度
-- 備份：近五年
create table 2024UserInfo select * from UserInfo;
*/

/* insert
insert into UserInfo values(
    'B01','David', null, null
);

insert into UserInfo(uid, cname)values(
    'B02','Tom'
);

-- 資料有兩筆一模一樣的紀錄就完了
insert into 2024UserInfo select * from UserInfo;

-- 自動編號的欄位不要動
-- e.g. house的hid
insert into House (address) values ('高雄市');
-- 改了流水號
insert into House (hid, address) values (20,'屏東市');
*/
/* update
update House set hid = 5 where hid = 25;
*/

/* delete：資料表還在內容不見(會維護索引，可能可以後悔)
格式：delete from 資料表 where 條件
基本條件：資料要可以null

delete from House where hid = 21;
select * from House;
*/

-- truncate table x 瞬間刪所有資料表資料(不維護索引，不能後悔)


