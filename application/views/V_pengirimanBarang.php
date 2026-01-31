<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Saya | Student Shop</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f4f7f6; }
        .navbar { box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .order-card { border: none; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); background: #fff; }
        .table thead { background-color: #343a40; color: #fff; border: none; }
        .table th { font-weight: 500; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 1px; padding: 15px; }
        .table td { vertical-align: middle !important; padding: 15px; font-size: 0.95rem; }
        .status-badge { padding: 6px 12px; border-radius: 50px; font-size: 0.8rem; font-weight: 600; }
        .address-text { max-width: 200px; font-size: 0.85rem; color: #666; display: block; line-height: 1.4; }
        .price-text { font-weight: 600; color: #28a745; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand navbar-dark bg-dark sticky-top p-3">
    <div class="container d-flex justify-content-between">
        <a class="btn btn-outline-light btn-sm" href="<?php echo site_url('C_user/pesananBarang') ?>">
            ← Kembali Belanja
        </a>
        <span class="navbar-brand font-weight-bold">Daftar Pesanan Saya</span>
        <a class="btn btn-danger btn-sm" href="<?php echo site_url('C_utama/logout') ?>">Logout</a>
    </div>
</nav>

<div class="container mt-5 mb-5">
    <?php if(!empty($this->session->flashdata('status'))): ?>
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4">
            <strong>Berhasil!</strong> <?php echo $this->session->flashdata('status') ?>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    <?php endif ?>

    <div class="order-card p-2">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr align="center">
                        <th>No</th>
                        <th align="left">Detail Barang</th>
                        <th>Qty</th>
                        <th>Total Harga</th>
                        <th>Alamat Kirim</th>
                        <th>Aksi / Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $i = 1;
                    foreach ($data as $d): ?>
                        <tr align="center">
                            <td class="text-muted"><?php echo $i ?></td>
                            <td align="left">
                                <span class="font-weight-bold d-block text-dark"><?php echo $d['nama_barang'] ?></span>
                                <small class="text-muted">ID Transaksi: #TRX-<?= $d['id_transaksi'] ?></small>
                            </td>
                            <td><span class="badge badge-light border"><?php echo $d['jumlah'] ?></span></td>
                            <td class="price-text">Rp <?= number_format($d['total_harga'], 0, ',', '.') ?></td>
                            <td align="left">
                                <span class="address-text"><?php echo $d['alamat'] ?></span>
                            </td>
                            <td>
                                <a class="btn btn-success btn-sm font-weight-bold px-3 shadow-sm rounded-pill" 
                                   href="<?php echo site_url('C_user/konfirmasi_pesanan/'.$d['id_transaksi']) ?>"
                                   onclick="return confirm('Apakah barang benar-benar sudah Anda terima?')">
                                    Konfirmasi Selesai
                                </a>
                                <div class="mt-2">
                                    <span class="status-badge bg-info text-white">Sedang Dikirim</span>
                                </div>
                            </td>
                        </tr>
                    <?php
                    $i++;
                    endforeach ?>

                    <?php if(empty($data)): ?>
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <img src="https://illustrations.popsy.co/white/abstract-art-4.svg" width="150" class="mb-3">
                                <p class="text-muted">Belum ada pesanan aktif. Yuk belanja!</p>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<footer class="text-center py-4 text-muted">
    <small>© 2026 Student Shop • Project PKL Dean</small>
</footer>

</body>
</html>