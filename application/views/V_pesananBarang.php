<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Masuk | Student Shop</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f4f7f6; }
        .navbar { box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .card-table { border: none; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); background: #fff; overflow: hidden; }
        .table thead { background-color: #343a40; color: #fff; }
        .table td { vertical-align: middle !important; padding: 1.2rem 0.75rem; }
        
        /* User Status Badge */
        .badge-user { font-size: 0.7rem; padding: 3px 8px; border-radius: 5px; text-transform: uppercase; }
        .badge-siswa { background: #e3f2fd; color: #1976d2; }
        .badge-guru { background: #f3e5f5; color: #7b1fa2; }
        
        .address-text { max-width: 200px; font-size: 0.85rem; color: #666; display: block; line-height: 1.4; }
        .btn-action { border-radius: 8px; font-weight: 600; font-size: 0.8rem; padding: 6px 12px; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand navbar-dark bg-dark sticky-top p-3">
    <div class="container d-flex justify-content-between">
        <a class="btn btn-outline-light btn-sm" href="<?php echo site_url('C_utama/masukPenjual') ?>">
            ← Kembali ke Panel
        </a>
        <span class="navbar-brand font-weight-bold">Daftar Pesanan Masuk</span>
        <a class="btn btn-danger btn-sm" href="<?php echo site_url('C_utama/logout') ?>">Logout</a>
    </div>
</nav>

<div class="container mt-4 mb-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="font-weight-bold mb-0 text-dark">Konfirmasi Pesanan</h4>
        <a class="btn btn-primary shadow-sm font-weight-bold px-4 rounded-pill" href="<?php echo site_url('C_user/pengiriman') ?>">
            🚚 Lihat Daftar Pengiriman
        </a>
    </div>

    <?php if(!empty($this->session->flashdata('status'))): ?>
        <div class="alert alert-warning alert-dismissible fade show border-0 shadow-sm" role="alert">
            <strong>Update:</strong> <?php echo $this->session->flashdata('status') ?>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    <?php endif ?>

    <div class="card-table">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr align="center">
                        <th>No</th>
                        <th align="left">Produk</th>
                        <th>Qty</th>
                        <th>Total Harga</th>
                        <th align="left">Pemesan</th>
                        <th align="left">Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $i = 1;
                    foreach ($data as $d): 
                        $user_class = (strtolower($d['status_user']) == 'siswa') ? 'badge-siswa' : 'badge-guru';
                    ?>
                        <tr align="center">
                            <td class="text-muted"><?php echo $i ?></td>
                            <td align="left">
                                <span class="font-weight-bold d-block text-dark"><?php echo $d['nama_barang'] ?></span>
                                <small class="text-muted">ID: #<?= $d['id_transaksi'] ?></small>
                            </td>
                            <td><span class="badge badge-light border"><?php echo $d['jumlah'] ?></span></td>
                            <td class="font-weight-bold text-success">
                                Rp <?= number_format($d['total_harga'], 0, ',', '.') ?>
                            </td>
                            <td align="left">
                                <span class="d-block font-weight-bold"><?= $d['username'] ?></span>
                                <span class="badge-user <?= $user_class ?>"><?= $d['status_user'] ?></span>
                            </td>
                            <td align="left">
                                <span class="address-text"><?php echo $d['alamat'] ?></span>
                            </td>
                            <td>
                                <div class="d-flex flex-column">
                                    <a class="btn btn-success btn-action mb-1 shadow-sm" href="<?php echo site_url('C_user/terima_pesanan/'.$d['id_transaksi']) ?>">
                                        Terima
                                    </a>
                                    <a class="btn btn-outline-danger btn-action shadow-sm" href="<?php echo site_url('C_user/tolak_pesanan/'.$d['id_transaksi']) ?>" onclick="return confirm('Tolak pesanan ini?')">
                                        Tolak
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php
                    $i++;
                    endforeach ?>

                    <?php if(empty($data)): ?>
                        <tr>
                            <td colspan="7" class="text-center py-5">
                                <img src="https://illustrations.popsy.co/white/waiting.svg" width="180" class="mb-3">
                                <h6 class="text-muted">Belum ada pesanan masuk untuk saat ini.</h6>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<footer class="text-center py-4 text-muted">
    <small>© 2026 Student Shop Seller Dashboard • Dean</small>
</footer>

</body>
</html>