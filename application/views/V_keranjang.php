<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja | Student Shop</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f8f9fa; }
        .cart-card { border: none; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); overflow: hidden; }
        .table thead { background-color: #343a40; color: #fff; }
        .table td { vertical-align: middle !important; }
        .product-img { width: 60px; height: 60px; object-fit: cover; border-radius: 8px; }
        .empty-cart { padding: 80px 0; text-align: center; }
        .btn-action { border-radius: 8px; font-weight: 600; font-size: 0.85rem; }
        .badge-qty { background: #e9ecef; color: #495057; padding: 5px 12px; border-radius: 20px; font-weight: 600; }
    </style>
</head>
<body>

<nav class="navbar navbar-dark bg-dark p-3 sticky-top">
    <div class="container d-flex justify-content-between">
        <a class="btn btn-outline-light btn-sm" href="<?php echo site_url('C_user/back/') ?>">
            ← Lanjut Belanja
        </a>
        <span class="navbar-brand font-weight-bold">Keranjang Saya</span>
        <a class="btn btn-danger btn-sm" href="<?php echo site_url('C_utama/logout') ?>">Logout</a>
    </div>
</nav>

<div class="container mt-5">
    <?php if(!empty($this->session->flashdata('status'))): ?>
        <div class="alert alert-info alert-dismissible fade show border-0 shadow-sm" role="alert">
            <strong>Info:</strong> <?php echo $this->session->flashdata('status') ?>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    <?php endif ?>

    <?php if (!empty($data)): ?>
        <div class="card cart-card">
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr align="center">
                            <th>#</th>
                            <th align="left">Produk</th>
                            <th>Jumlah</th>
                            <th>Total Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $i = 1;
                        $total_bayar = 0;
                        foreach ($data as $d): 
                            $total_bayar += $d['total_harga'];
                        ?>
                            <tr align="center">
                                <td><?php echo $i ?></td>
                                <td align="left">
                                    <div class="d-flex align-items-center">
                                        <img src="<?= base_url('assets/image/' . ($d['image'] ?? 'ss.png')) ?>" class="product-img mr-3 shadow-sm">
                                        <span class="font-weight-bold text-dark"><?php echo $d['nama_barang'] ?></span>
                                    </div>
                                </td>
                                <td><span class="badge-qty"><?php echo $d['jumlah'] ?></span></td>
                                <td class="font-weight-bold text-success">
                                    Rp <?= number_format($d['total_harga'], 0, ',', '.') ?>
                                </td>
                                <td>
                                    <a href="<?php echo site_url('C_user/checkoutKeranjang/'.$d['kd_barang']) ?>" class="btn btn-success btn-action mr-1">Checkout</a>
                                    <a href="<?php echo site_url('C_user/hapusKeranjang/'.$d['id_transaksi']) ?>" class="btn btn-outline-danger btn-action" onclick="return confirm('Hapus item ini?')">Hapus</a>
                                </td>
                            </tr>
                        <?php
                        $i++;
                        endforeach ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer bg-white p-4">
                <div class="row align-items-center">
                    <div class="col-md-6 mb-3 mb-md-0 text-center text-md-left">
                        <h5 class="mb-0">Estimasi Total: <span class="text-primary font-weight-bold">Rp <?= number_format($total_bayar, 0, ',', '.') ?></span></h5>
                    </div>
                    <div class="col-md-6 text-center text-md-right">
                        <a href="<?php echo site_url('C_user/checkoutAll/') ?>" class="btn btn-primary btn-lg px-5 shadow font-weight-bold">
                            CHECKOUT SEMUA (<?= count($data) ?>)
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="empty-cart card cart-card">
            <img src="https://illustrations.popsy.co/white/shopping-cart.svg" width="200" class="mx-auto mb-4">
            <h4 class="font-weight-bold">Keranjangmu masih kosong</h4>
            <p class="text-muted">Yuk, cari barang keren dan masukkan ke sini!</p>
            <a href="<?php echo site_url('C_user/back/') ?>" class="btn btn-dark mt-3 px-4">Mulai Belanja</a>
        </div>
    <?php endif ?>
</div>

<footer class="text-center py-5 text-muted">
    <small>© 2026 Student Shop • Project PKL Dean</small>
</footer>

</body>
</html>