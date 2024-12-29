Table seat {
  id smallint 
  floor_id tinyint
  row tinyint
  number tinyint
  type tinyint
}

table floor {
  id
  floor
  number varchar(2) null, 
}

table seattype {
  id tinyint
  type varchar(7)
}

table order {
  usr int
  seat smallint
  price tinyint
}

Table price {
  id tinyint [primary key]
  price smallint
}

Table usr {
  id int [primary key]
  name varchar(51)
  phone int [unique]
  email varchar(100) [unique]
  pwd varchar(64)
}


Ref: "seat"."id" - "order"."seat"

Ref: "usr"."id" < "order"."usr"

Ref: "price"."id" - "order"."price"

Ref: "seattype"."id" < "seat"."type"
台本國家音樂廳
okfloor2, 35, 36, 37, 38, 39 | 38, 39, 38, 39, 38 | 39, 38, 39, 38, 39 | 38, 39, 38, 39, 38 | 39, 38, 39, 0, 33 | 20, 39, 38, 39, 38 | 13-20~31, 16-19~36
okfloor3, 1A-10, 10, 10, 42, 41 | 42, 41, 34, 24, 28 | 32, VA-10, VB-10, 1B-30, 1C-18, 1D-18, 1E-22
okfloor4, 2A-8-10-12-12-40 | 41-42-33-36-35 | 36-49, 2B-36, 2C-18, 2D-18, 2E-10

ok1輪椅f2, 25-22,23,24,25,30,31,32,33 | 32-15,16,33,34,35,36
ok2輪椅陪同f2, 25-26,27,28,29 | 27-22,23,38,39 | 32-13,14,19,20,21,22 
ok3友善 f2,10-37,38 | 26-19,20 | 31-12,13
ok4有善陪同 f2,10-35,36 | 26-17,18 | 31-11,10
ok5前台工作 f2,17-38,39 | f2,30-21,22 | 1A,7-40,41 | 2A,8-18,19
ok6視線不良 f2,27-24~37 | 28-22~38 | 1A,1-9,10 | 2A,1-5~8 | 2-7~10 | 2E
ok(7)管風琴視線不良 f2,29-38,39 | 30-37,38 | 31-30,31
ok8大螢幕視線不良 f2,18,20-37,38 | 19-38,39 | 21,23-36~39 | 22-35~38 | 27-32~39 | 28,30-33~38 | 29-34~39 | 31-26~31 | 32-23~32
ok1A,6-35~42 | 7-34~41 | 8-29~34 | 9-19~24 | 10-19~28 | 11-17~32
ok9座位不適 1A,10-25~28 | 11-25~32
ok10

update seat_taipei set type = 1 where floor = 2 and row = 25 and number between 30 and 33

id INT,name int,location ti,date dt, banner int
id int, banner mb

功能：
1.註冊(中文名, 電話, email, pwd)
drop procedure if exists register;
delimiter ;;
create procedure register(myname varchar(51), myphone varchar(10), mymail varchar(100), mypwd varchar(64))
begin 
if myname regexp '[u0391-uFFE5]' then 
select '請輸入正確中文姓名' as error_message;
elseif myphone is null or myphone = '' then 
select '電話必填' as error_message;
elseif myphone not regexp '^[0-9]{10}$' then 
select '電話格式：0912345678' as error_message;
elseif mymail is null or mymail = '' then 
select 'email欄位為必填' as error_message;
elseif mypwd is null or mypwd = '' then 
select '密碼必填' as error_message;
else
insert into usr (name, phone, email, pwd) values (
  myname, 
  myphone, 
  mymail, 
  password(mypwd)
);
end if;
end ;;
delimiter;
2.密碼重設(email, transaction, 先改password(rand()*1234), 改commit, 沒改rollback)
3.活動查詢（關鍵字、日期、地點）-- 缺毋查詢結果
drop procedure if exists search_program;
delimiter ;;
create procedure search_program(myprogram varchar(30), myplace varchar(10))
begin 
if (myprogram is null or myprogram = '') and (myplace is null or myplace = '') then 
select '請選擇場館或輸入節目關鍵字' as error_message; 
elseif myprogram is null or myprogram = '' then
select program_name.name as '節目名稱', location_name.name as '地點', program.date as '時間'
from program left join program_name on program.name = program_name.id
left join location_name on program.location = location_name.id
where program.date > date(now()) and location_name.name = myplace;
elseif myplace is null or myplace = '' then
select program_name.name as '節目名稱', location_name.name as '地點', program.date as '時間'
from program left join program_name on program.name = program_name.id
left join location_name on program.location = location_name.id
where program.date > date(now()) and program_name.name like concat ('%',myprogram,'%');
else
select program_name.name as '節目名稱', location_name.name as '地點', program.date as '時間'
from program left join program_name on program.name = program_name.id
left join location_name on program.location = location_name.id
where program.date > date(now()) and location_name.name = myplace and program_name.name like concat ('%',myprogram,'%')
UNION ALL
SELECT '查無相關節目' as '節目名稱', '' as '地點', '' as '時間'
WHERE NOT EXISTS (
    SELECT 1
    FROM program 
    LEFT JOIN program_name ON program.name = program_name.id
    LEFT JOIN location_name ON program.location = location_name.id
    WHERE program.date > DATE(NOW()) 
          AND location_name.name = myplace 
          AND program_name.name LIKE CONCAT('%', myprogram, '%')
);
end if;
end ;;
delimiter;
4.訂票(usr, ticketid)
5.購票狀態（未您保留⋯⋯將釋出，父款狀態）

6.創活動(名字,地點,時間,海報)
drop procedure if exists add_program;
delimiter ;;
create procedure add_program(myname varchar(51), mylocation varchar(10) , mydate datetime, mybanner mediumblob)
begin
declare a int default null;
declare b tinyint default null;
declare c int default null;
select id into a from program_name where program_name.name = myname;
select id into b from location_name where location_name.name = mylocation;
insert into program_banner (banner) values (mybanner);
set c = last_insert_id();
if a is null then 
insert into program_name (name) values (myname);
set a = last_insert_id();
end if;
if b is null then 
insert into location_name (name) values (mylocation);
set b = last_insert_id();
end if;
insert into program (name, location, date, banner) values (
a, b, mydate, c
);
end ;;
delimiter;
7.設票價(節目myprogram int，價格，樓，區，排，號)


8.票房查詢(入活動名，得count)

8.資料庫異動狀態(1加用戶、2購票、3退票、4創活動、5重置密碼)
