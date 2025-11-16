<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('absen_pulang', function (Blueprint $table) {
    $table->id();
    $table->string('siswa_id');
    $table->foreign('siswa_id')->references('nis')->on('siswa')->onDelete('cascade');
    $table->date('tanggal');
    $table->time('jam_pulang')->nullable();
    $table->string('keterangan')->nullable();
    $table->string('foto_pulang')->nullable(); // pastikan kolom ini ada
    $table->timestamps();
});
    }

    public function down(): void
    {
        Schema::dropIfExists('absen_pulang');
    }
};
