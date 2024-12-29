/* 調整資料庫結構 */

/* fk - 自動生成ER
原因：防join兩邊都多出資料
手動：結構＞關聯檢視>live的uid參考userinfo的uid，只有userinfo

-- fk option
cascade(串接刪除)：同步刪，update
set null：折衷(在pk欄位則無效)
restrict, no action：刪完子節點才能刪

-- ER:
步驟：建fk > 到設計器 or DBeaver

**error:constraint限制foreign key參考鍵 */

/* 
P.S.

-- pk更換
ALTER TABLE `UserInfo`
DROP PRIMARY KEY,
ADD PRIMARY KEY(`uid`);

-- 新增多欄pk
ALTER TABLE `Live` ADD PRIMARY KEY(`uid`, `hid`);

-- 新增fk(Live.uid參考UserInfo.uid)
ALTER TABLE `Live` ADD FOREIGN KEY (`uid`) REFERENCES `UserInfo`(`uid`) ON DELETE RESTRICT ON UPDATE RESTRICT;

-- 寫入value
INSERT INTO `Live` (`uid`, `hid`) VALUES ('A01', '1');
*/