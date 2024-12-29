-- 看鎖
-- mysql要有人想上所但上不去

select * from information_schema.innodb_locks;
select * from information_schema.innodb_lock_waits;