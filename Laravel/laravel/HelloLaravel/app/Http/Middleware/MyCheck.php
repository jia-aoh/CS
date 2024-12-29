<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request; //handle是request
use Symfony\Component\HttpFoundation\Response;

class MyCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $a = $request->a; // ao6gj 沒輸入是null
        $b = $request->b;
        // middleware1
        if(($a.'') === '' || ($b.'') === ''){
            die('Wrong Input');
        }

        return $next($request); // 讓request繼續往下跑
    }
}
