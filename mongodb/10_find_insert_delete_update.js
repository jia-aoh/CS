const { MongoClient } = require("mongodb");

const uri =
  "mongodb+srv://dbUser:dbUserPassword@cluster0.4t5hw.mongodb.net/";
const client = new MongoClient(uri);
// client是uri cluster的連線
async function run() {
  try {

    // 建立連線
    await client.connect();

    // 數據庫名稱 db > coll
    const coll = client.db("sample_guides").collection("comets");

    // coll.insertMany(json) --------------------------------------------------------
    // const docs = [
    //   {name: "Halley's Comet", officialName: "1P/Halley", orbitalPeriod: 75, radius: 3.4175, mass: 2.2e14},
    //   {name: "Wild2", officialName: "81P/Wild", orbitalPeriod: 6.41, radius: 1.5534, mass: 2.3e13},
    //   {name: "Comet Hyakutake", officialName: "C/1996 B2", orbitalPeriod: 17000, radius: 0.77671, mass: 8.8e12}
    // ];
    // const result = await coll.insertMany(docs);
    // console.log(result.insertedIds);

    // coll.updateMany(filter, updateDoc) --------------------------------------------------------
    // const filter = {radius: { $gt: 0 }}; //只更新radius大於0的部分
    // const updateDoc = {
    //   $mul: { 
    //     radius: 1.60934
    //   }
    // };
    // const result = await coll.updateMany(filter, updateDoc);
    // console.log("Number of documents updated: " + result.modifiedCount);

    // coll.deleteMany(doc) --------------------------------------------------------
    const doc = {
      orbitalPeriod: {
        $gt: 5,
        $lt: 85
      }
    };
    const result = await coll.deleteMany(doc);
    console.log("Number of documents deleted: " + result.deletedCount);

    // coll.find({}) --------------------------------------------------------
    //  const cursor = coll.find({ 
    //   "surfaceTemperatureC.mean": { $lt: 15 },
    //   "surfaceTemperatureC.min": { $gt: -100 },
    // });
    // 判斷 － $gt:> | $lt:< | $gte:>= | $lte:<= | $eq:= | $ne:!=
    // 邏輯 － AND用, | $and:[{},{}] | $or[{},{}] -------------------

    // 印出查詢結果
    // await cursor.forEach(console.log);

  } finally {

    // 確保連線關閉
    await client.close();
  }
}
run().catch(console.dir);