-- cursor 一定帶迴圈跑每一筆資料
密碼 = uid + birthday(月天)

update UserInfo
set password = password(concat(uid, date_format(birthday,'%m%d')))

select uid, date_format(birthday,'%m%d')
from UserInfo
where uid = 'A01'

-- cursor: 最後武器：但慢，一個sqlcommand處理不掉的問題。處理不了就gg，eg地址
-- 密碼用birthday
drop procedure if exists reset_password;
delimiter $$
create procedure reset_password()
begin 
    declare eof bool default false; -- end of file 旗標變數，
    declare myuid varchar(20);
    declare mybirthday datetime;
    declare c cursor for select uid, birthday from UserInfo; -- 宣告一個cursor與需要參照的欄位
    declare continue handler for not found set eof = true; -- handler: 宣告fetch找不到，用於錯誤攔截，欄截到繼續close，沒資料時eof改為true
    -- 順序：eof > cursor > handler

    open c; -- 開cursor
    fetch c into myuid, mybirthday; -- 會把declare查詢的'第一筆'資料放到cursor
    while (! eof) do -- 偵測沒有東西可以fetch（欄截錯誤攔截）
        update UserInfo 
        set password = date_format(mybirthday,'%m%d') 
        where uid = myuid;

        fetch c into myuid, mybirthday; -- 每個while fetch一次，最後一筆not found把eof改為true，continue
    end while;

    close c; -- 關：因為非常耗記憶體資源，一定要關！
end $$
delimiter;

-- 老師：密碼用hid+birth來hash
drop PROCEDURE if EXISTS reset_password;
DELIMITER $$
create PROCEDURE reset_password()
BEGIN
	declare EOF bool default false;
	declare myuid varchar(20);
    declare mybirthday datetime;
	declare c cursor for select uid, birthday from UserInfo;
    declare continue handler for not found set EOF = true;
    
    open c;
    fetch c into myuid, mybirthday;
    while (! EOF) do
    	update UserInfo 
        set password = password(concat(myuid, date_format(mybirthday, '%m%d')))
        where uid = myuid;
        
    	fetch c into myuid, mybirthday;
    end while;
    
    close c;
   
end $$
DELIMITER ;

call reset_password();
select * from UserInfo;

後端cursor也是接迴圈，一次只處理一筆資料。

-- 把台變臺
drop procedure if exists upper_tai;
delimiter $$
create procedure upper_tai()
begin 
    declare eof bool default false;
    declare myaddress varchar(200);
    declare c cursor for select address from House;
    declare continue handler for not found set eof = true;

    open c;
    fetch c into myaddress;
    while (! eof) do 
        update House
        set address = replace(myaddress,'台','臺')
        where address = myaddress;

        fetch c into myaddress;
    end while;

    close c;

end $$
delimiter;
