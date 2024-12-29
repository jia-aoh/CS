
drop procedure if exists test;
delimiter $$
create procedure test()
begin 

end $$
delimiter;

-- 透過參數傳回值

drop procedure if exists test;
delimiter $$
create procedure test(a int, inout b int) -- (in)只能由外面傳進來被鎖為const不能改常數內容, out只能把值傳出去, inout可進可出
begin 
    set a = a + 1; -- a(in)是複製品，動到不影響原a
    set b = a; -- b(out) call by reference 動到就改了（相當於global?）
end $$
delimiter;

-- in = call by value
-- inout = call by reference

-- 顯示(給後端)
call test(5, @n);
select @n as n; -- 後端程式碼抓n就可以拿到6

-- while loop

drop procedure if exists lloop;
delimiter $$
create procedure lloop(a int, inout b int)
begin 
    declare i int default 1;
    declare ssum int default 0;

    while i <= a do 
        set ssum = ssum + i;
        set i = i + 1;
    end while;
    set b = ssum;
end $$
delimiter;

call lloop(10, @n);

--

drop procedure if exists lloop;
delimiter $$
create procedure lloop(a int, inout b int)
begin 
    declare i int default 1;
    declare ssum int default 0;

    x: while i <= a do 
        set ssum = ssum + i;
        if i = 5 then
        set i = i + 5; 
        leave x; -- leave=breake, iterate=continue都要給while名字
    end while;
    set b = ssum;
end $$
delimiter;

--

drop procedure if exists lloop2;
delimiter $$
create procedure lloop2(a int, inout b int)
begin 
    declare i int default 1;
    declare ssum int default 0;

    x: while i <= a do 
        set ssum = ssum + i;
        if i = 5 then
            set i = i + 1; 
            iterate x; -- leave=breake, iterate=continue都要給while名字
        end if;
        set i = i + 1;
    end while;
    set b = ssum;
end $$
delimiter;

call lloop2(10, @n);

-- function(幾乎不用)

drop function if exists func;
delimiter $$
create function func(a int) returns int
begin 
    declare i int default 1;
    declare ssum int default 0;

    while i <= a do 
        set ssum = ssum + i;
        set i = i + 1;
    end while;
    return ssum;
end $$
delimiter;

function呼叫要用select

select func(10);

--

while 條件判斷 do 

end while;