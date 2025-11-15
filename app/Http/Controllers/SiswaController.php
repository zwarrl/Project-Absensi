<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    public function index()
    {
        $data = Siswa::all();
        return view('siswa.index', compact('data'));
    }

    public function create()
    {
        return view('siswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:siswa',
            'nama' => 'required',
            'kelas' => 'required',
            'jenis_kelamin' => 'required'
        ]);

        Siswa::create($request->all());

        return redirect('/siswa')->with('success', 'Data siswa berhasil ditambahkan!');
    }

    public function edit($nis)
    {
        $data = Siswa::findOrFail($nis); // pastikan primaryKey = nis
        return view('siswa.edit', compact('data'));
    }

    public function update(Request $request, $nis)
    {
        $request->validate([
            'nama' => 'required',
            'kelas' => 'required',
            'jenis_kelamin' => 'required'
        ]);

        $data = Siswa::findOrFail($nis);
        $data->update($request->all());

        return redirect('/siswa')->with('success', 'Data siswa berhasil diperbarui!');
    }

    public function destroy($nis)
    {
        $data = Siswa::findOrFail($nis);
        $data->delete();

        return redirect('/siswa')->with('success', 'Data siswa berhasil dihapus!');
    }
}
