# Sistem Aset (SistemSet13)

Sistem Manajemen Aset adalah aplikasi berbasis web untuk mengelola aset tetap organisasi, termasuk kategori aset, lokasi, mutasi aset, dan pelaporan.

## Fitur

- **Manajemen Kategori Aset** - CRUD kategori aset dengan keterangan
- **Manajemen Lokasi** - CRUD lokasi penyimpanan aset
- **Manajemen Aset** - CRUD aset dengan informasi kode, nilai, kondisi, dan tanggal perolehan
- **Mutasi Aset** - Pencatatan perpindahan aset antar lokasi
- **Laporan** - Laporan aset berdasarkan kategori, lokasi, dan mutasi
- **API Documentation** - Dokumentasi API interaktif dengan Swagger UI (Scramble)
- **Role & Permission** - Sistem autentikasi dan otorisasi dengan Spatie Laravel Permission
- **Export Excel** - Ekspor laporan ke format Excel

## Tech Stack

- **Framework**: Laravel 13
- **Database**: SQLite (default), support MySQL/PostgreSQL
- **API Docs**: Scramble (OpenAPI/Swagger)
- **Auth**: Laravel Sanctum + Spatie Permission
- **Frontend**: Bootstrap 5 + Tabler

## Requirements

- PHP 8.3+
- Composer 2.x
- Node.js 18+
- SQLite / MySQL / PostgreSQL

## Instalasi dari GitHub

### 1. Clone Repository

```bash
git clone <repository-url> sistemaset13-app
cd sistemaset13-app
```

### 2. Install Dependencies

```bash
composer install
```

### 3. Setup Environment

```bash
# Copy file .env
cp .env.example .env

# Generate application key
php artisan key:generate

# Buat database SQLite (untuk development)
touch database/database.sqlite

# Atau konfigurasi database MySQL/PostgreSQL di .env
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=sistemaset13
# DB_USERNAME=root
# DB_PASSWORD=
```

### 4. Run Migrations & Seeders

```bash
php artisan migrate
php artisan db:seed
```

### 5. Install Frontend Dependencies

```bash
npm install
npm run dev
```

### 6. Jalankan Aplikasi

```bash
php artisan serve
```

Buka browser: `http://localhost:8000`

## Login Default

Setelah seeding, gunakan credential berikut:

| Role | Email | Password |
|------|-------|----------|
| Admin | admin@admin.com | password |
| User | user@user.com | password |

## API Documentation

Scramble menyediakan dokumentasi API interaktif:

- **Swagger UI**: `/docs/api`
- **OpenAPI JSON**: `/docs/api.json`

### Contoh Endpoint API

| Method | Endpoint | Deskripsi |
|--------|----------|-----------|
| GET | `/api/kategori-aset` | List kategori aset |
| POST | `/api/kategori-aset` | Tambah kategori |
| GET | `/api/kategori-aset/{id}` | Detail kategori |
| PUT/PATCH | `/api/kategori-aset/{id}` | Update kategori |
| DELETE | `/api/kategori-aset/{id}` | Hapus kategori |
| GET | `/api/lokasi` | List lokasi |
| GET | `/api/aset` | List aset |
| GET | `/api/mutasi_aset` | List mutasi aset |

## Struktur Menu

```
Dashboard
├── Master Data
│   ├── Kategori Aset
│   ├── Lokasi
│   ├── Aset
│   └── Mutasi Aset
├── Laporan
│   ├── Kategori Aset
│   ├── Lokasi Aset
│   ├── Aset
│   └── Mutasi Aset
```

## Command Useful

```bash
# Clear cache
php artisan config:clear
php artisan cache:clear
php artisan route:clear

# Fresh migration & seed
php artisan migrate:fresh --seed

# List routes
php artisan route:list

# Serve dengan custom port
php artisan serve --port=8080
```

## License

MIT License 
