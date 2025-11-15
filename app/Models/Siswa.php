<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'nis';   // NIS sebagai primary key
    public $incrementing = false;    // karena NIS bukan auto-increment
    protected $keyType = 'string';

    protected $fillable = ['nis', 'nama', 'kelas', 'jurusan', 'jenis_kelamin'];

    public function absensis()
    {
        return $this->hasMany(Absensi::class, 'siswa_id', 'nis');
    }
}
