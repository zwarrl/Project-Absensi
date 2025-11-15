@extends('layouts.main')

@section('content')

<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h4>Data Siswa</h4>
    </div>

    <div class="card-body">

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="/siswa/create" class="btn btn-primary mb-3">+ Tambah Siswa</a>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-primary">
                    <tr>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Jenis Kelamin</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $item)
                        <tr>
                            <td>{{ $item->nis }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->kelas}}</td>
                            <td>{{ $item->jurusan}}</td>
                            <td>
                                @if($item->jenis_kelamin == 'L')
                                    Laki-laki
                                @elseif($item->jenis_kelamin == 'P')
                                    Perempuan
                                @else
                                    -
                                @endif
                            </td>
                            <td class="d-flex gap-1">
                                <a href="/siswa/{{ $item->nis }}/edit" class="btn btn-warning btn-sm">Edit</a>

                                <form action="/siswa/{{ $item->nis }}" method="POST" onsubmit="return confirm('Hapus siswa ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">Belum ada data.</td>
                        </tr>
                        
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>

@endsection
