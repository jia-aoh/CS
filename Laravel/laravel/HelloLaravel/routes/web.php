<?php
// class名字不允許重複，宣告以下所有名稱在這之下
// 如果沒有命名空間，變數重複不會報錯，不知道城市運行的是哪一隻function
namespace App\Http\Controllers; // 方法二: 把現有檔案直接加入，因為route直接接controller頻率高。
// use App\Http\Controllers\HiController; // 方法一

use Illuminate\Support\Facades\Route;

// muddleware1要加
use App\Http\Middleware\MyCheck;

// 讓route與DB建立連線
use Illuminate\Support\Facades\DB;
// try catch要throwable
use Throwable;

// eloquent model資料表
use App\Models\UserInfo;
use App\Models\House;
use App\Models\Bill;
use App\Models\Phone;

//controller/request可以傳變數的功能
use Illuminate\Http\Request;

// 沒uid的話，預設為true，不要下where or where=true(默認看全部)
// Route::get('/query/{uid?}', function($uid=true){
//     // var_dump($uid);
//     $users = DB::select("select * from Userinfo where uid = ? or ?", [$uid, $uid]);
//     foreach($users as $user){
//         print("{$user->uid}({$user->cname})<br>");
//     };
// })->name('query');

Route::get('/querytest/{uid}', function($uid){
    $users = DB::select("select * from Userinfo where uid = ?", [filter_var($uid,FILTER_VALIDATE_BOOLEAN)]);
    foreach($users as $user){
        print("{$user->uid}({$user->cname})<br>");
    };
});

// 改、增刪原始碼一樣：正式系統一定要post表單
Route::get('/update/{uid}/{cname}', function($uid, $cname){
    DB::update("update Userinfo set cname = ? where uid = ?", [$cname, $uid]);
    return to_route('query');
});

// 純量值scalar不是select結構
Route::get('/getname/{uid}', function($uid){
    $cname = DB::scalar("select cname from Userinfo where uid = ?", [$uid]);
    print ($cname);
});

// transaction交易
Route::get('/transaction/{uid}/{cname}', function($uid, $cname){
    try{
        DB::transaction(function()use($uid, $cname){
            //begintrunsaction
            DB::update("update Userinfo set cname = ? where uid = ?", [$cname, $uid]);
            DB::insert("insert into UserInfo (uid) values ('A01')");
            //commit
        }); // 正常結束就交易，不正常結束就rollback

    }catch(Throwable $e){ //Throwable $e
        // rollback
        // abort(503);
    }
    return to_route('query');
});

// 表單
// Route::get('/form', function(){
//     return view('form');
// });

// 快速寫法
Route::view('/form','form');

// __invoke之外的function, Request自動會帶進來
Route::post('/form', [HiController::class, 'add'])
    ->middleware(MyCheck::class);

// -----------------------------------------------------
Route::get('/', function () {
    return view('welcome');
})->name('home');

/*
    {網址列參數(變數),?使用者可選}, function($name='預設值(搭配?)'){
    return view('resources > views'), print 字串{$變數}}
    ?: nullable, optional型態：能放null，需要就放如果型態指定，有null就抱錯
*/

Route::get('/hello/{name?}', function ($name='Guys') {
    print "<h1>Hello {$name}!<h1>";
});


// 呼叫別名home的路由
Route::get('/login', function () {
    return to_route('home');
});

// terminal
// 建view: php artisan make:view hi
// 連controller: namespace, function 放 controller, ivoke就是::class
Route::get('/hi/{name}', HiController::class);

//-----------------------------------------------------

// Query Builder: 效能比直接下sql慢一點，c#的linq也是
Route::get('/query1', function(){
    // $users = DB::select("select uid, cname from Userinfo where uid = 'A01');
    $users = DB::table('UserInfo')
        ->leftjoin('Live', 'UserInfo.uid','=','Live.uid')
        ->leftjoin('House', 'Live.hid','=','House.hid')
        // ->where('UserInfo.uid', 'A01') 
        ->select('UserInfo.uid','cname','address')
        // ->value('cname'); // 相當於DB::scalar純量值
        ->orderBy('UserInfo.uid', 'desc') // 預設asc
        ->get(); // query builder
        // ->dd(); // dd會印出sqlcommand, 不能接在value, get後
        // ->dump(); // 印出除錯訊息，與繼續執行以下程式
        
        print('<pre>');
        print_r($users);
        print('<pre>');

})->name('query');

//-----------------------------------------------------
// ELOQUENT: swift:quodata;java:hybernet;c#:...
// model名原則上跟資料表一樣
// use model
Route::get('/eloquent', function(){
    // $users = DB::select("select uid, cname from Userinfo where uid = 'A01');
    // $users = UserInfo::all();
    $users = UserInfo::where('uid', 'A01')->get();

    foreach($users as $user){
        print("$user->cname<br>");
    }
});

Route::get('/eloquent/insert', function(){
    // $user = new UserInfo('D01', 'Bob');
    // 變建構子model
    // $user->uid = 'D02';
    // $user->cname = 'DDavid';
    // $user->password = '1234';
    // (new UserInfo('D03', 'Betty'))->save(); //拿掉變數，直接變物件function
    return 'done';

});

// 加入request，剩form，在路由就處理掉
// 輸入http://localhost/HelloLaravel/public/eloquent/insert2?uid=E01&cname=Mei&pwd=1111
Route::get('/eloquent/insert2', function(Request $r){
    // create 要在sql.model 先加 protected $fillable = ['uid', 'cname', 'password']; 才能用
    UserInfo::create([
        'uid' => $r->uid, 
        'cname' => $r->cname, 
        'password' => $r->pwd
    ]); //拿掉變數，直接變物件function
    return 'done';
    
});

// 輸入http://localhost/HelloLaravel/public/eloquent/update?uid=E01&cname=Bob&pwd=3333
Route::get('/eloquent/update', function(Request $r){
    //1_ $user = UserInfo::find($r->uid); // find會找pk
    //1_ $user->cname = $r->cname; //改
    //1_ $user->password = $r->pwd; //改
    //1_ $user->save(); //存
    
    // find 要在sql.model 先加 protected $fillable = ['uid', 'cname', 'password']; 才能用
    UserInfo::find($r->uid)->update([
        'cname' => $r->cname,
        'password' => $r->pwd,
    ]);
    return 'done';
});

// http://localhost/HelloLaravel/public/eloquent/delete?uid=E01
Route::get('/eloquent/delete', function(Request $r){
    UserInfo::where('uid', $r->uid)->delete();
    return 'done';
});

//關聯-----------------------------------------------------

// http://localhost/HelloLaravel/public/eloquent/relation?uid=A01
Route::get('/eloquent/relation', function(Request $r){
    $users = UserInfo::where('uid', $r->uid)->get();
    foreach(UserInfo::find($r->uid)->lives as $house){ //找住址
        print("$house->address<br>");
    }
});

// http://localhost/HelloLaravel/public/eloquent/relation/create?uid=F01&address=花蓮市
Route::get('/eloquent/relation/create', function(Request $r){
    UserInfo::create(['uid'=> $r->uid]);
    $user = UserInfo::find($r->uid); // 修bug
    $house = House::create(['address' => $r->address]);
    $user->lives()->save($house);
    return 'done';
});

// http://localhost/HelloLaravel/public/eloquent/relation/has?tel=1111&fee=2000&hid=2
// hasOne就是一對一
Route::get('/eloquent/relation/has', function(Request $r){
    $phone = Phone::find($r->tel);
    $bill = Bill::create([
        'tel' => $r->tel,
        'fee' => $r->fee,
        'hid' => $r->hid
    ]);
    $phone->has()->save($bill);
    return 'done';
});

// http://localhost/HelloLaravel/public/eloquent/relation/sumbill?hid=1
// hasManyThrough串連(readonly不能寫入資料)
Route::get('/eloquent/relation/sumbill',function(Request $r){
    $house = House::find($r->hid);
    $sum = 0;
    foreach($house->bills as $bill){
        print("$bill->tel: $bill->fee<br>");
        $sum += $bill->fee;
    }
    print("$sum<br>");
    return 'done';
});

//驗證-----------------------------------------------------
Route::view('/request/form','form');
Route::post('/request/form', MyFormController::class);

//session-----------------------------------------------------

Route::get('/session', function(){
    session(['cname' => 'David']);
});

Route::get('/session/get', function(){
    return session('cname');
});

//cookie-----------------------------------------------------
Route::get('/cookie', function(){
    setcookie('cname', 'Tom', time() + 120);
});

Route::get('/cookie/get', function(){
    return $_COOKIE['cname'];
});

