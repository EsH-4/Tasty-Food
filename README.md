# 🍽️ TastyFood

Website perusahaan kuliner berbasis Laravel dengan panel admin untuk mengelola berita, galeri, dan pesan kontak.

![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?style=flat-square&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat-square&logo=php)
![Tailwind CSS](https://img.shields.io/badge/Tailwind-4-38B2AC?style=flat-square&logo=tailwind-css)
![Vite](https://img.shields.io/badge/Vite-6-646CFF?style=flat-square&logo=vite)
![License](https://img.shields.io/badge/License-MIT-green?style=flat-square)

---

## 📖 Tentang Proyek

**TastyFood** adalah aplikasi web company profile untuk bisnis kuliner. Situs menampilkan berita, galeri foto, halaman tentang kami, dan formulir kontak. Admin dapat mengelola seluruh konten melalui panel yang aman dengan fitur soft delete dan trash management.

### Fitur Utama

**Frontend (Publik)**
- 🏠 **Beranda** — Landing page dengan informasi utama
- 📰 **Berita** — Daftar artikel & detail berita
- 🖼️ **Galeri** — Galeri foto
- 📞 **Kontak** — Formulir kirim pesan & info kontak
- ℹ️ **Tentang** — Halaman tentang perusahaan

**Panel Admin**
- 🔐 Login admin
- 📊 Dashboard
- 📝 CRUD Berita (create, read, update, delete)
- 🖼️ CRUD Galeri
- ⚙️ Pengaturan informasi kontak (alamat, email, telepon)
- 📬 Manajemen pesan dari formulir kontak
- 🗑️ Trash — Restore atau hapus permanen item yang di-soft delete

---

## 🛠️ Tech Stack

| Kategori    | Teknologi        |
|------------|------------------|
| Backend    | Laravel 12, PHP 8.2+ |
| Frontend   | Blade, Tailwind CSS 4, Bootstrap 5, SASS |
| Build      | Vite 6           |
| Database   | MySQL / SQLite (sesuai konfigurasi) |

---

## 📋 Persyaratan

- **PHP** ≥ 8.2
- **Composer** 2.x
- **Node.js** ≥ 18 (untuk Vite & npm)
- **Database** MySQL 8+ atau SQLite

---

## 🚀 Instalasi

### 1. Clone repositori

```bash
git clone https://github.com/USERNAME/tastyfood.git
cd tastyfood
```

### 2. Install dependensi PHP

```bash
composer install
```

### 3. Environment

```bash
cp .env.example .env
php artisan key:generate
```

Edit `.env` dan sesuaikan:
- `DB_CONNECTION`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD` (jika pakai MySQL)
- Atau gunakan SQLite dengan `DB_CONNECTION=sqlite` dan pastikan file `database/database.sqlite` ada

### 4. Database

```bash
php artisan migrate
# (Opsional) seed data awal:
# php artisan db:seed
```

### 5. Install dependensi Node & build assets

```bash
npm install
npm run build
```

### 6. Jalankan aplikasi

**Development (server + queue + logs + Vite):**
```bash
composer run dev
```

Atau jalankan terpisah:

```bash
# Terminal 1 — Laravel
php artisan serve

# Terminal 2 — Vite (untuk hot reload assets)
npm run dev
```

Akses:
- **Website:** http://localhost:8000  
- **Admin:** http://localhost:8000/admin/login  

---

## 📁 Struktur Proyek (Ringkas)

```
tastyfood-new/
├── app/Http/Controllers/
│   ├── Admin/           # Controller panel admin
│   ├── HomeController.php
│   ├── BeritaController.php
│   ├── GaleriController.php
│   ├── FrontendBeritaController.php
│   └── FrontendGaleriController.php
├── resources/views/
│   ├── layouts/         # Layout utama & partial (navbar, footer)
│   ├── admin/           # View panel admin
│   ├── home.blade.php
│   ├── tentang.blade.php
│   ├── kontak.blade.php
│   ├── berita.blade.php
│   ├── berita-detail.blade.php
│   └── galeri.blade.php
├── routes/web.php       # Rute web & admin
├── package.json         # Vite, Tailwind, Bootstrap, SASS
└── composer.json        # Laravel & PHP dependencies
```

---

## 🔗 Rute Penting

| URL                    | Keterangan        |
|------------------------|-------------------|
| `/`                    | Beranda           |
| `/berita`              | Daftar berita     |
| `/berita/{slug}`       | Detail berita     |
| `/galeri`              | Galeri            |
| `/kontak`              | Kontak            |
| `/tentang`             | Tentang kami      |
| `/admin/login`         | Login admin       |
| `/admin/dashboard`     | Dashboard admin   |

---

## 📄 Lisensi

Proyek ini menggunakan lisensi [MIT](https://opensource.org/licenses/MIT).

---

## 👤 Kontak

- **Email:** mzam.ibrahimovic@gmail.com

Jika Anda menggunakan proyek ini, silakan beri credit atau link ke repositori ini.
