-- 1.寫入json ---------------------------------
/*
db.collection.insertMany(json)

*/
-- 2.搜索 -------------------------------------
/*
db.collection.find()
  find({}) = select *
  find({"key","value"}) = 得包住自己的所有key, value
  find({"key":{$lt:value}}) &lt = less than

*/
-- 3.刪除 -------------------------------------
/*
db.collection.deleteOne()


*/