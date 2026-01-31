<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Saya | Student Shop</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f8f9fa; }
        .navbar { box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .order-card { border: none; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); background: #fff; overflow: hidden; }
        .table thead { background-color: #343a40; color: #fff; }
        .table td { vertical-align: middle !important; padding: 15px; }
        .status-badge { padding: 5px 12px; border-radius: 50px; font-size: 0.8rem; font-weight: 600; text-transform: uppercase; }
        
        /* Warna Status Dinamis */
        .status-dipesan { background: #fff3cd; color: #856404; } /* Kuning */
        .status-diproses { background: #cce5ff; color: #004085; } /* Biru */
        .status-berhasil { background: #d4edda; color: #155724; } /* Hijau */
        .status-ditolak { background: #f8d7da; color: #721c24; } /* Merah */
        
        .address-box { max-width: 250px; font-size: 0.85rem; color: #666; display: block; line-height: 1.4; text-align: left; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand navbar-dark bg-dark sticky-top p-3">
    <div class="container d-flex justify-content-between">
        <a class="btn btn-outline-light btn-sm" href="<?php echo site_url('C_user/back/') ?>">
            ← Kembali Belanja
        </a>
        <span class="navbar-brand font-weight-bold">Riwayat Pesanan</span>
        <a class="btn btn-danger btn-sm" href="<?php echo site_url('C_utama/logout') ?>">Logout</a>
    </div>
</nav>

<div class="container mt-5 mb-5">
    <?php if(!empty($this->session->flashdata('status'))): ?>
        <div class="alert alert-info alert-dismissible fade show border-0 shadow-sm mb-4">
            <?php echo $this->session->flashdata('status') ?>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    <?php endif ?>

    <div class="order-card">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr align="center">
                        <th>No</th>
                        <th align="left">Nama Barang</th>
                        <th>Qty</th>
                        <th>Total Harga</th>
                        <th>Alamat Pengiriman</th>
                        <th>Status Pesanan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $i = 1;
                    foreach ($data as $d): 
                        // Logika penentuan class warna berdasarkan status
                        $status_class = 'status-badge ';
                        $current_status = strtolower($d['status']);
                        
                        if ($current_status == 'dipesan') $status_class .= 'status-dipesan';
                        elseif ($current_status == 'diproses') $status_class .= 'status-diproses';
                        elseif ($current_status == 'berhasil') $status_class .= 'status-berhasil';
                        else $status_class .= 'status-ditolak';
                    ?>
                        <tr align="center">
                            <td><?php echo $i ?></td>
                            <td align="left">
                                <span class="font-weight-bold text-dark d-block"><?php echo $d['nama_barang'] ?></span>
                                <small class="text-muted small">ID Transaksi: #<?= $d['id_transaksi'] ?? '000' ?></small>
                            </td>
                            <td><span class="badge badge-light border px-3"><?php echo $d['jumlah'] ?></span></td>
                            <td class="font-weight-bold text-success">
                                Rp <?= number_format($d['total_harga'], 0, ',', '.') ?>
                            </td>
                            <td>
                                <span class="address-box"><?php echo $d['alamat'] ?></span>
                            </td>
                            <td>
                                <span class="<?= $status_class ?>"><?php echo $d['status'] ?></span>
                            </td>
                        </tr>
                    <?php
                    $i++;
                    endforeach ?>

                    <?php if(empty($data)): ?>
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                <p>Belum ada riwayat pesanan.</p>
                                <a href="<?= site_url('C_user/back/') ?>" class="btn btn-dark btn-sm">Mulai Belanja</a>
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