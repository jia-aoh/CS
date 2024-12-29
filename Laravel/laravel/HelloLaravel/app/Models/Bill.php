<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'Bill'; // 對應sql資料表
    // protected $primaryKey = 'id'; // 對應主索引(不支援複合欄位) - pk是id可省
    // protected $keyType = 'int'; // 對應主索引資料型態(以php型態) - type是int且autoincrement可省
    public $timestamps = false; // 預設true，會存取userInfo特定欄位，因為有一些資料會寫進去
    protected $fillable = ['id', 'tel', 'fee', 'dd', 'hid'];
}
