<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pencarian | Student Shop</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f8f9fa; }
        .navbar { box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        
        .search-header {
            background: #fff;
            padding: 30px 0;
            margin-bottom: 30px;
            border-bottom: 1px solid #dee2e6;
        }

        .product-card {
            border: none;
            border-radius: 12px;
            transition: all 0.3s;
            height: 100%;
            background: #fff;
        }
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.08);
        }
        .img-container {
            height: 180px;
            overflow: hidden;
            background: #fdfdfd;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px 12px 0 0;
        }
        .img-container img {
            max-height: 85%;
            object-fit: contain;
        }
        .price-text {
            color: #28a745;
            font-weight: 600;
            font-size: 1.1rem;
        }
        .empty-state {
            padding: 100px 0;
            text-align: center;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top p-3">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="<?php echo site_url('C_user/back/') ?>">
            <img src="<?php echo base_url('assets/image/ss.png') ?>" width="40" height="40" class="mr-2">
            <span class="font-weight-bold">Student Shop</span>
        </a>
        <div class="ml-auto">
            <a href="<?php echo site_url('C_user/tampilKeranjang/') ?>" class="btn btn-outline-success border-0 text-white mr-2">🛒 Keranjang</a>
            <a href="<?php echo site_url('C_user/tampilPesanan/') ?>" class="btn btn-warning font-weight-bold">Pesanan</a>
            <a href="<?php echo site_url('C_utama/logout') ?>" class="btn btn-link text-danger p-0 ml-3" style="text-decoration:none">Logout</a>
        </div>
    </div>
</nav>

<div class="search-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h4 class="mb-0">Hasil pencarian untuk: <span class="text-primary font-italic">"<?= $this->input->post('keyword') ?>"</span></h4>
                <p class="text-muted mb-0 small"><?= count($data) ?> produk ditemukan</p>
            </div>
            <div class="col-md-6">
                <?php echo form_open('C_user/cari/', ['class' => 'input-group shadow-sm']) ?>
                    <input type="text" class="form-control border-0" name="keyword" placeholder="Cari barang lain..." value="<?= $this->input->post('keyword') ?>">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-dark px-4">Cari</button>
                    </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <?php if(!empty($this->session->flashdata('status'))): ?>
        <div class="alert alert-warning alert-dismissible fade show border-0 shadow-sm">
            <?php echo $this->session->flashdata('status') ?>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    <?php endif ?>

    <div class="row">
        <?php if (!empty($data)): ?>
            <?php foreach ($data as $d): ?>    
                <div class="col-lg-3 col-md-4 col-6 mb-4">
                    <div class="card product-card">
                        <div class="img-container">
                            <img src="<?= base_url('assets/image/' .$d['image']) ?>" alt="<?= $d['nama_barang'] ?>">
                        </div>
                        <div class="card-body p-3">
                            <h6 class="card-title text-truncate font-weight-bold mb-1"><?php echo $d['nama_barang'] ?></h6>
                            <p class="price-text mb-1">Rp <?= number_format($d['harga'], 0, ',', '.') ?></p>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="badge badge-light text-muted p-0">Stok: <?= $d['stok'] ?></span>
                            </div>
                            <a class="btn btn-primary btn-sm btn-block rounded-pill" href="<?php echo site_url('C_user/detail_barang/'.$d['kd_barang']) ?>">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12 empty-state">
                <img src="https://illustrations.popsy.co/white/surreal-search.svg" width="200" class="mb-4">
                <h5>Yah, barangnya nggak ketemu...</h5>
                <p class="text-muted">Coba pakai kata kunci lain atau cek ejaan kamu ya.</p>
                <a href="<?php echo site_url('C_user/back/') ?>" class="btn btn-dark mt-3">Kembali ke Katalog</a>
            </div>
        <?php endif; ?>
    </div>
</div>

</body>
</html>