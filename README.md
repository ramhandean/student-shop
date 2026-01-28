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

- PHP >= 5.6
- MySQL >= 5.1
- Apache/Nginx
- Composer (optional)

## 🚀 Cara Instalasi

### 1. Clone Repository
```bash
git clone https://github.com/ramhandean/student-shop.git
cd student-shop
```

### 2. Setup Database
```bash
# Import database dari file SQL
mysql -u root -p nama_database < assets/ss.sql
```

### 3. Konfigurasi Database
Edit file `application/config/database.php`:
```php
$db['default'] = array(
    'dsn'   => '',
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => 'your_password',
    'database' => 'nama_database',
    'dbdriver' => 'mysqli',
    // ... konfigurasi lainnya
);
```

### 4. Konfigurasi Base URL
Edit file `application/config/config.php`:
```php
$config['base_url'] = 'http://localhost:8000/';
```

### 5. Set Permission
```bash
chmod 755 application/logs/
chmod 755 application/cache/
```

### 6. Jalankan Aplikasi
```bash
# Menggunakan PHP built-in server (development)
php -S localhost:8000

# Atau setup di Apache/Nginx untuk production
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
1. Buka halaman login
2. Masukkan username dan password
3. Pilih role: **Pembeli** atau **Penjual**

### Sebagai Pembeli
1. Home → Browse produk
2. Klik produk yang ingin dibeli
3. Masukkan jumlah dan "Tambah ke Keranjang"
4. Keranjang → Review pesanan
5. Checkout → Selesaikan pembayaran
6. Pesanan → Lihat status pengiriman

### Sebagai Penjual
1. Login sebagai penjual
2. Dashboard → Kelola Produk
3. Tambah Barang → Input detail produk
4. Kelola pesanan di menu Pesanan
5. Kelola pengiriman di menu Pengiriman Barang

## 🛠️ Teknologi yang Digunakan

- **Backend**: PHP, CodeIgniter 3
- **Database**: MySQL
- **Frontend**: HTML5, CSS3 (Bootstrap), JavaScript
- **Server**: Apache/Nginx

## 📝 Struktur Database

### Tabel Utama
- `users` - Data pengguna (pembeli & penjual)
- `products/barang` - Data produk
- `orders/pesanan` - Data pesanan
- `order_items/pesanan_barang` - Detail item di pesanan
- `cart/keranjang` - Keranjang belanja
- `shipment/pengiriman` - Data pengiriman

## 🔒 Catatan Keamanan

- Perbarui password default
- Jangan expose database credentials
- Setup HTTPS untuk production
- Validasi semua input user
- Use environment variables untuk sensitive data

## �‍💻 Developer

Project ini dikerjakan secara solo oleh Dean sebagai project pembelajaran/PKL.

## 📄 Lisensi

Project ini dilisensikan di bawah [Lisensi MIT](license.txt).

## 📧 Kontak

Untuk pertanyaan dan support, silakan hubungi atau buka issue di repository ini.

---

**Note**: Ini adalah project untuk keperluan pembelajaran/tugas PKL. Untuk production, pastikan security review dan optimization dilakukan.
