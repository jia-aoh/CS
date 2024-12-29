<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// 多對多要用\Eloquent\Relations\BelongsToMany
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class UserInfo extends Model
{
    //屬性等級參照原始文件
    protected $table = 'UserInfo'; // 對應sql資料表
    protected $primaryKey = 'uid'; // 對應主索引(不支援複合欄位) - pk是id可省
    protected $keyType = 'string'; // 對應主索引資料型態(以php型態) - type是int且autoincrement可省
    public $timestamps = false; // 預設true，會存取userInfo特定欄位，因為有一些資料會寫進去
    protected $fillable = ['uid', 'cname', 'password'];

    //要有傳回型態BelongsToMany
    function lives(): BelongsToMany{
        return $this->belongsToMany(
            House::class, // 代表UserInfo跟House有關係
            'Live', // 中間資料表、不用創另一個live model說明關係
            'uid', // Live.uid本表pk與中間表關聯id
            'hid', // Live.hid他表pk與中間關聯id
        );
    }
}
