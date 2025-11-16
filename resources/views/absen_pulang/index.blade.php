@extends('layouts.main')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h4>Data Absen Pulang</h4>
        <a href="{{ route('absen_pulang.create') }}" class="btn btn-light">Tambah Absen Pulang</a>
    </div>

    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Jam Pulang</th>
                    <th>Keterangan</th>
                    <th>Foto Pulang</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($absenPulang as $index => $absen)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $absen->siswa->nis ?? '-' }}</td>
                        <td>{{ $absen->siswa->nama ?? '-' }}</td>
                        <td>{{ $absen->tanggal }}</td>
                        <td>{{ $absen->jam_pulang ?? '-' }}</td>
                        <td>{{ $absen->keterangan ?? '-' }}</td>
                        <td>
                            @if($absen->foto_pulang && file_exists(storage_path('app/public/'.$absen->foto_pulang)))
                                <img src="{{ asset('storage/'.$absen->foto_pulang) }}" width="50" alt="Foto Pulang">
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('absen_pulang.edit', $absen->id) }}" class="btn btn-sm btn-warning mb-1">Edit</a>
                            <form action="{{ route('absen_pulang.destroy', $absen->id) }}" method="POST" style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">Tidak ada data absen pulang.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
