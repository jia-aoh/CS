<?php

namespace App\Http\Controllers;

// 網址送到Request判斷資料情態給下面的function
use Illuminate\Http\Request;
// 在Controller裡面使用Model
use App\Models\MyModel;

// 建controller: php artisan make:controller HiController
// 第一字大寫：因為後續class維護

class HiController extends Controller
{
    private $model;
    function __construct(){
        $this->model = new MyModel();
    }

    // __invoke這個function名字不能動
    function __invoke($name)
    {
        return view('hi')
            ->with('name1', $name);
    }

    // add/5/3 --> add?a=10&b=20
    function add(Request $request) {

        // 創model: php artisan make:model MyModel
        $a = $request->a; // = $a = $_GET['a'];
        $b = $request->b;

        // 檢查使用者輸入資料是否我要的(選擇1)2.在route之前，middleware中介層

        $result = $this->model->add($a, $b);
        // return view('form')
        //     ->with('a', $a)
        //     ->with('b', $b)
        //     ->with('result', $result);

        // 用dictionary
        return view('form',[
            'a' => $a,
            'b' => $b,
            'result' => $result
        ]);
    }

}
