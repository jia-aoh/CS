<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// 一對多HasMany
use Illuminate\Database\Eloquent\Relations\HasMany;

class Phone extends Model
{
    protected $table = 'Phone'; // 對應sql資料表
    protected $primaryKey = 'tel'; // 對應主索引(不支援複合欄位) - pk是id可省
    protected $keyType = 'string'; // 對應主索引資料型態(以php型態) - type是int且autoincrement可省
    public $timestamps = false; // 預設true，會存取userInfo特定欄位，因為有一些資料會寫進去
    protected $fillable = ['tel', 'hid'];

        //要有傳回型態HasMany
        function has(): HasMany{
            return $this->hasMany(
                Bill::class, // 代表UserInfo跟House有關係
                'tel', // bill.uid他表
                'hid', // phone.hid本表
            );
        }
}
