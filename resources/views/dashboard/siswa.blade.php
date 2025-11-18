@extends('layouts.main')

@section('content')
<div class="content">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Dashboard Admin</h2>
            <p class="text-muted mb-0">Selamat datang, {{ auth()->user()->name }}</p>
        </div>

        <!-- Tombol Logout -->
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn btn-danger">
                <i class="bi bi-box-arrow-right"></i> Logout
            </button>
        </form>
    </div>

    <!-- Statistik -->
    <div class="row g-4">

        <div class="col-md-4">
            <div class="card shadow border-0 p-4 text-center h-100">
                <h6 class="text-muted mb-1">Total Siswa PKL</h6>
                <h2 class="fw-bold text-primary">{{ $totalSiswa }}</h2>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow border-0 p-4 text-center h-100">
                <h6 class="text-muted mb-1">Hadir Hari Ini</h6>
                <h2 class="fw-bold text-success">{{ $hadirHariIni }}</h2>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow border-0 p-4 text-center h-100">
                <h6 class="text-muted mb-1">Terlambat</h6>
                <h2 class="fw-bold text-danger">{{ $terlambatHariIni }}</h2>
            </div>
        </div>

    </div>

    <!-- Tabel Riwayat -->
    <div class="mt-5">
        <h4 class="fw-bold mb-3">Riwayat Absensi Hari Ini</h4>

        <div class="card shadow border-0 p-3">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th>Nama</th>
                            <th>Jam Masuk</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($absensiHariIni as $absen)
                            <tr>
                                <td>{{ $absen->siswa->nama }}</td>
                                <td>{{ \Carbon\Carbon::parse($absen->jam_masuk)->format('H:i') }}</td>
                                <td>
                                    @if($absen->keterangan === 'Hadir')
                                        <span class="badge bg-success">Hadir</span>
                                    @elseif($absen->keterangan === 'Terlambat')
                                        <span class="badge bg-warning text-dark">Terlambat</span>
                                    @else
                                        <span class="badge bg-secondary">{{ $absen->keterangan }}</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">Belum ada absensi hari ini</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
