@extends('layouts.main')

@section('content')

<div class="card shadow-sm">
    <div class="card-header bg-success text-white">
        <h4 class="mb-0">Tambah Absensi</h4>
    </div>

    <div class="card-body">

        <form action="/absensi" method="POST">
            @csrf

            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Tanggal</label>
                <input type="date" name="tanggal" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Jam Masuk</label>
                <input type="time" name="jam_masuk" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Jam Pulang</label>
                <input type="time" name="jam_pulang" class="form-control">
            </div>

            <div class="mb-3">
                <label>Keterangan</label>
                <select name="keterangan" class="form-control" required>
                    <option value="Hadir">Hadir</option>
                    <option value="Sakit">Sakit</option>
                    <option value="Izin">Izin</option>
                    <option value="Alpha">Alpha</option>
                </select>
            </div>

            <button class="btn btn-success">Simpan</button>

            <a href="/absensi" class="btn btn-secondary">Kembali</a>


        </form>

    </div>
</div>

@endsection
