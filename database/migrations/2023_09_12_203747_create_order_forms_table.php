<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_forms', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('order_id')->nullable()->comment('訂單編號');
            $table->bigInteger('user_id')->nullable()->comment('用戶id');
            $table->string('name')->nullable()->default('')->comment('姓名');
            $table->string('address')->nullable()->default('')->comment('地址');
            $table->string('date')->nullable()->default('')->comment('日期');
            $table->integer('phone')->nullable()->default()->comment('連絡電話');
            $table->string('menu')->nullable()->default()->comment('備註');
            $table->integer('total')->nullable()->default()->comment('總金額');
            $table->integer('pay')->nullable()->default()->comment('匯款');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_forms');
    }
};
