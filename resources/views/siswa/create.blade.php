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
                <label>NIS</label>
                <input type="text" name="nis" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Kelas</label>
                <input type="text" name="kelas" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Jurusan</label>
                <input type="text" name="jurusan" class="form-control">
            </div>

            <div class="mb-3">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control" required>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>

            <button class="btn btn-success">Simpan</button>
            <a href="/siswa" class="btn btn-secondary">Kembali</a>
            <a href="/dashboard" class="btn btn-dark">← Dashboard</a>

        </form>

    </div>
</div>

@endsection
