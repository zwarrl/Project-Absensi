<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Siswa;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    // Tampilkan daftar absensi
    public function index()
    {
        $absensi = Absensi::with('siswa')->orderBy('tanggal', 'desc')->get();
        return view('absensi.index', compact('absensi'));
    }

    // Tampilkan form tambah absensi
    public function create()
    {
        $siswa = Siswa::orderBy('nama', 'asc')->get();
        return view('absensi.create', compact('siswa'));
    }

    // Simpan data absensi
    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswa,nis',
            'tanggal' => 'required|date',
            'jam_masuk' => 'required',
            'jam_pulang' => 'nullable',
            'keterangan' => 'required|in:Hadir,Sakit,Izin,Alpha',
        ]);

        Absensi::create([
            'siswa_id' => $request->siswa_id,
            'tanggal' => $request->tanggal,
            'jam_masuk' => $request->jam_masuk,
            'jam_pulang' => $request->jam_pulang,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('absensi.index')->with('success', 'Absensi berhasil ditambahkan');
    }
}
