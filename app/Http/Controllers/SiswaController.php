<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    // Tampilkan semua siswa
   public function index()
{
    // Ambil semua data siswa
    $data = Siswa::all();
    return view('siswa.index', compact('data'));
}


    // Tampilkan form tambah siswa
    public function create()
    {
        return view('siswa.create');
    }

    // Simpan data siswa baru
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:siswa,nis',
            'nama' => 'required|string|max:100',
            'kelas' => 'nullable|string|max:10',
            'jurusan' => 'nullable|string|max:50',
            'jenis_kelamin' => 'required|in:L,P'
        ]);

        Siswa::create($request->only('nis', 'nama', 'kelas', 'jurusan', 'jenis_kelamin'));

        return redirect('/siswa')->with('success', 'Data siswa berhasil ditambahkan!');
    }

    // Tampilkan form edit siswa
    public function edit($nis)
    {
        $data = Siswa::findOrFail($nis);
        return view('siswa.edit', compact('data'));
    }

    // Update data siswa
    public function update(Request $request, $nis)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'kelas' => 'nullable|string|max:10',
            'jurusan' => 'nullable|string|max:50',
            'jenis_kelamin' => 'required|in:L,P'
        ]);

        $data = Siswa::findOrFail($nis);
        $data->update($request->only('nama', 'kelas', 'jurusan', 'jenis_kelamin'));

        return redirect('/siswa')->with('success', 'Data siswa berhasil diperbarui!');
    }

    // Hapus data siswa
    public function destroy($nis)
    {
        $data = Siswa::findOrFail($nis);
        $data->delete();

        return redirect('/siswa')->with('success', 'Data siswa berhasil dihapus!');
    }
}
