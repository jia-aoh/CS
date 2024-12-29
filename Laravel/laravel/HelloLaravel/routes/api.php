<?php
// php artisan install:api 實現前後端分離

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// 要匯入DB
use Illuminate\Support\Facades\DB;
use App\Models\UserInfo;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum'); // 新的驗證token

// 將資料庫資料匯出成json
Route::get('/query', function(){
    $users = UserInfo::All();
    $json = $users->toJson(JSON_UNESCAPED_UNICODE); //中文要加防止亂碼常數
    return response($json)
        ->header('content-type', 'application/json')
        ->header('charset', 'utf-8');
    });
    
    //在postman(工程版瀏覽器)處理post的前端api
    // api = function
    Route::post('/update',function(Request $request){
    // Route::patch('/update',function(Request $request){ // restful api風格
        $uid = $request->uid;
        $cname = $request->cname;
        DB::update('update UserInfo set cname = ? where uid = ?', [$cname, $uid]);
        return response('{"acknowledged": true}')
            ->header('content-type', 'application/json')
            ->header('charset', 'utf-8');
});

// 確認呼叫者有沒有權限去修改資料has api token
// 主流：透過jwt有一些訊息 (js, web, token)做身份驗證，前端要把jwt搜集起來，更新資料要在auth貼上jwt一同驗證，
// OAuth2.0業界用2個token(安全性比較好)：有一本書