<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class House extends Model
{
    //屬性等級參照原始文件
    protected $table = 'House'; // 對應sql資料表
    protected $primaryKey = 'hid'; // 對應主索引(不支援複合欄位) - pk是id可省
    protected $keyType = 'int'; // 對應主索引資料型態(以php型態) - type是int且autoincrement可省
    public $timestamps = false; // 預設true，會存取userInfo特定欄位，因為有一些資料會寫進去
    protected $fillable = ['hid', 'address'];

    // 三資料表捷徑
    function bills(): HasManyThrough{
        return $this->hasManyThrough(
            Bill::class, // 目標表
            Phone::class, // 會經過的表
            'hid', // phone
            'tel', // bill
            'hid', // house
            'tel', // phone
        );
    }

}
