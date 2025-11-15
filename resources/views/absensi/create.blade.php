@extends('layouts.main')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-success text-white">
        <h4 class="mb-0">Tambah Absensi</h4>
    </div>

    <div class="card-body">
        <form action="{{ route('absensi.store') }}" method="POST">
            @csrf

            {{-- Nama Siswa --}}
            <div class="mb-3">
                <label for="siswa_id" class="form-label">Nama Siswa</label>
                <select name="siswa_id" id="siswa_id" class="form-control @error('siswa_id') is-invalid @enderror" required>
                    <option value="">-- Pilih Siswa --</option>
                    @foreach($siswa as $s)
                        <option value="{{ $s->nis }}" {{ old('siswa_id') == $s->nis ? 'selected' : '' }}>
                            {{ $s->nama }}
                        </option>
                    @endforeach
                </select>
                @error('siswa_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Tanggal --}}
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal') }}" required>
                @error('tanggal')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Jam Masuk --}}
            <div class="mb-3">
                <label for="jam_masuk" class="form-label">Jam Masuk</label>
                <input type="time" name="jam_masuk" id="jam_masuk" class="form-control @error('jam_masuk') is-invalid @enderror" value="{{ old('jam_masuk') }}" required>
                @error('jam_masuk')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Jam Pulang --}}
            <div class="mb-3">
                <label for="jam_pulang" class="form-label">Jam Pulang</label>
                <input type="time" name="jam_pulang" id="jam_pulang" class="form-control @error('jam_pulang') is-invalid @enderror" value="{{ old('jam_pulang') }}">
                @error('jam_pulang')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Keterangan --}}
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <select name="keterangan" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror" required>
                    <option value="Hadir" {{ old('keterangan') == 'Hadir' ? 'selected' : '' }}>Hadir</option>
                    <option value="Sakit" {{ old('keterangan') == 'Sakit' ? 'selected' : '' }}>Sakit</option>
                    <option value="Izin" {{ old('keterangan') == 'Izin' ? 'selected' : '' }}>Izin</option>
                    <option value="Alpha" {{ old('keterangan') == 'Alpha' ? 'selected' : '' }}>Alpha</option>
                </select>
                @error('keterangan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('absensi.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
