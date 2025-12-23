<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Absensi</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f1f5fb;
        }
        .sidebar {
            height: 100vh;
            background: #0d6efd;
            color: white;
            padding: 20px;
            position: fixed;
            width: 250px;
        }
        .sidebar a, .sidebar button {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px 15px;
            margin-bottom: 10px;
            border-radius: 5px;
            transition: background 0.3s;
            width: 100%;
            text-align: left;
            border: none;
            background: transparent;
        }
        .sidebar a:hover, .sidebar button:hover {
            background: rgba(255,255,255,0.2);
            cursor: pointer;
        }
        .content {
            margin-left: 270px;
            padding: 30px;
        }
        .card-stat {
            transition: transform 0.2s;
        }
        .card-stat:hover {
            transform: translateY(-5px);
        }
        form.logout-form {
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h3 class="fw-bold mb-4">AbsensiKu</h3>

        <a href="{{ route('dashboard') }}">📊 Dashboard</a>
        <a href="/absensi">📝 Absen Masuk</a>
        <a href="/siswa">👥 Data Siswa</a>
        <a href="absen_pulang">📄 Absen Pulang</a>

        <hr class="border-light">

        <!-- FIX LOGOUT → HARUS POST -->
        <form action="{{ route('logout') }}" method="POST" class="logout-form">
            @csrf
            <button type="submit">🚪 Logout</button>
        </form>
    </div>

    <!-- Content -->
    <div class="content">
        <h2 class="fw-bold mb-2">Dashboard</h2>
        <p class="text-muted">Selamat datang di sistem absensi.</p>

        <!-- Statistik -->
        <div class="row mt-4 g-3">
            <div class="col-md-4">
                <div class="card p-4 shadow-sm card-stat">
                    <h6 class="text-muted">Total Siswa PKL</h6>
                    <h2 class="text-primary fw-bold">{{ $totalSiswa }}</h2>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-4 shadow-sm card-stat">
                    <h6 class="text-muted">Hadir Hari Ini</h6>
                    <h2 class="text-success fw-bold">{{ $hadirHariIni }}</h2>
                </div>
            </div>
        </div>

        <!-- Riwayat Absensi -->
        <div class="mt-5">
            <h4 class="fw-bold mb-3">Riwayat Absensi Hari Ini</h4>

            <div class="table-responsive bg-white rounded shadow-sm p-3">
                <table class="table table-bordered table-hover align-middle mb-0">
                    <thead class="table-primary">
                        <tr>
                            <th>Nama</th>
                            <th>Waktu Masuk</th>
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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
