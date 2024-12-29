<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// 導入驗證機制
use App\Http\Requests\MyFormRequest;

class MyFormController extends Controller
{
    function __invoke(MyFormRequest $r){ //選擇驗證機制
        return $r->message;

    }
}
