<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>

    {{-- Import Bootstrap dari CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Styling untuk layout dashboard --}}
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

    {{-- Sidebar navigasi --}}
    <div class="sidebar">
        <h4 class="text-center py-3 border-bottom">Mahasiswa App</h4>
        <a href="{{ url('/dashboard') }}">🏠 Home</a>
        <a href="{{ url('/mahasiswa') }}">🎓 Data Mahasiswa</a>
        <a href="{{ url('/logout') }}" onclick="return confirm('Yakin ingin logout?')">🔓 Logout</a>
    </div>

    {{-- Konten utama --}}
    <div class="content">
        {{-- Navbar bagian atas --}}
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
            <div class="container-fluid">
                <span class="navbar-brand">Selamat Datang</span>
                {{-- Tombol logout di navbar telah dihapus --}}
            </div>
        </nav>

        {{-- Slot konten dinamis dari setiap halaman --}}
        @yield('content')
    </div>

</body>
</html>
