@extends('layouts.main')

@section('content')

<div class="card shadow-sm">
    <div class="card-header bg-warning text-white">
        <h4>Edit Data Siswa</h4>
    </div>

    <div class="card-body">

        <form action="/siswa/{{ $data->nis }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>NIS (Tidak bisa diubah)</label>
                <input type="text" class="form-control" value="{{ $data->nis }}" disabled>
            </div>

            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ $data->nama }}" required>
            </div>

            <div class="mb-3">
                <label>Kelas</label>
                <input type="text" name="kelas" class="form-control" value="{{ $data->kelas }}" required>
            </div>

            <div class="mb-3">
                <label>Jurusan</label>
                <input type="text" name="jurusan" class="form-control" value="{{ $data->jurusan }}">
            </div>

            <div class="mb-3">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control">
                    <option {{ $data->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option {{ $data->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <button class="btn btn-warning">Update</button>
            <a href="/siswa" class="btn btn-secondary">Kembali</a>
            <a href="/dashboard" class="btn btn-dark">← Dashboard</a>
        </form>

    </div>
</div>

@endsection
