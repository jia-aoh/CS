<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 加欄位
     * 建立連結資料庫建立新欄位窗口
     * php artisan make:migration add_fields_to_users --table="users"
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //varchar->放在資料庫email後->允許null值
            $table->string('phone')->after('email')->nullable();
            $table->binary('image')->after('phone')->nullable();
        });
    }
    // php artisan migrate 在database建欄位

    /**
     * Reverse the migrations.
     * 刪欄位
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('phone');
            $table->dropColumn('image');
        });
    }
};
// php artisan migrate:rollback 在database刪欄位

