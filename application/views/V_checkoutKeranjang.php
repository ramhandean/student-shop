<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pesanan | Student Shop</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap.min.css") ?>">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f8f9fa; }
        .navbar { box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .card-checkout { border: none; border-radius: 15px; box-shadow: 0 4px 20px rgba(0,0,0,0.05); }
        .info-label { font-size: 0.8rem; font-weight: 600; color: #888; text-transform: uppercase; }
        .product-box { background: #fff; border-radius: 12px; padding: 20px; border: 1px solid #eee; }
        .total-badge { background: #e8f5e9; color: #2e7d32; padding: 10px 20px; border-radius: 10px; display: inline-block; }
    </style>
</head>
<body>

<nav class="navbar navbar-dark bg-dark p-3 sticky-top">
    <div class="container d-flex justify-content-between">
        <a class="btn btn-outline-light btn-sm" href="<?php echo site_url('C_user/back3/') ?>">
            ← Kembali ke Keranjang
        </a>
        <span class="navbar-brand font-weight-bold mx-auto">Checkout Pesanan</span>
        <a class="btn btn-danger btn-sm" href="<?php echo site_url('C_utama/logout') ?>">Logout</a>
    </div>
</nav>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card card-checkout p-4 p-md-5">
                <h4 class="font-weight-bold mb-4 text-center text-md-left">Ringkasan Pesanan</h4>
                
                <div class="product-box mb-4">
                    <div class="row align-items-center">
                        <div class="col-md-3 text-center mb-3 mb-md-0">
                            <img src="<?= base_url('assets/image/' .$data['image']) ?>" class="img-fluid rounded shadow-sm" style="max-height: 120px;">
                        </div>
                        <div class="col-md-9">
                            <h5 class="font-weight-bold mb-1"><?php echo $data['nama_barang'] ?></h5>
                            <p class="text-muted mb-2">Jumlah: <span class="badge badge-secondary"><?php echo $data['jumlah'] ?> pcs</span></p>
                            <div class="total-badge">
                                <span class="small d-block">Total yang harus dibayar:</span>
                                <h4 class="font-weight-bold mb-0">Rp <?= number_format($data['total_harga'], 0, ',','.')?></h4>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="my-4">

                <?php echo form_open('C_user/proses_checkoutKeranjang/'.$data['kd_barang']) ?>
                    <div class="form-group">
                        <label class="info-label">Alamat Lengkap Pengiriman</label>
                        <textarea name="alamat" class="form-control" rows="4" 
                            placeholder="Masukkan alamat pengiriman secara detail (Nama Jalan, No. Rumah, RT/RW, Kecamatan)..." required></textarea>
                    </div>

                    <div class="alert alert-info border-0 shadow-sm small mt-4">
                        <strong>Informasi:</strong> Pesanan Anda akan diproses oleh penjual setelah Anda mengklik tombol "Konfirmasi Pesanan". Pastikan alamat sudah benar.
                    </div>

                    <div class="row mt-5">
                        <div class="col-md-6 offset-md-3">
                            <button type="submit" class="btn btn-success btn-lg btn-block shadow font-weight-bold">
                                KONFIRMASI PESANAN
                            </button>
                        </div>
                    </div>
                <?php form_close() ?>
            </div>
            
            <p class="text-center text-muted mt-4 small">
                © 2026 Student Shop Project • Dean
            </p>
        </div>
    </div>
</div>

</body>
</html>