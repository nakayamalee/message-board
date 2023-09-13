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
        Schema::table('order_forms', function (Blueprint $table) {
            $table->string('order_id')->nullable()->change();
            $table->date('date')->default(null)->change();
            $table->string('phone')->default(null)->change();
            $table->string('menu')->default(null)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_forms', function (Blueprint $table) {
            //
        });
    }
};
