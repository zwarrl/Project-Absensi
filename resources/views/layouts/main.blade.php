<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Absensi' }}</title>

    <!-- Bootstrap -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <style>
        body {
            background: #f2f2f2;
        }
        .navbar-brand {
            font-weight: bold;
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="/absensi">ABSENSI</a>

            <!-- Tombol Dashboard -->
            <a href="/dashboard" class="btn btn-light">Dashboard</a>
        </div>
    </nav>

    <!-- CONTENT WRAPPER -->
    <div class="container">
        @yield('content')
    </div>

</body>
</html>
