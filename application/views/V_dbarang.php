<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['nama_barang'] ?> | Student Shop</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap.min.css") ?>">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f8f9fa; }
        .detail-card { 
            background: #fff; 
            border-radius: 20px; 
            overflow: hidden; 
            box-shadow: 0 10px 30px rgba(0,0,0,0.05); 
            margin-top: 40px;
        }
        .img-zoom-container {
            background: #fff;
            padding: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            min-height: 400px;
        }
        .img-zoom-container img {
            max-width: 100%;
            border-radius: 10px;
            transition: transform 0.3s ease;
        }
        .img-zoom-container img:hover {
            transform: scale(1.05);
        }
        .product-info { padding: 40px; }
        .price-text { font-size: 2rem; font-weight: 600; color: #28a745; }
        .seller-badge {
            background: #eef2f7;
            padding: 5px 15px;
            border-radius: 50px;
            font-size: 0.85rem;
            color: #555;
        }
        .action-buttons .btn {
            padding: 12px 25px;
            font-weight: 600;
            border-radius: 10px;
            transition: all 0.3s;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-dark bg-dark p-3 shadow-sm sticky-top">
    <div class="container">
        <a class="btn btn-outline-light btn-sm" href="<?php echo site_url('C_user/back/') ?>">
            ← Kembali ke Katalog
        </a>
        <span class="navbar-brand mb-0 h1 mx-auto font-weight-bold">Detail Produk</span>
        <a class="btn btn-danger btn-sm" href="<?php echo site_url('C_utama/logout') ?>">Logout</a>
    </div>
</nav>

<div class="container mb-5">
    <div class="detail-card row no-gutters">
        <div class="col-md-6 border-right">
            <div class="img-zoom-container">
                <img src="<?= base_url('assets/image/' .$data['image']) ?>" alt="<?= $data['nama_barang'] ?>">
            </div>
        </div>

        <div class="col-md-6">
            <div class="product-info">
                <span class="seller-badge mb-3 d-inline-block">
                    📍 Penjual: <strong><?= $data['nama_penjual'] ?></strong>
                </span>
                
                <h1 class="font-weight-bold mb-2"><?= $data['nama_barang'] ?></h1>
                <p class="price-text mb-4">Rp <?= number_format($data['harga'], 0, ',','.') ?></p>
                
                <hr>

                <?php echo form_open('C_user/masukKeranjang/'.$data['kd_barang']) ?>
                    <div class="form-group mb-4">
                        <label class="font-weight-bold text-muted small">JUMLAH PEMBELIAN</label>
                        <div class="d-flex align-items-center">
                            <input type="number" name="qty" class="form-control col-3 mr-3 text-center" value="1" min="1" max="<?= $data['stok'] ?>">
                            <span class="text-muted small">Stok tersedia: <strong><?= $data['stok'] ?></strong></span>
                        </div>
                    </div>

                    <div class="action-buttons d-flex flex-column flex-sm-row mt-5">
                        <button type="submit" class="btn btn-warning mr-sm-2 mb-2 mb-sm-0 flex-grow-1 shadow-sm">
                            🛒 Masuk Keranjang
                        </button>
                        <a href="<?php echo site_url('C_user/checkout/'.$data['kd_barang']) ?>" class="btn btn-success flex-grow-1 shadow-sm">
                            Beli Sekarang
                        </a>
                    </div>
                <?php echo form_close() ?>

                <div class="mt-5">
                    <h6 class="font-weight-bold">Informasi Layanan:</h6>
                    <ul class="list-unstyled small text-muted">
                        <li>✅ Pengambilan barang bisa COD di Sekolah</li>
                        <li>✅ Jaminan barang sesuai deskripsi</li>
                        <li>✅ Chat penjual untuk ketersediaan lebih lanjut</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="text-center pb-4 text-muted">
    <small>© 2026 Student Shop Project • Dean</small>
</footer>

</body>
</html>