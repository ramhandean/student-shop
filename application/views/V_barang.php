<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Barang | Student Shop</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f4f7f6; }
        
        /* Navbar Styling */
        .navbar { box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .nav-link-custom { 
            border-radius: 8px; 
            margin: 0 4px; 
            transition: all 0.3s; 
            font-size: 0.9rem;
        }

        /* Search Bar */
        .search-section {
            background: #fff;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            margin-bottom: 30px;
        }

        /* Card Styling */
        .product-card {
            border: none;
            border-radius: 15px;
            transition: transform 0.3s, box-shadow 0.3s;
            height: 100%; /* Agar tinggi card sama dalam satu baris */
            overflow: hidden;
            background: #fff;
        }
        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        .img-container {
            height: 200px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f8f9fa;
        }
        .img-container img {
            max-height: 100%;
            object-fit: contain;
            padding: 15px;
        }
        .price-tag {
            color: #28a745;
            font-weight: 600;
            font-size: 1.1rem;
        }
        .stock-info { font-size: 0.85rem; color: #6c757d; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top p-3">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="<?= site_url('C_user/back') ?>">
            <img src="<?= base_url('assets/image/ss.png') ?>" width="40" height="40" class="mr-2">
            <span class="font-weight-bold">Student Shop</span>
        </a>
        
        <div class="ml-auto d-flex align-items-center">
            <a href="<?= site_url('C_utama/masukPenjual') ?>" class="btn btn-outline-primary btn-sm font-weight-bold mr-2 text-white border-0">Toko Saya</a>
            <a href="<?= site_url('C_user/tampilKeranjang/') ?>" class="btn btn-success btn-sm font-weight-bold mr-2">🛒 Keranjang</a>
            <a href="<?= site_url('C_user/tampilPesanan/') ?>" class="btn btn-warning btn-sm font-weight-bold mr-2 text-dark">Pesanan</a>
            <a href="<?= site_url('C_utama/logout') ?>" class="btn btn-outline-danger btn-sm">Logout</a>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <?php if(!empty($this->session->flashdata('status'))): ?>
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <?php echo $this->session->flashdata('status') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif ?>

    <div class="search-section">
        <?php echo form_open('C_user/cari/', ['class' => 'row g-2']) ?>
            <div class="col-md-10">
                <input type="text" class="form-control form-control-lg" name="keyword" placeholder="Mau cari barang apa hari ini?">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-dark btn-lg btn-block">Cari</button>
            </div>
        <?php echo form_close() ?>
    </div>

    <div class="row">
        <?php foreach ($data as $d) { ?>    
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card product-card">
                    <div class="img-container">
                        <img src="<?= base_url('assets/image/' .$d['image']) ?>" class="card-img-top" alt="<?= $d['nama_barang'] ?>">
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title font-weight-bold text-truncate"><?php echo $d['nama_barang'] ?></h5>
                        <p class="price-tag mb-1">Rp <?php echo number_format($d['harga'], 0, ',','.') ?></p>
                        <p class="stock-info mb-3">Sisa Stok: <strong><?php echo $d['stok'] ?></strong></p>
                        
                        <a href="<?php echo site_url('C_user/detail_barang/'.$d['kd_barang']) ?>" class="btn btn-primary mt-auto btn-block">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<footer class="text-center p-4 text-muted mt-5">
    <small>© 2026 Student Shop Project • Dean PKL</small>
</footer>

</body>
</html>