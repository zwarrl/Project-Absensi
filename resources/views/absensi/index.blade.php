@extends('layouts.main')

@section('content')

<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h4 class="mb-0">Data Absensi</h4>
    </div>

    <div class="card-body">

        {{-- Alert Success --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Tombol Tambah --}}
        <a href="{{ route('absensi.create') }}" class="btn btn-primary mb-3">+ Tambah Absensi</a>

        {{-- Tabel --}}
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-primary">
                    <tr>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Jam Masuk</th>
                        <th>Keterangan</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($absensi as $item)
                    <tr>
                        {{-- Foto --}}
                        <td>
                            @if ($item->foto)
                                <img src="{{ asset('storage/' . $item->foto) }}" 
                                     alt="Foto {{ $item->siswa->nama }}" 
                                     width="50" 
                                     class="rounded">
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>

                        {{-- Data --}}
                        <td>{{ $item->siswa->nama }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                        <td>{{ $item->jam_masuk }}</td>
                        <td>{{ $item->keterangan }}</td>

                        {{-- Aksi --}}
                        <td>
                            {{-- Tombol Hapus --}}
                            <form action="{{ route('absensi.destroy', $item->id) }}" 
                                  method="POST" 
                                  onsubmit="return confirm('Yakin ingin menghapus data ini?')" 
                                  style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">Belum ada data absensi.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>

@endsection
