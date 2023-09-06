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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name')->nullable()->default('')->comment('名稱');
            $table->string('image')->nullable()->default('')->comment('圖片路徑');
            $table->integer('price')->nullable()->default(0)->comment('價格');
            $table->integer('status')->nullable()->default(0)->comment('0:不顯示/1:顯示');
            $table->text('desc')->nullable()->comment('描述');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
