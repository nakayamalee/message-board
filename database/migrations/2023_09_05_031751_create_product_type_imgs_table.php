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
        Schema::create('product_type_imgs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('image')->nullable()->default('')->comment('圖片路徑');
            $table->bigInteger('product_type_id')->comment('類別id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_type_imgs');
    }
};
