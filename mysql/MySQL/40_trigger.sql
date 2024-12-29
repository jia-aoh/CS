兩面刃：
可一路觸發(o)
異動狀況從sqlcommand看不出來(x)
檢查trigger - 新人處理（要有文件）

資料庫前面有一台專門做log的硬體機器;

看er, trigger

注意不要遞迴（直接、間接），解決：資料庫停機

/* 下一個table資料，另一個自動下*/
drop trigger if exists userinfo_insert;
delimiter $$ -- 頭：直到看到$$, &&, !!才執行，不要;就執行

create trigger userinfo_insert after insert -- 名字＋sql commend [after, before][insert, update, delete]
on UserInfo for each row -- 每插入一筆執行begin, end一次

begin -- mysql程式語言
    set @uid = new.uid; -- @變數 = new是資料表
    set @cname = ifnull(new.cname, 'NULL');
    set @body = concat('在UserInfo插入一筆資料：',@uid,', ',@cname,''); -- ',變數,'
    -- concat 只要有一個變數是null就會是null, 所以要先設定body不能null
    -- 或做條件判斷ifnull
    insert into Log(body) values (@body);
end $$
delimeter ; --結尾

/*
insert into UserInfo (uid, cname) values ('B01', '朱小弟');
select * from UserInfo;
select * from Log;

UPDATE UserInfo
SET name = '新的名字'
WHERE uid = 'B02';
*/

update (先刪除再新增)
delete 
new 要修改的
old 被修改的,刪除的

-- 更新 --------
drop trigger if exists userinfo_update;
delimeter $$
create trigger userinfo_update after update 
on UserInfo for each row 
begin
    set @uid = new.uid;
    set @cname = new.cname;
    set @olduid = old.uid;
    set @oldcname = old.cname;
    set @body = concat('在UserInfo用'@uid, @cname, '替換' @olduid, @oldcname);
    insert into Log(body) values (@body);
end $$
delimeter;

-- 刪除
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

/* 阻擋不符合預期的sqlcommand */
-- @session等級變數
/* 偵測修改欄位 */
drop trigger if exists userinfo_update2;
delimiter $$
create trigger userinfo_update2 before update
on UserInfo for each row 
begin 
    if @n is null then -- 沒有給值一定是null
        set @n = 1;
    else 
        set @n = @n + 1;
    end if;
    if @n > 1 and (not new.password <=> old.password) then -- 增加偵測條件：<=>前後不等，前null，後null (spaceship)
        signal sqlstate '45000' set message_text = '不可更新兩筆以上password資料'; -- 如果一次兩筆資料以上，丟錯誤出來，mysql建議自訂error編號45000以上
    end if;
end $$
delimeter;

trigger在觸發器

a改b,b改c,c改a就會一直巡迴跑，硬碟高頻率讀寫，損毀bit就報銷
資料庫：查cpu loading
解決辦法：資料庫停機

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