@extends('layouts.main')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h4>Tambah Absen Pulang</h4>
    </div>

    <div class="card-body">
        {{-- Tampilkan error validasi --}}
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('absen_pulang.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Pilih Siswa --}}
            <div class="mb-3">
                <label>Siswa</label>
                <select name="siswa_id" class="form-control" required>
                    <option value="">-- Pilih Siswa --</option>
                    @foreach($siswa as $s)
                        <option value="{{ $s->nis }}">{{ $s->nama }} ({{ $s->nis }})</option>
                    @endforeach
                </select>
            </div>

            {{-- Tanggal --}}
            <div class="mb-3">
                <label>Tanggal</label>
                <input type="date" name="tanggal" class="form-control" value="{{ date('Y-m-d') }}" readonly>
            </div>

            {{-- Jam Pulang --}}
            <div class="mb-3">
                <label>Jam Pulang</label>
                <input type="time" name="jam_pulang" class="form-control" required>
            </div>

            {{-- Keterangan --}}
            <div class="mb-3">
                <label>Keterangan</label>
                <select name="keterangan" class="form-control">
                    <option value="">-- Pilih Keterangan --</option>
                    <option value="Hadir">Hadir</option>
                    <option value="Sakit">Sakit</option>
                    <option value="Izin">Izin</option>
                    <option value="Alpha">Alpha</option>
                </select>
            </div>

            {{-- Foto Pulang --}}
            <div class="mb-3">
                <label>Foto Pulang (Opsional)</label>
                <input type="file" name="foto_pulang" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection
