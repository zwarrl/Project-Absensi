<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsenPulang extends Model
{
    use HasFactory;

    protected $table = 'absen_pulang';

    protected $fillable = [
        'siswa_id',
        'tanggal',
        'jam_pulang',
        'keterangan',
        'foto_pulang',
    ];

    // Relasi ke Siswa
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id', 'nis');
    }
}
