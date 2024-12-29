/* SQL command -----------------------------------------------

-- 資料庫工程師：公文、會計系統


create view vw_vwname as select...：查詢封裝給後端 or 外包商
select * from vw_vwname -- 使用查詢封裝

select 顯示結果： *, count(*), ifnull('搜尋欄位','取代字串'), sum(), avg, count, min, max..., (Nesting)
case 
    when sum(fee) >= 1500 then 500
    else 0
end as x


from 資料庫：
***WARNIMG***
只能一圈

-- 左種類多餘右
x left join y on x.xx = y.yy
  left join z on y.xx = z.zz

-- (Nesting) as x

where 搜尋條件：

-- 空字串：or x is null(必填)
-- 模糊查詢：x like '%毛%' -- 由一台專門處理模糊查詢(效率問題)
-- n = (Nesting)

-- 和、或、包含、不含：and, or, in ('x','y'), not in ('x','y')

group by 群組：select count()以外的都要group
x, y

having 搜尋條件：放在group by後的 where


order by 排序：x, x desc, convert(x using big5) 
-- 正向、逆向排序、中文筆畫定序

limit 1：只選最上筆資料

*/

-- 救命 -------------------------------------------------
-- union all 垂直合併：資料型態需一致
-- 時機：應出現資料沒出現時
select uid, cname 
from UserInfo
union all 
select 'B01','陳小弟'
union -- 沒all重複就不併了
select 'B01','陳小弟'

-- distinct 重複的只留一個
-- 時機：不會重複的重複了，先用distinct，原因1.沒設pk。原因2.code錯。
select distinct left(cname, 1) as lastname
from UserInfo
where cname <> ''; -- 排除無名者


/* 型態決定功能 --------------------------------------------

1. null
where x is null | 系統忽略 
* 注意：設計json時，將null輸入為''，使DB能解析成null，再select ifnull(x,'')給後端

2. int
比較：where fee >= 1 and fee<=5, fee < 400 or fee > 700, fee <> 500
範圍：where fee between 1 and 5, fee not between 400 and 700
運算：select fee * 0.9

3. string
-- 含''
  where x is null or x = ''

  where uid (not) in ('A01','A02')
= where uid = 'A01' or uid = 'A02'

-- 取x欄第一個字
left(x,1)

4. date, time


*/

