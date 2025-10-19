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
        Schema::create('orangtua', function (Blueprint $table) {
            $table->id('orangtua_id');
            $table->integer('status')->nullable();
            $table->string('email')->nullable();
            $table->string('nama')->nullable();
            $table->string('namamahasiswa')->nullable();
            $table->string('nomor_telepon')->nullable();
            $table->string('alamat')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('prodi')->nullable();
            $table->string('saranmasukkan')->nullable();
            $table->string('jeniskelamin')->nullable();
            $table->integer('usia')->nullable();
            $table->string('role')->nullable();
            $table->integer('no_responden')->nullable();

            // Kolom p1–p28
            for ($i = 1; $i <= 28; $i++) {
                $table->integer('p' . $i)->nullable();
            }

            // Kolom u1–u9
            for ($i = 1; $i <= 9; $i++) {
                $table->integer('u' . $i)->nullable();
            }

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orangtua');
    }
};
