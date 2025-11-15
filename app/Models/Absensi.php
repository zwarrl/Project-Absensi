<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $table = 'absensis';
    protected $fillable = ['siswa_id', 'tanggal', 'jam_masuk', 'jam_pulang', 'keterangan'];

    public function siswa()
{
    return $this->belongsTo(Siswa::class, 'siswa_id', 'nis');
}
}
