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
        Schema::create('pertanyaan_orangtua', function (Blueprint $table) {
            $table->id('pertanyaan_id');
            $table->string('kategori')->nullable();
            $table->string('pertanyaan');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pertanyaan_orangtua');
    }
};
