<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Semua | Student Shop</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f4f7f6; }
        .navbar { box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .checkout-card { border: none; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        .item-row { border-bottom: 1px solid #eee; padding: 15px 0; }
        .item-row:last-child { border-bottom: none; }
        .sticky-sidebar { position: sticky; top: 100px; }
        .total-box { background: #fff; border-radius: 15px; padding: 25px; border: 2px solid #28a745; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand navbar-dark bg-dark sticky-top p-3">
    <div class="container">
        <a class="btn btn-outline-light btn-sm mr-3" href="<?php echo site_url('C_user/back3/') ?>">← Kembali</a>
        <span class="navbar-brand font-weight-bold">Konfirmasi Pesanan</span>
        <div class="ml-auto">
            <a class="btn btn-danger btn-sm font-weight-bold" href="<?php echo site_url('C_utama/logout') ?>">Logout</a>
        </div>
    </div>
</nav>

<div class="container mt-4 mb-5">
    <div class="row">
        <div class="col-md-7">
            <div class="card checkout-card p-4 mb-4">
                <h5 class="font-weight-bold mb-4">Barang yang akan dipesan</h5>
                
                <?php 
                $grand_total = 0;
                foreach ($data as $d): 
                    $subtotal = $d['harga'] * $d['qty'];
                    $grand_total += $subtotal;
                ?>
                <div class="row item-row align-items-center">
                    <div class="col-3">
                        <img src="<?= base_url('assets/image/' .$d['image']) ?>" class="img-fluid rounded shadow-sm">
                    </div>
                    <div class="col-5">
                        <h6 class="font-weight-bold mb-1"><?= $d['nama_barang'] ?></h6>
                        <small class="text-muted"><?= $d['qty'] ?> x Rp <?= number_format($d['harga'], 0, ',', '.') ?></small>
                    </div>
                    <div class="col-4 text-right">
                        <span class="font-weight-bold text-dark">Rp <?= number_format($subtotal, 0, ',', '.') ?></span>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="col-md-5">
            <div class="sticky-sidebar">
                <div class="card checkout-card p-4">
                    <h5 class="font-weight-bold mb-4">Pengiriman & Pembayaran</h5>
                    
                    <?php echo form_open('C_user/proses_checkoutAll/') ?>
                        <div class="form-group">
                            <label class="small font-weight-bold text-muted">ALAMAT LENGKAP</label>
                            <textarea name="alamat" class="form-control" rows="4" placeholder="Masukkan alamat lengkap pengiriman..." required></textarea>
                            <small class="form-text text-muted">Pastikan nomor rumah dan RT/RW benar.</small>
                        </div>

                        <div class="total-box mt-4">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Total Barang</span>
                                <span><?= count($data) ?> Item</span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <h5 class="font-weight-bold">Total Bayar</h5>
                                <h5 class="font-weight-bold text-success">Rp <?= number_format($grand_total, 0, ',', '.') ?></h5>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success btn-block btn-lg mt-4 font-weight-bold shadow">
                            KONFIRMASI PESANAN
                        </button>
                    <?php echo form_close() ?>
                    
                    <div class="text-center mt-3">
                        <small class="text-muted italic">* Dengan menekan tombol, Anda setuju untuk melakukan pembelian.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>