交易異動衣料：資料課可以後悔，一次是整體，沒有部分成功或失敗

delete from UserInfo where uid = 'E01';

啟動交易: start transaction;
異動資料: delete, insert, update
確認交易: (auto) commit;, rollback; -- 寫commit function確認

-- 拆

start transaction;
delete from UserInfo where uid = 'E01';
delete from Live;
rollback;
commit;

transaction
eg. 提款
atm要超過3000 >
戶頭有3000 >
網路可否 >
前離開出鈔口 > 
能否執行log(沒領到扣錢：國泰)

/* 不同server機制

-- mysql start 跟 commit可以分開操做，所以交易時間越短越好
-- 不會卡，但拿到的資料可能是就資料（有錯的風險），但可以改成sql server一樣正確

-- sql server會卡住5秒查不到資料
-- transaction 一次只能有一個人執行，一人5秒，萬人...，但可以靠程式改跟mysql一樣不卡

*/

思考：演唱會超賣

start transaction;
update UserInfo 
set password = NULL
where uid = 'A01'

-- commit;