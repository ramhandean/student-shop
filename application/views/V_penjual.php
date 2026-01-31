<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Penjual | Student Shop</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f4f7f6; }
        .navbar { box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        
        .dashboard-header {
            background: #fff;
            padding: 25px 0;
            border-bottom: 1px solid #eee;
            margin-bottom: 30px;
        }

        .manage-card {
            border: none;
            border-radius: 15px;
            transition: all 0.3s ease;
            height: 100%;
            background: #fff;
            box-shadow: 0 4px 10px rgba(0,0,0,0.03);
        }
        .manage-card:hover {
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        }

        .img-wrapper {
            height: 180px;
            padding: 15px;
            background: #fafafa;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 15px 15px 0 0;
        }
        .img-wrapper img {
            max-height: 100%;
            max-width: 100%;
            object-fit: contain;
        }

        .action-btns .btn {
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.85rem;
            padding: 8px 15px;
        }
        
        .stock-badge {
            font-size: 0.75rem;
            background: #e9ecef;
            padding: 4px 10px;
            border-radius: 5px;
            color: #495057;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top p-3">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="<?= base_url('assets/image/ss.png') ?>" width="40" height="40" class="mr-2">
            <span class="font-weight-bold">Seller Panel</span>
        </a>
        
        <div class="ml-auto d-flex align-items-center">
            <a href="<?= site_url('C_user/pesananBarang') ?>" class="btn btn-success btn-sm font-weight-bold mr-2">📦 Pesanan Masuk</a>
            <a href="<?= site_url('C_utama/beliBarang') ?>" class="btn btn-warning btn-sm font-weight-bold mr-2 text-dark">🛒 Mode Pembeli</a>
            <a href="<?= site_url('C_utama/logout') ?>" class="btn btn-outline-danger btn-sm">Logout</a>
        </div>
    </div>
</nav>

<div class="dashboard-header">
    <div class="container d-flex justify-content-between align-items-center">
        <div>
            <h4 class="font-weight-bold mb-0">Kelola Produk Anda</h4>
            <p class="text-muted small mb-0">Total: <?= count($data) ?> Produk Aktif</p>
        </div>
        <a href="<?php echo site_url('C_user/tambah_barang') ?>" class="btn btn-primary shadow-sm px-4">
            + Tambah Produk Baru
        </a>
    </div>
</div>

<div class="container">
    <?php if(!empty($this->session->flashdata('status'))): ?>
        <div class="alert alert-warning alert-dismissible fade show border-0 shadow-sm" role="alert">
            <strong>Info:</strong> <?php echo $this->session->flashdata('status') ?>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    <?php endif ?>

    <div class="row">
        <?php foreach ($data as $d): ?>    
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card manage-card">
                    <div class="img-wrapper">
                        <img src="<?= base_url('assets/image/' .$d['image']) ?>" alt="<?= $d['nama_barang'] ?>">
                    </div>
                    <div class="card-body p-3">
                        <h6 class="font-weight-bold text-truncate mb-1" title="<?= $d['nama_barang'] ?>">
                            <?= $d['nama_barang'] ?>
                        </h6>
                        <p class="text-success font-weight-bold mb-2">
                            Rp <?= number_format($d['harga'], 0, ',', '.') ?>
                        </p>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="stock-badge">Stok: <strong><?= $d['stok'] ?></strong></span>
                        </div>
                        
                        <div class="action-btns d-flex border-top pt-3">
                            <a href="<?= site_url('C_user/edit_barang/'.$d['kd_barang']) ?>" class="btn btn-outline-primary flex-grow-1 mr-1">Edit</a>
                            <a href="<?= site_url('C_user/hapus_barang/'.$d['kd_barang']) ?>" 
                               class="btn btn-outline-danger flex-grow-1 ml-1" 
                               onclick="return confirm('Hapus produk ini?')">Hapus</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <?php if(empty($data)): ?>
            <div class="col-12 text-center py-5">
                <img src="https://illustrations.popsy.co/white/product-launch.svg" width="200" class="mb-4">
                <h5>Belum ada barang yang dijual.</h5>
                <p class="text-muted">Mulai jualan produk pertamamu sekarang!</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<footer class="text-center py-5 text-muted">
    <small>© 2026 Student Shop Seller Dashboard • Dean</small>
</footer>

</body>
</html>