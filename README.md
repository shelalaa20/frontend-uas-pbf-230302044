# Frontend UAS PBF - Laravel Project

Ini adalah project Laravel untuk frontend Ujian Akhir Semester (UAS) mata kuliah Pemrograman Berbasis Framework.

## 📦 Instalasi

Pastikan kamu sudah menginstal:
- PHP ≥ 8.1
- Composer
- Laravel
Pastikan kamu sudah memiliki file backend

# Cara Menjalankan Project dengan mengeclone repository
### 1. Clone repository
```bash
git clone https://github.com/shelalaa20/frontend-uas-pbf-230302044.git
cd frontend-uas-pbf-230302044
```
### 2. Install dependency Laravel
```bash
composer install
```

### 🚀 Menjalankan Project
```bash
php artisan serve
```

## Cara membuat Project Laravel

### 1. Membuat project Laravel 10
```bash
composer create-project laravel/laravel:^10 nama-project
cd nama-project
php artisan serve
```
🌐 Cek di browser http://127.0.0.1:8000 apakah halaman Laravel muncul.

### 2. Ubah konfigurasi file .env
```env
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:T+WJmbMPQ/755CfG45DXIIacwCOrLCFbE+eIC3mbwOQ=
APP_DEBUG=true
APP_URL=http://localhost/8000
```

Matikan pengaturan database sementara:
```env
LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=laravel
# DB_USERNAME=root
# DB_PASSWORD=
```

### 3. Membuat Controller
```bash
php artisan make:controller NamaController
```
### 4. Tambahkan route di `routes/web.php`
Contoh:
```php
use App\Http\Controllers\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'index']);
```

## 5. Buat Dashboard
### buat controller dashboard
```bash
php artisan make:controller DashboardController
```

### 📄 File: resources/views/layouts/app.blade.php
Berisi kerangka dasar HTML layout utama seperti header, sidebar, dan yield content.

### 📄 File: resources/views/dashboard.blade.php
Berisi tampilan awal dashboard yang ditampilkan setelah login.

## 6. Membuat tampilan (Views)
Masing-masing tabel memiliki folder sendiri di dalam `resources/views`. Setiap folder terdiri dari:
- `index.blade.php` untuk menampilkan daftar data.
- `create.blade.php` untuk menampilkan form tambah data.
- `edit.blade.php` untuk menampilkan form edit data.

Contoh untuk entitas `buku`:
- `resources/views/buku/index.blade.php`
- `resources/views/buku/create.blade.php`
- `resources/views/buku/edit.blade.php`
