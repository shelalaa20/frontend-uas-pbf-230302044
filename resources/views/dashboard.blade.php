<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            display: flex;
        }
        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: white;
            min-height: 100vh;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 12px;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .content {
            flex-grow: 1;
            padding: 20px;
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <h4 class="text-center py-3 border-bottom">Mahasiswa App</h4>
        <a href="{{ url('/dashboard') }}">🏠 Home</a>
        <a href="{{ url('/mahasiswa') }}">🎓 Data Mahasiswa</a>
        <a href="{{ url('/pembimbing') }}">🎓 Data Pembimbing</a>
        <a href="{{ url('/logout') }}" onclick="return confirm('Yakin ingin logout?')">🔓 Logout</a>
    </div>

    <div class="container text-center">
        <h2 class="fw-bold mb-4">Dashboard Sistem Magang</h2>
        <div class="row justify-content">
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Total Mahasiswa</h5>
                        <h3 class="fw-bold text-success">{{ $jumlahMahasiswa }}</h3>
                    </div>
                </div>
            </div>
            KALO NAMBAHIN LAGI DISINI
            
        </div>
    </div>
        </nav>

        @yield('content')
    </div>

</body>
</html>

