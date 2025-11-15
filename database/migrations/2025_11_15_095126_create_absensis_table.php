<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('absensis', function (Blueprint $table) {
            $table->id();
            
            // Kolom siswa_id sebagai foreign key ke nis
            $table->string('siswa_id');
            
            $table->date('tanggal');
            $table->time('jam_masuk')->nullable();
            $table->time('jam_pulang')->nullable();
            $table->string('keterangan')->nullable(); // Hadir / Izin / Sakit / Alfa
            
            $table->timestamps();

            // Foreign key ke tabel siswa
            $table->foreign('siswa_id')
                  ->references('nis')
                  ->on('siswa')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('absensis');
    }
};
