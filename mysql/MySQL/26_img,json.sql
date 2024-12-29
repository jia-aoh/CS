/* 圖片格式大小：手機拍2MG多

tinyblob: 256 byte
blob: 65k
mediumblob: 16M
longblob: 4G

*/

/* insert into 圖片

權限路徑：
phpmyadmin 放 /Applications/XAMPP/xamppfiles/phpmyadmin/圖片
azure data studio 放/tmp/圖片

insert into HeadPhoto values ('A01', load_file('/tmp/icon.png'))

DBeaver可以直接看到圖
-- src表頭mp3(256)轉base64就可以入json(字串格式)，通常幾k才會轉
*/

-- select concat('abc', 'def');
-- select concat('/tmp/', uuid(), '.jpeg') from HeadPhoto where uid = 'A01';
/*
select photo into dumpfile concat('/tmp/', uuid(), '.png')
from HeadPhoto where uid = 'A01'
*/
/*
改最多可上傳16M
cd /Applications/XAMPP/etc
sudo pico my.cnf
max_allowed_packet = 16M
修改完按ctrl+X離開

mysql /var/mysql/mysql.sock
*/

/* 輸出結果改json字串 
select json_object(
    'uid, 'uid, 
    'cname', cname
)
from UserInfo
*/

/* 把資料變成json array */
-- 1_ group_concat()垂直方向跨欄位合併
-- 2_ concat()單一欄位為合併
-- 3_ json格式輸出不要留有null

drop view if exists vw_json_userinfo; -- 刪除vw
create view vw_json_userinfo as -- 包裝給後端

select concat('[', group_concat(json_object(
    'uid', uid, 
    'cname', ifnull(cname,'') -- 前端就不需要判斷null，後端就沒事幹
)),']') as json
from UserInfo


-- select * from vw_json_userinfo 給後端呼叫
