<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
// /test
use Illuminate\Support\Facades\Auth;
//修改語系需要use這個
use Illuminate\Support\Facades\App;

//不用login就看得到
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 需要login才看得到
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 判斷有沒有登入，要use Auth
Route::get('/test', function(){
    if(Auth::check()){ // 判斷有沒有登入，要use Auth
        echo Auth::id() . "<br>"; // 傳回使用者id
        echo '<pre>';
        echo Auth::user(); // 傳回使用者id
        echo '</pre>';

    }else{
        echo 'Not Login';
    }
});

//語系
//10_ php
//11_ php artisan lang:publish > 創語系/locale.php/所有語系都要
//12_ 修改語系需要use Illuminate\Support\Facades\App;
// Route::view('/myview', 'myview');
Route::get('/myview/{locale?}', function($locale='en'){
    App::setLocale($locale);
    return view('myview');
});



require __DIR__.'/auth.php';
