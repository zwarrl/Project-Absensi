<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\Siswa; // pastikan ada model Siswa
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today();

        // Ambil semua absensi hari ini
        $absensiHariIni = Absensi::whereDate('tanggal', $today)->get();

        // Total siswa
        // Jika ada tabel Siswa:
        $totalSiswa = Siswa::count();

        // Jumlah hadir dan terlambat hari ini
        $hadirHariIni = $absensiHariIni->where('keterangan', 'Hadir')->count();
        $terlambatHariIni = $absensiHariIni->where('keterangan', 'Terlambat')->count();

        // Kirim ke view
        return view('dashboard', [
            'absensiHariIni' => $absensiHariIni,
            'totalSiswa' => $totalSiswa,
            'hadirHariIni' => $hadirHariIni,
            'terlambatHariIni' => $terlambatHariIni,
        ]);
    }
}
