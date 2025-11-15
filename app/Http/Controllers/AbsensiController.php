<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\Siswa;
use Carbon\Carbon;

class AbsensiController extends Controller
{
    // Menampilkan semua data absensi
    public function index()
    {
        // Ambil semua absensi terbaru + relasi siswa
            $data = Absensi::with('siswa')->orderBy('tanggal', 'desc')->get();
            return view('absensi.index', compact('data'));
    }

    // Menampilkan form tambah absensi
    public function create()
    {
        // Ambil daftar siswa untuk dropdown (NIS sebagai value)
        $siswa = Siswa::orderBy('nama')->get();

        return view('absensi.create', compact('siswa'));
    }

    // Menyimpan data absensi ke database
    public function store(Request $request)
    {
        $request->validate([
            'siswa_id'   => 'required|exists:siswa,nis', // NIS harus ada di tabel siswa
            'tanggal'    => 'required|date',
            'jam_masuk'  => 'required',
            'jam_pulang' => 'nullable',
            'keterangan' => 'required|string|max:255',
        ]);

        Absensi::create([
            'siswa_id'   => $request->siswa_id, // simpan NIS, bukan nama
            'tanggal'    => Carbon::parse($request->tanggal)->format('Y-m-d'),
            'jam_masuk'  => $request->jam_masuk,
            'jam_pulang' => $request->jam_pulang,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('absensi.index')
                         ->with('success', 'Data absensi berhasil disimpan!');
    }
}
