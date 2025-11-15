<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi - Home</title>

    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">AbsensiKu</a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="py-5 bg-white shadow-sm">
        <div class="container text-center">
            <h1 class="display-5 fw-bold text-primary">Sistem Absensi Online</h1>
            <p class="lead mt-3">
                Catat kehadiran dengan cepat, mudah, dan akurat.
            </p>

            <!-- Tombol menuju halaman login -->
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg mt-3">Masuk halaman login</a>
        </div>
    </section>

    <!-- Content Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Fitur Sistem Absensi</h2>

            <div class="row g-4 text-center">
                <div class="col-md-4">
                    <div class="p-4 border rounded bg-white shadow-sm">
                        <img src="https://img.icons8.com/fluency/48/attendance.png" alt="icon" />
                        <h4 class="mt-3">Absensi Online</h4>
                        <p>Pengguna dapat melakukan presensi secara online dengan mudah.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="p-4 border rounded bg-white shadow-sm">
                        <img src="https://img.icons8.com/fluency/48/report-card.png" alt="icon" />
                        <h4 class="mt-3">Rekap Otomatis</h4>
                        <p>Data absensi otomatis direkap harian, mingguan, dan bulanan.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="p-4 border rounded bg-white shadow-sm">
                        <img src="https://img.icons8.com/fluency/48/analytics.png" alt="icon" />
                        <h4 class="mt-3">Laporan Lengkap</h4>
                        <p>Admin dapat melihat laporan kehadiran secara real-time.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-primary text-white text-center py-3 mt-5">
        <p class="mb-0">© {{ date('Y') }} AbsensiKu. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
