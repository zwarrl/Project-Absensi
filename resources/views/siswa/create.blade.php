@extends('layouts.main')

@section('content')

<div class="card shadow-sm">
    <div class="card-header bg-success text-white">
        <h4>Tambah Siswa</h4>
    </div>

    <div class="card-body">

        <form action="/siswa" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nis">NIS</label>
                <input type="text" name="nis" id="nis" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="nama">Asal Sekolah</label>
                <input type="text" name="asal_sekolah" id="asal_sekolah" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="kelas">Kelas</label>
                <input type="text" name="kelas" id="kelas" class="form-control">
            </div>

            <div class="mb-3">
                <label for="jurusan">Jurusan</label>
                <input type="text" name="jurusan" id="jurusan" class="form-control">
            </div>

            <div class="mb-3">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                    <option value="">-- Pilih Jenis Kelamin --</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="/siswa" class="btn btn-secondary">Kembali</a>
            <a href="/dashboard" class="btn btn-dark">← Dashboard</a>

        </form>

    </div>
</div>

@endsection
