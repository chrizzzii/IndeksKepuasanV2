<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{public function up(): void
{
    if (!Schema::hasTable('orangtua')) {
        Schema::create('orangtua', function (Blueprint $table) {
            $table->id('orangtua_id');
            $table->integer('status')->nullable();
            $table->string('email')->nullable();
            $table->string('nama')->nullable();
            $table->string('nomor_telepon')->nullable();
            $table->string('alamat')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('prodi')->nullable();
            $table->string('saranmasukkan')->nullable();
            $table->string('jeniskelamin')->nullable();
            $table->integer('usia')->nullable();
            $table->string('role')->nullable();
            $table->integer('no_responden')->nullable();

            for ($i = 1; $i <= 27; $i++) {
                $table->integer('p' . $i)->nullable();
            }

            for ($i = 1; $i <= 9; $i++) {
                $table->integer('u' . $i)->nullable();
            }

            $table->timestamps();
        });
    }
}
    public function down(): void
    {
        Schema::dropIfExists('orangtua');
    }
};
