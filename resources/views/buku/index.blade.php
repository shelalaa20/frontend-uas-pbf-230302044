@extends('layouts.app') {{-- Memanggil layout utama --}}

@section('content') {{-- Mulai bagian konten yang akan ditampilkan di layout --}}
    {{-- Header dan tombol tambah --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold">Daftar buku</h4>
        <a href="{{ url('/buku/create') }}" class="btn btn-success">+ Tambah buku</a>
    </div>

    {{-- Notifikasi jika berhasil menyimpan / update / hapus --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Form pencarian buku --}}git
    <form method="GET" action="{{ url('/buku') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Cari nama atau NPM..." value="{{ request('q') }}">
            <button class="btn btn-primary">Cari</button>
        </div>
    </form>

    {{-- Tabel daftar buku --}}
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Pengarang</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($buku as $buku) {{-- Perulangan data buku --}}
                    <tr>
                        <td>{{ $buku['id'] }}</td>
                        <td>{{ $buku['judul'] }}</td>
                        <td>{{ $buku['pengarang'] }}</td>
                        <td>{{ $buku['penerbit'] }}</td>
                        <td>{{ $buku['tahun_terbit'] }}</td>
                        <td class="text-center">
                            {{-- Tombol Edit --}}
                            <a href="{{ url('/buku/' . $buku['id'] . '/edit') }}" class="btn btn-warning btn-sm me-1">Edit</a>

                            {{-- Tombol Hapus --}}
                            <form action="{{ url('/buku/' . $buku['id']) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin hapus?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="text-center">Belum ada data.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection {{-- Akhir section konten --}}