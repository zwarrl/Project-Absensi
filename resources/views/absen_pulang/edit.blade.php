@extends('layouts.main')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h4>Edit Absensi Pulang</h4>
    </div>

    <div class="card-body">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
            </div>
        @endif

        <form action="{{ route('absen_pulang.update', $absenPulang->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Siswa</label>
                <select name="siswa_id" class="form-control" required>
                    <option value="">-- Pilih Siswa --</option>
                    @foreach($siswa as $s)
                        <option value="{{ $s->nis }}" @if($absenPulang->siswa_id == $s->nis) selected @endif>{{ $s->nama }} ({{ $s->nis }})</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Tanggal</label>
                <input type="date" name="tanggal" class="form-control" value="{{ $abseiPulang->tanggal }}" required>
            </div>

            <div class="mb-3">
                <label>Jam Pulang</label>
                <input type="time" name="jam_pulang" class="form-control" value="{{ $absenPulang->jam_pulang }}" required>
            </div>

            <div class="mb-3">
                <label>Keterangan</label>
                <select name="keterangan" class="form-control">
                    <option value="">-- Pilih Keterangan --</option>
                    <option value="Hadir" @if($absenPulang->keterangan=='Hadir') selected @endif>Hadir</option>
                    <option value="Sakit" @if($absenPulang->keterangan=='Sakit') selected @endif>Sakit</option>
                    <option value="Izin" @if($absenPulang->keterangan=='Izin') selected @endif>Izin</option>
                    <option value="Alpha" @if($absenPulang->keterangan=='Alpha') selected @endif>Alpha</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Foto Pulang (Opsional)</label>
                <input type="file" name="foto" class="form-control">
                @if($absenPulang->foto)
                    <img src="{{ asset('storage/'.$absenPulang->foto) }}" width="100" class="mt-2">
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
