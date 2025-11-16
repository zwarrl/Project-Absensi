@extends('layouts.main')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-success text-white">
        <h4 class="mb-0">Tambah Absensi</h4>
    </div>

    <div class="card-body">
        {{-- Menampilkan error validation --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('absensi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Nama Siswa --}}
            <div class="mb-3">
                <label for="siswa_id" class="form-label">Nama Siswa</label>
                <select name="siswa_id" id="siswa_id" class="form-control @error('siswa_id') is-invalid @enderror" required>
                    <option value="">-- Pilih Siswa --</option>
                    @foreach ($siswa as $s)
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

            {{-- Jam Masuk (nullable) --}}
            <div class="mb-3">
                <label for="jam_masuk" class="form-label">Jam Masuk</label>
                <input type="time" name="jam_masuk" id="jam_masuk" class="form-control @error('jam_masuk') is-invalid @enderror" value="{{ old('jam_masuk') }}">
                <small class="text-muted">Kosongkan jika keterangan Sakit, Izin, atau Alpha</small>
                @error('jam_masuk')
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

            {{-- Upload Foto --}}
            <div class="mb-3">
                <label for="foto" class="form-label">Ambil Foto</label>
                <input type="file" 
                       name="foto" 
                       id="foto" 
                       accept="image/*" 
                       capture="environment" 
                       class="form-control @error('foto') is-invalid @enderror"
                       onchange="previewFoto(event)">
                @error('foto')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                {{-- Preview Foto --}}
                <div class="mt-2">
                    <img id="preview-image" src="#" alt="Preview Foto" style="display:none; max-width:150px; border-radius:5px;">
                </div>
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('absensi.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

{{-- Script Preview Foto --}}
<script>
function previewFoto(event) {
    const preview = document.getElementById('preview-image');
    const file = event.target.files[0];

    if(file){
        preview.src = URL.createObjectURL(file);
        preview.style.display = "block";
    } else {
        preview.src = "";
        preview.style.display = "none";
    }
}
</script>
@endsection
