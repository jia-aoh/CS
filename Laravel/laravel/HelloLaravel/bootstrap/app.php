<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
// 通用 middleware
// use App\Http\Middleware\MyCheck;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // middleware方法2
        // $middleware->append(MyCheck::class); //所有的路由都會經過這個資料夾，所以一開始就打不開，所以需要指令說/form不要使用middleware
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
