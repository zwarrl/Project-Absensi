<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $table = 'absensis'; // <-- pastikan nama tabel sesuai migration
    protected $fillable = [
    'siswa_id',
    'asal_sekolah',
    'tanggal',
    'jam_masuk',
    'jam_pulang',
    'keterangan',
    'foto' // ⬅️ tambahkan ini
];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id', 'nis');
    }
}
