<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
// 密碼驗證rule
use Illuminate\Validation\Rules\Password;

class MyFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // return false; //開關決定rules要不要過
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array //驗證規則
    {
        return [
            'uid' => 'required|unique:UserInfo,uid', // 到資料庫看有沒有存在 onblur
            'message' => 'required|min:5|max:8', //name="message" //必填|最少5字
            'passwd' => ['required','confirmed', 
                Password::min(5)
                    ->letters() //要有文字
                    ->numbers() //要數字
                    ->symbols() //要符號
                    ->uncompromised()
                    ->mixedCase()] //要混合
        ];
    }

    function messages(){
        return [
            'message.required' => '必填',
            'message.min' => ':attribute最少:min字',
            'message.max' => ':attribute最多:max字',
        ];
    }
}
