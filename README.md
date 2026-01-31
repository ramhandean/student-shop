# 🛍️ Student Shop - Modern E-Commerce Platform

Aplikasi e-commerce modern khusus lingkungan sekolah untuk transaksi jual-beli antara Siswa dan Guru. Dibangun menggunakan framework **CodeIgniter 3**, **Bootstrap 4**, dan didukung oleh **MySQL**.

> **Note**: Project ini telah di-update dengan UI modern (Glassmorphism & Responsive Design) untuk pengalaman pengguna yang lebih baik selama masa PKL.

---

## 🚀 Fitur Utama

### 🛒 Untuk Pembeli (Siswa/Guru)
- **Katalog Modern**: Penjelajahan produk dengan grid system yang rapi dan responsif.
- **Smart Search**: Pencarian barang secara cepat dan akurat.
- **Shopping Cart**: Kelola item belanjaan sebelum masuk ke tahap checkout.
- **Fast Checkout**: Proses pemesanan yang ringkas dengan kalkulasi harga otomatis.
- **Order Tracking**: Pantau status pesanan mulai dari dipesan hingga berhasil.

### 🏪 Untuk Penjual
- **Seller Dashboard**: Ringkasan daftar produk yang sedang dijual.
- **Inventory Management**: Tambah, edit (dengan fitur pratinjau gambar), dan hapus produk.
- **Order Management**: Terima atau tolak pesanan masuk dari pembeli secara praktis.
- **Status Pengiriman**: Kelola daftar pengiriman barang ke pembeli.

---

## 🛠️ Teknologi yang Digunakan

- **Backend**: PHP 8.3 (Support CI3 Core)
- **Framework**: CodeIgniter 3.1.13
- **Database**: MySQL / MariaDB
- **Frontend**: Bootstrap 4, Poppins Fonts, SweetAlert2 (Notifikasi Modern)
- **Server**: Apache / PHP Built-in Server

---

## 📁 Struktur Folder Utama

\`\`\`text
student-shop/
├── application/          # Logika Bisnis (MVC)
│   ├── controllers/      # Kontroler Utama (C_user, C_utama)
│   ├── models/           # Query Database (M_utama)
│   └── views/            # UI Baru (Modern & Clean Design)
├── assets/
│   ├── css/              # Custom Styles & Bootstrap
│   ├── js/               # JavaScript files
│   ├── image/            # Assets Produk & Logo
│   └── ss.sql            # Database Schema Terbaru
└── index.php             # Entry Point Utama
\`\`\`

---

## ⚙️ Instalasi & Konfigurasi

### 1. Persiapan Lingkungan (Linux/Ubuntu)
Pastikan extension \`mysqli\` sudah aktif. Jika menggunakan PHP 8.3:
\`\`\`bash
sudo apt update
sudo apt install php8.3-mysqli php8.3-mysql
\`\`\`

### 2. Setup Database
Masuk ke terminal MySQL dan siapkan database serta user khusus:
\`\`\`sql
CREATE DATABASE student_shop;
CREATE USER 'dean'@'localhost' IDENTIFIED BY 'password_kamu';
GRANT ALL PRIVILEGES ON student_shop.* TO 'dean'@'localhost';
FLUSH PRIVILEGES;
\`\`\`
Import skema database melalui terminal (dalam folder project):
\`\`\`bash
mysql -u dean -p student_shop < assets/ss.sql
\`\`\`

### 3. Konfigurasi CodeIgniter
Sesuaikan file \`application/config/database.php\`:
\`\`\`php
$db['default'] = array(
    'hostname' => '127.0.0.1', // Gunakan 127.0.0.1 untuk menghindari Unix Socket error
    'username' => 'dean',
    'password' => 'password_kamu',
    'database' => 'student_shop',
    'dbdriver' => 'mysqli'
);
\`\`\`

### 4. Jalankan Aplikasi
Gunakan PHP built-in server untuk development:
\`\`\`bash
php -S localhost:8000
\`\`\`
Akses melalui browser di: \`http://localhost:8000\`

---

## 🔑 Akun Demo (Default)

| Role | Username | Password |
| :--- | :--- | :--- |
| **Siswa + Penjual** | \`deanramhan\` | \`1\` |
| **Siswa Only** | \`saha\` | \`123\` |
| **Guru** | \`guru\` | \`12\` |

---

## 🔒 Troubleshooting

- **Error: \`mysqli_init()\` undefined**: Install extension \`php-mysqli\` dan restart server PHP kamu.
- **Error: \`No such file or directory\` pada DB**: Pastikan \`hostname\` di config adalah \`127.0.0.1\`, bukan \`localhost\`.
- **NPM/NVM Command Not Found**: Jika kamu menggunakan ZSH, tambahkan konfigurasi NVM ke dalam file \`~/.zshrc\`.

---

## 👨‍💻 Developer
**Dean** - *Project Pembelajaran / PKL*
GitHub: [ramhandean](https://github.com/ramhandean)

---
© 2026 Student Shop Project.
