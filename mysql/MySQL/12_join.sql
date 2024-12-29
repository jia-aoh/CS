-- 關聯(join) ----------------------------------------------------
/* 規劃好、left join是王道 */

-- Q1: 王大明的電話
/* 0_ 不乾淨語法：join放在where */

select tel -- 想要得到的
FROM UserInfo, Live, House, Phone -- 查詢軌跡
WHERE 

 -- join合併關聯資料
  UserInfo.uid = Live.uid
  and Live.hid = House.hid
  and House.hid = Phone.hid

  and cname = '王大明'; -- 查詢條件

/* 1_ InnerJoin：merge等號兩端欄一致的，砍掉資料不等 */

select UserInfo.uid, cname, tel
from UserInfo inner join Live
       on UserInfo.uid = Live.uid
     inner join Phone
       on Live.hid = Phone.hid -- inner join因值一致，可以三一律，精簡House
where UserInfo.uid = 'A04';
-- *error: ambiguous(條件模糊：可能有2欄以上有uid)


-- 思考：切到多細

/* 2_ left (outer) join：左側外部連結，左邊資料種類較多
      right (outer) join：右側外部連結，右邊資料種類較多 */

select UserInfo.uid, ifnull(Live.uid,'沒有地方住'), cname
from UserInfo left join Live
       on UserInfo.uid = Live.uid
where UserInfo.uid = 'A04';

-- 學籍成績 ifnull(x,'成績未送達')


-- 3_ 按查詢軌跡A04住址電話不同於A07結果 

select UserInfo.uid, cname, address, tel
from UserInfo left join Live
       on UserInfo.uid = Live.uid
       left join Phone
       on Live.hid = Phone.hid
       left join House
       on Live.hid = House.hid
where UserInfo.uid = 'A04';

-- 4_ 混合技

select *
from House join Phone
  on House.hid = Phone.hid
right join Live
  on House.hid = Live.hid
right join UserInfo
  on UserInfo.uid = Live.uid
where UserInfo.uid = 'A04';

-- 5_ cross join：所有都會配一遍
/*定義：from後面資料兩圈以上，又where沒下條件*/

select UserInfo.uid, Live.uid
from UserInfo, Live;

-- full join: SQL server 資料庫資料有錯才有這種狀況
