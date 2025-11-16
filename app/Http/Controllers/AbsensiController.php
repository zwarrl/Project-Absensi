<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class AbsensiController extends Controller
{
    public function index()
    {
        $absensi = Absensi::with('siswa')->orderBy('tanggal', 'desc')->get();
        return view('absensi.index', compact('absensi'));
    }

    public function create()
    {
        $siswa = Siswa::orderBy('nama', 'asc')->get();
        return view('absensi.create', compact('siswa'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'siswa_id'   => 'required|exists:siswa,nis',
            'tanggal'    => 'required|date',
            'jam_masuk'  => 'required_if:keterangan,Hadir',
            'jam_pulang' => 'nullable',
            'keterangan' => 'required|in:Hadir,Sakit,Izin,Alpha',
            'foto'       => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('foto_absensi', 'public');
        }

        Absensi::create($validated);

        return redirect()->route('absensi.index')->with('success', 'Absensi berhasil ditambahkan');
    }

    public function edit(Absensi $absensi)
    {
        $siswa = Siswa::orderBy('nama', 'asc')->get();
        return view('absensi.edit', compact('absensi', 'siswa'));
    }

    public function update(Request $request, Absensi $absensi)
    {
        $validated = $request->validate([
            'siswa_id'   => 'required|exists:siswa,nis',
            'tanggal'    => 'required|date',
            'jam_masuk'  => 'required_if:keterangan,Hadir',
            'jam_pulang' => 'nullable',
            'keterangan' => 'required|in:Hadir,Sakit,Izin,Alpha',
            'foto'       => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
        ]);

        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $filename = time().'_'.$image->getClientOriginalName();

            $resized = Image::make($image)->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            $resized->save(storage_path('app/public/foto_absensi/'.$filename));
            $validated['foto'] = 'foto_absensi/'.$filename;
        }

        $absensi->update($validated);

        return redirect()->route('absensi.index')->with('success', 'Absensi berhasil diperbarui');
    }

    public function destroy(Absensi $absensi)
    {
        if ($absensi->foto && Storage::disk('public')->exists($absensi->foto)) {
            Storage::disk('public')->delete($absensi->foto);
        }

        $absensi->delete();

        return redirect()->route('absensi.index')->with('success', 'Data absensi berhasil dihapus');
    }
}
