/* 1.使用者登入：---------------------------

select count(*)
from UserInfo
where uid = 'A01' and password = '12345'

-- 結果：1 ? 密碼正確：密碼錯誤
*/

/* 2.計算虛歲生日：-----------------------------

select name, ceil(datediff(now(),birthday) / 365.25) as age
from UserInfo
where birthday is not null

*/

/* 3. 年度季報(缺項補0)：------------------------

select q, sum(sum_fee) as sum_fee
from(
    select quarter(dd) as q, sum(fee) as sum_fee from Bill 
    where dd >= '2024/1/1' and dd < '2025/1/1'
    group by quarter(dd)
    union all select 1, 0
    union all select 2, 0
    union all select 3, 0
    union all select 4, 0
) as tmp 
group by q
*/

/* 4. 上下半年：----------------------------------------------------
思路：上下半年以0,1代替

select halfyear, sum(sum_fee) as sum_fee
from(
    select floor(month(dd) / 7.0) as halfyear, sum(fee) as sum_fee from Bill -- 注意/7會是整數還是小數
    where dd >= '2019/1/1' and dd < '2020/1/1'
    group by quarter(dd)
    union all select 0, 0
    union all select 1, 0

) as tmp 
group by halfyear
*/

/* 5. 會員註冊：----------------------------------------------------
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
call register('C01', '1234', 'David')
*/

/* 6. 登入帳號 ----------------------------------------------------
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

call loginCheck('A01','1234');
*/

/* 7. update前檢查 ----------------------------------------------------
drop trigger if exists oldtrigger_name;
delimiter $$
create trigger newtrigger_name before update
on table_name for each row 
begin 
    if @n is null then
        set @n = 1;
    else 
        set @n = @n + 1;
    end if;
    if @n > 1 and (not new.password <=> old.password) then 
        signal sqlstate '45000' set message_text = '不可更新兩筆以上password資料'; 
    end if;
end $$
delimeter;
*/

/* 8. 增加刪除歷程到log ----------------------------------------------------
drop trigger if exists userinfo_delete;
delimeter $$
create trigger userinfo_delete after delete 
on UserInfo for each row 
begin
    set @uid = old.uid;
    set @body = concat('在UserInfo刪除一筆資料：',@uid);
    insert into Log(body) values (@body);
end $$
delimeter;
drop trigger if exists userinfo_insert;
delimiter $$ 
create trigger userinfo_insert after insert
on UserInfo for each row
begin
    set @uid = new.uid;
    set @cname = ifnull(new.cname, 'NULL');
    set @body = concat('在UserInfo插入一筆資料：',@uid,', ',@cname,'');
    insert into Log(body) values (@body);
end $$
delimeter;
*/