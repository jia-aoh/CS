-- 用procedure插入資料

-- 不insert但log有錯誤訊息
drop procedure if exists insert_userinfo;
delimiter $$
create procedure insert_userinfo(myuid varchar(20))
BEGIN
    declare exit handler for sqlexception -- 可以指定處理哪種exception，
        insert into Log (body) values (concat('"', myuid, '"', ' PK has already exist.')); -- 因為分號exception就結束，所以多個就要用另一個store procedure包裝

    insert into UserInfo (uid) values (myuid);
    insert into Log(body) values (concat('insert ', myuid, ' into UserInfo.'));
end $$
delimiter;

call insert_userinfo('E01');
select * from UserInfo;
select * from Log;

hander: continue攔截到繼續, exit攔截到做set事情才結束