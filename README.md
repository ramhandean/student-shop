# Student Shop - Platform E-Commerce

Aplikasi e-commerce sederhana untuk jual-beli produk online dengan sistem pembeli dan penjual yang dibangun menggunakan **CodeIgniter 3** dan **MySQL**.

## 🎯 Fitur Utama

### Untuk Pembeli
- ✅ Browse dan cari produk
- ✅ Tambah produk ke keranjang belanja
- ✅ Checkout dan pembayaran
- ✅ Tracking pesanan
- ✅ Riwayat pesanan

### Untuk Penjual
- ✅ Tambah dan kelola produk
- ✅ Edit harga dan stok produk
- ✅ Lihat pesanan dari pembeli
- ✅ Kelola pengiriman barang
- ✅ Dashboard penjual

### Umum
- ✅ Sistem autentikasi login
- ✅ Manajemen user account
- ✅ Responsive design dengan Bootstrap

## 📋 Persyaratan Sistem

- PHP 7.4+ (tested on PHP 8.3.6)
- MySQL 5.1+ atau MariaDB
- Apache/Nginx
- MySQLi Extension

## 🚀 Cara Instalasi

### 1. Clone Repository
```bash
git clone https://github.com/ramhandean/student-shop.git
cd student-shop
```

### 2. Install PHP MySQLi Extension
```bash
# Untuk PHP 8.3
sudo apt install php8.3-mysqli php8.3-mysql

# Atau sesuaikan dengan versi PHP Anda
sudo apt install php[version]-mysqli php[version]-mysql
```

### 3. Setup Database
```bash
# Buat database
sudo mysql -e "CREATE DATABASE student_shop;"

# Import SQL file
sudo mysql student_shop < assets/ss.sql
```

### 4. Konfigurasi Database
File [application/config/database.php](application/config/database.php) sudah dikonfigurasi:
```php
$db['default'] = array(
    'dsn'   => '',
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => '',  // kosong jika login via sudo
    'database' => 'student_shop',
    'dbdriver' => 'mysqli',
    // ... konfigurasi lainnya
);
```

### 5. Konfigurasi Base URL (Optional)
Edit file `application/config/config.php` jika diperlukan:
```php
$config['base_url'] = 'http://localhost:8000/';
```

### 6. Jalankan Aplikasi
```bash
# Menggunakan PHP built-in server (development)
sudo php -S localhost:8000

# Buka di browser: http://localhost:8000
```

## 📁 Struktur Folder

```
student-shop/
├── application/          # Aplikasi utama CodeIgniter
│   ├── config/          # Konfigurasi aplikasi
│   ├── controllers/     # Kontroller (C_user.php, C_utama.php)
│   ├── models/          # Model database (M_utama.php)
│   ├── views/           # Template HTML
│   ├── logs/            # Log file
│   └── cache/           # Cache files
├── system/              # Framework CodeIgniter
├── assets/
│   ├── css/            # CSS files (Bootstrap)
│   ├── js/             # JavaScript files
│   ├── image/          # Gambar
│   └── ss.sql          # Database schema
├── user_guide/         # Dokumentasi CodeIgniter
├── index.php           # Entry point
└── composer.json       # Dependencies
```

## 🎮 Cara Menggunakan

### Akses Aplikasi
```
http://localhost:8000/
```

### Login
Akses aplikasi di `http://localhost:8000/` dan login dengan salah satu akun berikut:

#### Akun Pembeli (SISWA)
| Username | Password | Status |
|----------|----------|--------|
| `deanramhan` | `1` | Siswa + Penjual |
| `ardianrifki24` | `2` | Siswa + Penjual |
| `saha` | `123` | Siswa |

#### Akun Penjual/Guru
| Username | Password | Status |
|----------|----------|--------|
| `guru` | `12` | Guru |

**Catatan**: Beberapa akun memiliki role ganda (Siswa + Penjual), jadi bisa login sebagai pembeli dan penjual sekaligus.

### Menggunakan Aplikasi sebagai Pembeli
1. Login dengan akun pembeli
2. Home → Browse daftar produk
3. Klik produk yang ingin dibeli
4. Masukkan jumlah dan "Tambah ke Keranjang"
5. Keranjang → Review pesanan
6. Checkout → Selesaikan pemesanan
7. Pesanan → Lihat status pesanan dan pengiriman

### Menggunakan Aplikasi sebagai Penjual
1. Login dengan akun penjual (cek role di profil)
2. Dashboard Penjual → Kelola produk
3. Tambah Barang → Input detail produk baru
4. Kelola pesanan di menu "Pesanan"
5. Kelola pengiriman di menu "Pengiriman Barang"
6. Terima atau tolak pesanan dari pembeli

## 🛠️ Teknologi yang Digunakan

- **Backend**: PHP, CodeIgniter 3
- **Database**: MySQL
- **Frontend**: HTML5, CSS3 (Bootstrap), JavaScript
- **Server**: Apache/Nginx

## 📝 Struktur Database

Database `student_shop` memiliki tabel-tabel berikut:

### Tabel Utama
- `tbl_user` - Data pengguna (Siswa/Guru) dengan username, password, dan status
- `tbl_siswa` - Detail siswa dengan NIS
- `tbl_guru` - Detail guru dengan NIP
- `tbl_penjual` - Data penjual (seller)
- `tbl_barang` - Produk yang dijual beserta harga dan stok
- `tbl_transaksi` - Riwayat transaksi/pesanan dengan status (Dikeranjang, Dipesan, Berhasil, Diproses, Ditolak)
- `tbl_admin` - Data admin (optional, tidak dipakai di user interface)

## 🔒 Catatan Keamanan & Troubleshooting

### Troubleshooting Instalasi

**Error: "Access denied for user 'root'@'localhost'"**
- Jalankan MySQL dengan `sudo mysql` tanpa password
- Atau setup password MySQL di konfigurasi database.php

**Error: "Call to undefined function mysqli_init()"**
- Install MySQLi extension: `sudo apt install php8.3-mysqli`
- Restart PHP server setelah install

**Error: "Creation of dynamic property CI_URI::$config is deprecated" (PHP 8.2+)**
- File [index.php](index.php) sudah dikonfigurasi untuk suppress warning
- Atau downgrade ke PHP 7.4 jika diperlukan

### Best Practice
- **Development Mode**: Gunakan `sudo php -S localhost:8000` untuk menjalankan
- **Login**: Selalu gunakan akun yang sudah tersedia di database
- **Password Hashing**: Password di database menggunakan MD5 (legacy, tidak recommended untuk production)
- **Database**: Jangan hardcode password di source code, gunakan environment variables untuk production

## �‍💻 Developer

Project ini dikerjakan secara solo oleh Dean sebagai project pembelajaran/PKL.

## 📄 Lisensi

Project ini dilisensikan di bawah [Lisensi MIT](license.txt).

## 📧 Kontak

Untuk pertanyaan dan support, silakan hubungi atau buka issue di repository ini.

---

**Note**: Ini adalah project untuk keperluan pembelajaran/tugas PKL. Untuk production, pastikan security review dan optimization dilakukan.
