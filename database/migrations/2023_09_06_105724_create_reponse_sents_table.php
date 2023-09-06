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
        Schema::create('reponse_sents', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('re')->nullable()->default('')->comment('樓下回覆句');
            $table->bigInteger('response_id')->comment('創樓句子id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reponse_sents');
    }
};
