<?php

namespace App\Http\Controllers;

use App\Models\AbsenPulang;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class AbsenPulangController extends Controller
{
    public function index()
    {
        $absenPulang = AbsenPulang::with('siswa')->orderBy('tanggal', 'desc')->get();
        return view('absen_pulang.index', compact('absenPulang'));
    }

    public function create()
    {
        // Tampilkan siswa untuk hari ini yang bisa absen pulang
        $siswa = Siswa::orderBy('nama', 'asc')->get();
        return view('absen_pulang.create', compact('siswa'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'siswa_id' => 'required|exists:siswa,nis',
            'tanggal' => 'required|date',
            'jam_pulang' => 'required',
            'keterangan' => 'nullable',
            'foto_pulang' => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
        ]);

        if ($request->hasFile('foto_pulang')) {
            $image = $request->file('foto_pulang');
            $filename = time().'_'.$image->getClientOriginalName();
            $resized = Image::make($image)->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $resized->save(storage_path('app/public/foto_absen_pulang/'.$filename));
            $validated['foto_pulang'] = 'foto_absen_pulang/'.$filename;
        }

        AbsenPulang::create($validated);

        return redirect()->route('absen_pulang.index')->with('success', 'Absen pulang berhasil dicatat');
    }

    public function edit(AbsenPulang $absenPulang)
    {
        $siswa = Siswa::orderBy('nama', 'asc')->get();
        return view('absen_pulang.edit', compact('absenPulang', 'siswa'));
    }

    public function update(Request $request, AbsenPulang $absenPulang)
    {
        $validated = $request->validate([
            'siswa_id' => 'required|exists:siswa,nis',
            'tanggal' => 'required|date',
            'jam_pulang' => 'required',
            'keterangan' => 'nullable',
            'foto_pulang' => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
        ]);

        if ($request->hasFile('foto_pulang')) {
            if ($absenPulang->foto_pulang && Storage::disk('public')->exists($absenPulang->foto_pulang)) {
                Storage::disk('public')->delete($absenPulang->foto_pulang);
            }

            $image = $request->file('foto_pulang');
            $filename = time().'_'.$image->getClientOriginalName();
            $resized = Image::make($image)->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $resized->save(storage_path('app/public/foto_absen_pulang/'.$filename));
            $validated['foto_pulang'] = 'foto_absen_pulang/'.$filename;
        }

        $absenPulang->update($validated);

        return redirect()->route('absen_pulang.index')->with('success', 'Absen pulang berhasil diperbarui');
    }

    public function destroy(AbsenPulang $absenPulang)
    {
        if ($absenPulang->foto_pulang && Storage::disk('public')->exists($absenPulang->foto_pulang)) {
            Storage::disk('public')->delete($absenPulang->foto_pulang);
        }

        $absenPulang->delete();
        return redirect()->route('absen_pulang.index')->with('success', 'Absen pulang berhasil dihapus');
    }
}
