# 🧺 E-Laundry Management System

> Sistem Manajemen Laundry berbasis Web dengan PHP 8, MySQL, dan AdminLTE 3

![PHP Version](https://img.shields.io/badge/PHP-8.0+-777BB4?style=flat-square&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=flat-square&logo=mysql&logoColor=white)
![AdminLTE](https://img.shields.io/badge/AdminLTE-3.2-3C8DBC?style=flat-square)
![License](https://img.shields.io/badge/License-MIT-green?style=flat-square)

---

## 📋 Daftar Isi

- [Tentang Proyek](#-tentang-proyek)
- [Fitur Utama](#-fitur-utama)
- [Teknologi yang Digunakan](#-teknologi-yang-digunakan)
- [Persyaratan Sistem](#-persyaratan-sistem)
- [Instalasi](#-instalasi)
- [Konfigurasi](#-konfigurasi)
- [Struktur Proyek](#-struktur-proyek)
- [Penggunaan](#-penggunaan)
- [Database Schema](#-database-schema)
- [API Routes](#-api-routes)
- [Akun Default](#-akun-default)
- [Screenshot](#-screenshot)
- [Kontributor](#-kontributor)
- [Lisensi](#-lisensi)

---

## 📖 Tentang Proyek

**E-Laundry Management System** adalah aplikasi web untuk mengelola operasional bisnis laundry. Sistem ini dibangun menggunakan arsitektur **MVC (Model-View-Controller)** murni tanpa framework, sehingga cocok untuk pembelajaran dan pengembangan lebih lanjut.

Aplikasi ini dikembangkan sebagai **Tugas UAS Kelompok 7** untuk mata kuliah Database.

### Tujuan Proyek:
- Mempermudah pengelolaan transaksi laundry
- Mencatat data pelanggan secara terstruktur
- Mengelola paket layanan dan harga
- Memberikan kemampuan pelacakan status laundry
- Menerapkan sistem promo dan diskon

---

## ✨ Fitur Utama

### 🔐 Autentikasi & Otorisasi
- Login dengan username dan password
- Dua level akses: **Admin** dan **Kasir**
- Proteksi halaman dengan session management
- CSRF protection untuk form submission

### 📊 Dashboard
- Ringkasan statistik transaksi
- Jumlah transaksi per status
- Total pendapatan
- Grafik dan visualisasi data

### 💰 Manajemen Transaksi
- **Buat transaksi baru** dengan multiple items
- **Pilih pelanggan** atau tambah pelanggan baru
- **Pilih paket layanan** (per kg atau satuan)
- **Aplikasi kode promo** untuk diskon
- **Update status** transaksi (Baru → Dicuci → Disetrika → Siap Ambil → Selesai)
- **Cetak struk/nota** transaksi
- **Hapus transaksi**

### 👥 Manajemen Pelanggan
- Tambah, edit, dan hapus data pelanggan
- Informasi: nama, nomor telepon, alamat
- Riwayat transaksi per pelanggan

### 📦 Manajemen Paket Layanan
- Dua tipe paket: **Per Kilogram** dan **Satuan**
- Pengaturan harga per item
- Aktivasi/nonaktifkan paket
- Deskripsi layanan

### 🏷️ Manajemen Promo
- Buat kode promo/diskon
- Tipe diskon: **Persentase** atau **Nominal Tetap**
- Minimum pembelian
- Maksimum diskon (untuk tipe persentase)
- Periode berlaku promo

### 🔍 Pelacakan Laundry (Public)
- Halaman publik untuk pelanggan melacak status laundry
- Input kode invoice untuk melihat progress
- Tidak memerlukan login

### 👤 Manajemen User (Admin Only)
- Tambah, edit, dan hapus user
- Atur role: Admin atau Kasir
- Aktivasi/nonaktifkan akun

---

## 🛠️ Teknologi yang Digunakan

| Kategori | Teknologi |
|----------|-----------|
| **Backend** | PHP 8.0+ |
| **Database** | MySQL 8.0 / MariaDB 10.4+ |
| **Frontend** | HTML5, CSS3, JavaScript |
| **UI Framework** | AdminLTE 3.2 |
| **CSS Framework** | Bootstrap 4.6 |
| **Icons** | Font Awesome 6.4 |
| **Fonts** | Google Fonts (Inter) |
| **DataTables** | DataTables 1.13 |
| **Alert/Dialog** | SweetAlert2 |
| **Select** | Select2 |
| **Server** | Apache (XAMPP) |

---

## 💻 Persyaratan Sistem

- **XAMPP** versi 8.0+ (atau setara)
  - PHP 8.0 atau lebih tinggi
  - MySQL 8.0 / MariaDB 10.4+
  - Apache 2.4+
- **Web Browser** modern (Chrome, Firefox, Edge, Safari)
- **RAM** minimal 2GB
- **Storage** minimal 100MB

---

## 📥 Instalasi

### Langkah 1: Download & Extract

1. Clone atau download repository ini
2. Extract ke folder `htdocs` XAMPP Anda:
   ```
   C:\xampp\htdocs\uas_kel7_database
   ```

### Langkah 2: Jalankan XAMPP

1. Buka **XAMPP Control Panel**
2. Start modul **Apache**
3. Start modul **MySQL**

### Langkah 3: Buat Database

1. Buka browser dan akses **phpMyAdmin**:
   ```
   http://localhost/phpmyadmin
   ```

2. Buat database baru dengan nama `elaundry`:
   - Klik **"New"** di sidebar kiri
   - Nama database: `elaundry`
   - Collation: `utf8mb4_unicode_ci`
   - Klik **"Create"**

### Langkah 4: Import Database

1. Pilih database `elaundry` yang baru dibuat
2. Klik tab **"Import"**
3. Klik **"Choose File"** dan pilih file:
   ```
   C:\xampp\htdocs\uas_kel7_database\database.sql
   ```
4. Klik **"Go"** untuk mengimport

### Langkah 5: Konfigurasi Database

1. Buka file `config/database.php`
2. Sesuaikan konfigurasi jika diperlukan:
   ```php
   return [
       'host'     => 'localhost',
       'database' => 'elaundry',
       'username' => 'root',
       'password' => '',  // Kosongkan untuk XAMPP default
       'charset'  => 'utf8mb4',
   ];
   ```

### Langkah 6: Akses Aplikasi

Buka browser dan akses:
```
http://localhost/uas_kel7_database/index.php
```

---

## ⚙️ Konfigurasi

### File Konfigurasi Database

**Lokasi:** `config/database.php`

```php
<?php
return [
    'host'      => 'localhost',     // Host database
    'database'  => 'elaundry',      // Nama database
    'username'  => 'root',          // Username MySQL
    'password'  => '',              // Password MySQL
    'charset'   => 'utf8mb4',       // Character set
    'collation' => 'utf8mb4_unicode_ci',
    'options'   => [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ]
];
```

### Pengaturan Aplikasi

Pengaturan aplikasi disimpan di tabel `settings` dalam database:

| Key | Keterangan | Default |
|-----|------------|---------|
| `app_name` | Nama aplikasi | Laundry Tunas Bangsa |
| `company_name` | Nama perusahaan | Laundry Tunas Bangsa |
| `company_address` | Alamat perusahaan | Jl. Contoh No. 123, Kota |
| `company_phone` | Nomor telepon | 08123456789 |
| `estimation_days` | Estimasi hari pengerjaan | 2 |

---

## 📁 Struktur Proyek

```
uas_kel7_database/
├── config/
│   └── database.php          # Konfigurasi database
│
├── controllers/
│   ├── AdminController.php    # Controller admin settings
│   ├── AuthController.php     # Controller autentikasi
│   ├── CustomerController.php # Controller pelanggan
│   ├── DashboardController.php# Controller dashboard
│   ├── PackageController.php  # Controller paket layanan
│   ├── PromoController.php    # Controller promo
│   ├── TrackingController.php # Controller pelacakan
│   ├── TransactionController.php # Controller transaksi
│   └── UserController.php     # Controller user management
│
├── core/
│   ├── App.php               # Router/front controller
│   ├── Controller.php        # Base controller class
│   ├── Database.php          # Database connection (PDO)
│   └── Session.php           # Session management
│
├── models/
│   ├── Customer.php          # Model pelanggan
│   ├── Package.php           # Model paket layanan
│   ├── Promo.php             # Model promo
│   ├── Setting.php           # Model pengaturan
│   ├── Transaction.php       # Model transaksi
│   └── User.php              # Model user
│
├── views/
│   ├── auth/
│   │   └── login.php         # Halaman login
│   ├── customers/
│   │   ├── create.php        # Form tambah pelanggan
│   │   ├── edit.php          # Form edit pelanggan
│   │   └── index.php         # Daftar pelanggan
│   ├── dashboard/
│   │   └── index.php         # Halaman dashboard
│   ├── layouts/
│   │   ├── admin.php         # Layout admin panel
│   │   ├── auth.php          # Layout halaman auth
│   │   ├── print.php         # Layout cetak struk
│   │   └── public.php        # Layout halaman publik
│   ├── packages/
│   │   ├── create.php        # Form tambah paket
│   │   ├── edit.php          # Form edit paket
│   │   └── index.php         # Daftar paket
│   ├── promos/
│   │   ├── create.php        # Form tambah promo
│   │   ├── edit.php          # Form edit promo
│   │   └── index.php         # Daftar promo
│   ├── tracking/
│   │   ├── index.php         # Form lacak laundry
│   │   └── result.php        # Hasil pelacakan
│   ├── transactions/
│   │   ├── create.php        # Form transaksi baru
│   │   ├── index.php         # Daftar transaksi
│   │   ├── print.php         # Struk/nota print
│   │   └── show.php          # Detail transaksi
│   └── users/
│       ├── create.php        # Form tambah user
│       ├── edit.php          # Form edit user
│       └── index.php         # Daftar user
│
├── .htaccess                 # Apache configuration
├── .gitignore                # Git ignore rules
├── database.sql              # SQL schema & seed data
├── fix_password.php          # Helper reset password
├── index.php                 # Entry point aplikasi
├── test_connection.php       # Test koneksi database
└── README.md                 # Dokumentasi (file ini)
```

---

## 📖 Penggunaan

### Login ke Sistem

1. Akses halaman login:
   ```
   http://localhost/uas_kel7_database/index.php
   ```
2. Masukkan username dan password
3. Klik **"Masuk"**

### Membuat Transaksi Baru

1. Klik menu **"Transaksi Baru"** di sidebar
2. Pilih atau tambah pelanggan baru
3. Tambahkan item laundry:
   - Pilih paket layanan
   - Masukkan jumlah (kg atau pcs)
   - Klik **"Tambah"**
4. (Opsional) Masukkan kode promo
5. Klik **"Simpan Transaksi"**
6. Cetak struk jika diperlukan

### Update Status Transaksi

1. Buka menu **"Daftar Transaksi"**
2. Klik tombol **"Lihat"** pada transaksi
3. Klik tombol **"Next Status"** untuk update ke status berikutnya

**Alur Status:**
```
Baru → Dicuci → Disetrika → Siap Ambil → Selesai
```

### Pelacakan Laundry (untuk Pelanggan)

1. Akses halaman tracking:
   ```
   http://localhost/uas_kel7_database/index.php?url=tracking
   ```
2. Masukkan **Kode Invoice** (contoh: INV-20260101-0001)
3. Klik **"Lacak"**
4. Lihat status dan progress laundry

---

## 🗄️ Database Schema

### Tabel `users`
Menyimpan data pengguna sistem (Admin & Kasir)

| Kolom | Tipe | Keterangan |
|-------|------|------------|
| id | INT UNSIGNED | Primary Key, Auto Increment |
| username | VARCHAR(50) | Username untuk login |
| password | VARCHAR(255) | Password (hashed bcrypt) |
| name | VARCHAR(100) | Nama lengkap |
| role | ENUM | 'admin' atau 'kasir' |
| is_active | TINYINT(1) | Status aktif |
| created_at | DATETIME | Tanggal dibuat |
| updated_at | DATETIME | Tanggal diupdate |

### Tabel `customers`
Menyimpan data pelanggan

| Kolom | Tipe | Keterangan |
|-------|------|------------|
| id | INT UNSIGNED | Primary Key |
| name | VARCHAR(100) | Nama pelanggan |
| phone | VARCHAR(20) | Nomor telepon |
| address | TEXT | Alamat |
| created_at | DATETIME | Tanggal dibuat |
| updated_at | DATETIME | Tanggal diupdate |

### Tabel `packages`
Menyimpan data paket layanan laundry

| Kolom | Tipe | Keterangan |
|-------|------|------------|
| id | INT UNSIGNED | Primary Key |
| name | VARCHAR(100) | Nama paket |
| type | ENUM | 'kg' atau 'satuan' |
| price | DECIMAL(12,2) | Harga |
| description | TEXT | Deskripsi |
| is_active | TINYINT(1) | Status aktif |
| created_at | DATETIME | Tanggal dibuat |
| updated_at | DATETIME | Tanggal diupdate |

### Tabel `promos`
Menyimpan data kode promo/diskon

| Kolom | Tipe | Keterangan |
|-------|------|------------|
| id | INT UNSIGNED | Primary Key |
| code | VARCHAR(50) | Kode promo (unik) |
| name | VARCHAR(100) | Nama promo |
| discount_type | ENUM | 'percent' atau 'fixed' |
| discount_value | DECIMAL(12,2) | Nilai diskon |
| min_purchase | DECIMAL(12,2) | Minimum pembelian |
| max_discount | DECIMAL(12,2) | Maksimum diskon |
| valid_from | DATE | Tanggal mulai berlaku |
| valid_until | DATE | Tanggal berakhir |
| is_active | TINYINT(1) | Status aktif |
| created_at | DATETIME | Tanggal dibuat |
| updated_at | DATETIME | Tanggal diupdate |

### Tabel `transactions`
Menyimpan data transaksi

| Kolom | Tipe | Keterangan |
|-------|------|------------|
| id | INT UNSIGNED | Primary Key |
| invoice_code | VARCHAR(50) | Kode invoice (unik) |
| customer_id | INT UNSIGNED | Foreign Key ke customers |
| user_id | INT UNSIGNED | Foreign Key ke users |
| promo_id | INT UNSIGNED | Foreign Key ke promos (nullable) |
| subtotal | DECIMAL(12,2) | Subtotal sebelum diskon |
| discount | DECIMAL(12,2) | Total diskon |
| total | DECIMAL(12,2) | Total akhir |
| status | ENUM | Status transaksi |
| entry_date | DATETIME | Tanggal masuk |
| estimated_date | DATETIME | Estimasi selesai |
| completed_date | DATETIME | Tanggal selesai (nullable) |
| notes | TEXT | Catatan |
| created_at | DATETIME | Tanggal dibuat |
| updated_at | DATETIME | Tanggal diupdate |

**Status Transaksi:**
- `baru` - Laundry baru diterima
- `dicuci` - Sedang dalam proses pencucian
- `disetrika` - Sedang disetrika
- `siap_ambil` - Sudah siap diambil
- `selesai` - Sudah diambil pelanggan

### Tabel `transaction_items`
Menyimpan detail item transaksi

| Kolom | Tipe | Keterangan |
|-------|------|------------|
| id | INT UNSIGNED | Primary Key |
| transaction_id | INT UNSIGNED | Foreign Key ke transactions |
| package_id | INT UNSIGNED | Foreign Key ke packages |
| quantity | DECIMAL(10,2) | Jumlah |
| price | DECIMAL(12,2) | Harga satuan |
| subtotal | DECIMAL(12,2) | Subtotal item |
| created_at | DATETIME | Tanggal dibuat |

### Tabel `settings`
Menyimpan pengaturan aplikasi

| Kolom | Tipe | Keterangan |
|-------|------|------------|
| id | INT UNSIGNED | Primary Key |
| key_name | VARCHAR(100) | Nama setting (unik) |
| value | TEXT | Nilai setting |
| created_at | DATETIME | Tanggal dibuat |
| updated_at | DATETIME | Tanggal diupdate |

### Entity Relationship Diagram

```
┌─────────────┐     ┌─────────────────┐     ┌──────────────────┐
│   users     │     │  transactions   │     │    customers     │
├─────────────┤     ├─────────────────┤     ├──────────────────┤
│ id (PK)     │◄────┤ user_id (FK)    │     │ id (PK)          │
│ username    │     │ customer_id(FK) ├────►│ name             │
│ password    │     │ promo_id (FK)   │     │ phone            │
│ name        │     │ invoice_code    │     │ address          │
│ role        │     │ subtotal        │     └──────────────────┘
│ is_active   │     │ discount        │
└─────────────┘     │ total           │     ┌──────────────────┐
                    │ status          │     │     promos       │
                    │ entry_date      │     ├──────────────────┤
                    │ estimated_date  │◄────┤ id (PK)          │
                    └─────────────────┘     │ code             │
                            │               │ name             │
                            │               │ discount_type    │
                            ▼               │ discount_value   │
                    ┌─────────────────┐     │ valid_from       │
                    │transaction_items│     │ valid_until      │
                    ├─────────────────┤     └──────────────────┘
                    │ id (PK)         │
                    │ transaction_id  │     ┌──────────────────┐
                    │ package_id (FK) ├────►│    packages      │
                    │ quantity        │     ├──────────────────┤
                    │ price           │     │ id (PK)          │
                    │ subtotal        │     │ name             │
                    └─────────────────┘     │ type             │
                                            │ price            │
                                            │ is_active        │
                                            └──────────────────┘
```

---

## 🔗 API Routes

Sistem menggunakan routing berbasis query string dengan format:
```
index.php?url=controller/method/param1/param2
```

### Auth Routes
| Method | URL | Keterangan |
|--------|-----|------------|
| GET | `auth/login` | Halaman login |
| POST | `auth/authenticate` | Proses login |
| GET | `auth/logout` | Logout |

### Dashboard Routes
| Method | URL | Keterangan |
|--------|-----|------------|
| GET | `dashboard` | Halaman dashboard |

### Transaction Routes
| Method | URL | Keterangan |
|--------|-----|------------|
| GET | `transaction` | Daftar transaksi |
| GET | `transaction/create` | Form transaksi baru |
| POST | `transaction/store` | Simpan transaksi |
| GET | `transaction/show/{id}` | Detail transaksi |
| GET | `transaction/print/{id}` | Cetak struk |
| POST | `transaction/status/{id}` | Update status |
| GET | `transaction/next/{id}` | Next status |
| GET | `transaction/delete/{id}` | Hapus transaksi |

### Customer Routes
| Method | URL | Keterangan |
|--------|-----|------------|
| GET | `customer` | Daftar pelanggan |
| GET | `customer/create` | Form tambah pelanggan |
| POST | `customer/store` | Simpan pelanggan |
| GET | `customer/edit/{id}` | Form edit pelanggan |
| POST | `customer/update/{id}` | Update pelanggan |
| GET | `customer/delete/{id}` | Hapus pelanggan |

### Package Routes
| Method | URL | Keterangan |
|--------|-----|------------|
| GET | `package` | Daftar paket |
| GET | `package/create` | Form tambah paket |
| POST | `package/store` | Simpan paket |
| GET | `package/edit/{id}` | Form edit paket |
| POST | `package/update/{id}` | Update paket |
| GET | `package/delete/{id}` | Hapus paket |

### Promo Routes
| Method | URL | Keterangan |
|--------|-----|------------|
| GET | `promo` | Daftar promo |
| GET | `promo/create` | Form tambah promo |
| POST | `promo/store` | Simpan promo |
| GET | `promo/edit/{id}` | Form edit promo |
| POST | `promo/update/{id}` | Update promo |
| GET | `promo/delete/{id}` | Hapus promo |
| POST | `promo/validate` | Validasi kode promo |

### User Routes (Admin Only)
| Method | URL | Keterangan |
|--------|-----|------------|
| GET | `user` | Daftar user |
| GET | `user/create` | Form tambah user |
| POST | `user/store` | Simpan user |
| GET | `user/edit/{id}` | Form edit user |
| POST | `user/update/{id}` | Update user |
| GET | `user/delete/{id}` | Hapus user |

### Tracking Routes (Public)
| Method | URL | Keterangan |
|--------|-----|------------|
| GET | `tracking` | Halaman pelacakan |
| POST | `tracking/search` | Cari transaksi |

---

## 🔑 Akun Default

Setelah import database, tersedia akun berikut:

| Role | Username | Password | Akses |
|------|----------|----------|-------|
| Admin | `admin` | `admin123` | Full access |
| Kasir | `kasir1` | `admin123` | Limited access |

> ⚠️ **PENTING:** Segera ubah password default setelah instalasi untuk keamanan!

---

## 📸 Screenshot

### Halaman Login
Tampilan halaman login dengan desain modern dan gradient.

### Dashboard Admin
Menampilkan statistik transaksi, pendapatan, dan grafik.

### Form Transaksi Baru
Form interaktif untuk membuat transaksi laundry.

### Daftar Transaksi
Tabel transaksi dengan fitur search dan filter.

### Detail Transaksi
Menampilkan detail lengkap transaksi dengan status timeline.

### Pelacakan Laundry
Halaman publik untuk pelanggan melacak status laundry.

---

## 🐛 Troubleshooting

### Error: "Connection refused"
- Pastikan Apache dan MySQL sudah running di XAMPP
- Check port MySQL (default: 3306)

### Error: "Access denied for user 'root'@'localhost'"
- Periksa konfigurasi password di `config/database.php`
- Untuk XAMPP default, password biasanya kosong

### Error: "Table doesn't exist"
- Pastikan sudah import file `database.sql`
- Pastikan nama database benar (`elaundry`)

### Halaman tidak ditemukan (404)
- Periksa URL dengan benar
- Pastikan file `.htaccess` ada di root folder

### Session tidak bekerja
- Pastikan folder `session` di XAMPP writable
- Check konfigurasi `session.save_path` di php.ini

---

## 🔒 Keamanan

Sistem ini mengimplementasikan beberapa fitur keamanan:

1. **Password Hashing** - Menggunakan `password_hash()` dengan BCRYPT
2. **CSRF Protection** - Token untuk setiap form submission
3. **SQL Injection Prevention** - Menggunakan PDO Prepared Statements
4. **XSS Prevention** - Output escaping dengan `htmlspecialchars()`
5. **Session Management** - Session regeneration saat login
6. **File Protection** - `.htaccess` untuk melindungi file sensitif

---

## 👥 Kontributor

**Kelompok 7 - Tugas UAS Database**

| Nama | Role |
|------|-----|
| Adelina | Developer |
| Nabila | Developer |
| Sadyah | Developer |

---

## 📄 Lisensi

Proyek ini dibuat untuk tujuan akademik sebagai Tugas UAS mata kuliah Database.

```
MIT License

Copyright (c) 2026 Kelompok 7

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
```

---

## 📞 Kontak

Jika ada pertanyaan atau masalah, silakan hubungi tim pengembang.

---

<p align="center">
  <b>🧺 E-Laundry Management System</b><br>
  Made with ❤️ by Kelompok 7
</p>
