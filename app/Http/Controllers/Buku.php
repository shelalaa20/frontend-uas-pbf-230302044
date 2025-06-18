<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Buku extends Controller
{
    // Alamat API yang digunakan untuk mengakses data buku
    protected $api = 'http://localhost:8080/buku';

    // Menampilkan data buku (bisa dengan pencarian keyword)
    public function index(Request $request)
    {
        // Ambil semua data dari API
        $response = Http::get($this->api);
        $data = $response->json();

        // Ambil input pencarian dari query string (?q=...)
        $keyword = $request->input('q');

        // Jika keyword ada, filter data berdasarkan nama atau npm
        // if ($keyword) {
        //     $data = array_filter($data, function ($item) use ($keyword) {
        //         return stripos($item['nama_mhs'], $keyword) !== false || 
        //                stripos($item['id'], $keyword) !== false;
        //     });
        // }

        // Kirim data ke view
        return view('buku.index', ['buku' => $data]);
    }

    // Menampilkan form tambah data
    public function create()
    {
        return view('buku.create');
    }

    // Menyimpan data buku baru ke API
    public function store(Request $request)
    {
        // Kirim data POST ke API
        $response = Http::post($this->api, $request->all());

        // Jika berhasil, redirect ke halaman utama
        if ($response->successful()) {
            return redirect('/buku')->with('success', 'Data berhasil ditambahkan');
        } else {
            // Jika gagal, tampilkan error dan kembalikan input sebelumnya
            return back()->withErrors([
                'status' => $response->status(),
                'message' => 'Gagal menyimpan data.',
                'response' => $response->body()
            ])->withInput();
        }
    }

    // Menampilkan form edit data berdasarkan ID
    public function edit($id)
    {
        // Ambil data buku berdasarkan ID dari API
        $response = Http::get("http://localhost:8080/buku/$id");
        $result = $response->json();

        // Tampilkan form edit dengan data yang sudah ada
        return view('buku.edit', [
            'buku' => $result['data'] // ambil hanya bagian 'data'
        ]);
    }

    // Mengupdate data buku berdasarkan npm
    public function update(Request $request, $id)
    {
        // Kirim data PUT ke API
        $response = Http::put("{$this->api}/{$id}", $request->all());

        // Jika berhasil, redirect ke halaman utama
        if ($response->successful()) {
            return redirect('/buku')->with('success', 'Data berhasil diupdate');
        } else {
            // Jika gagal, tampilkan error dan kembalikan input sebelumnya
            return back()->withErrors([
                'status' => $response->status(),
                'message' => 'Gagal mengupdate data.',
                'response' => $response->body()
            ])->withInput();
        }
    }

    // Menghapus data buku berdasarkan npm
    public function destroy($id)
    {
        // Kirim request DELETE ke API
        $response = Http::delete("{$this->api}/{$id}");

        // Jika berhasil, kembali ke halaman utama
        if ($response->successful()) {
            return redirect('/buku')->with('success', 'Data berhasil dihapus');
        } else {
            // Jika gagal, tampilkan error
            return back()->withErrors([
                'status' => $response->status(),
                'message' => 'Gagal menghapus data.',
                'response' => $response->body()
            ]);
        }
    }
}