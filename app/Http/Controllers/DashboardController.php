<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;
use App\Models\Absensi;
use App\Models\AbsenPulang;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        // Jika admin
        if ($user->role === 'admin') {
            $totalSiswa = Siswa::count();
            $hadirHariIni = Absensi::whereDate('tanggal', Carbon::today())
                                   ->where('keterangan', 'Hadir')->count();
            $terlambatHariIni = Absensi::whereDate('tanggal', Carbon::today())
                                       ->where('keterangan', 'Terlambat')->count();
            $absensiHariIni = Absensi::with('siswa')
                                     ->whereDate('tanggal', Carbon::today())->get();

            return view('dashboard.index', compact(
                'user', 'totalSiswa', 'hadirHariIni', 'terlambatHariIni', 'absensiHariIni'
            ));
        }

        // Jika siswa
       if ($user->role === 'siswa') {

        // username siswa = NIS
        $siswa = Siswa::where('nis', $user->username)->first();

        if (!$siswa) {
            abort(404, 'Data siswa tidak ditemukan.');
        }

        // ABSEN MASUK
        $absenHariIni = \DB::table('absensis')
            ->where('siswa_id', $siswa->nis)
            ->whereDate('tanggal', Carbon::today())
            ->first();

        // ABSEN PULANG
        $absenPulangHariIni = \DB::table('absen_pulang')
            ->where('siswa_id', $siswa->nis)
            ->whereDate('tanggal', Carbon::today())
            ->first();

        return view('dashboard.index', compact(
            'user', 'siswa', 'absenHariIni', 'absenPulangHariIni'
        ));
    }

        abort(403, 'Role tidak dikenali.');
    }
}
