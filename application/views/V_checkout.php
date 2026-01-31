<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout | Student Shop</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap.min.css") ?>">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f8f9fa; }
        .checkout-container { margin-top: 40px; margin-bottom: 40px; }
        .card { border: none; border-radius: 15px; box-shadow: 0 4px 20px rgba(0,0,0,0.05); }
        .product-preview { border-radius: 10px; background: #fff; padding: 15px; border: 1px solid #eee; }
        .total-section { background: #fdf7e3; border-radius: 10px; padding: 20px; margin-top: 20px; }
        .btn-checkout { padding: 12px; font-weight: 600; border-radius: 10px; text-transform: uppercase; letter-spacing: 1px; }
    </style>
</head>
<body>

<nav class="navbar navbar-dark bg-dark p-3">
    <div class="container">
        <a href="<?php echo site_url('C_user/back2/'.$data['kd_barang']) ?>" class="btn btn-outline-light btn-sm">
            ← Kembali
        </a>
        <span class="navbar-brand mb-0 h1 mx-auto font-weight-bold">Student Shop</span>
        <a href="<?php echo site_url('C_utama/logout') ?>" class="btn btn-link text-danger text-decoration-none">Logout</a>
    </div>
</nav>

<div class="container checkout-container">
    <div class="row">
        <div class="col-md-5 mb-4">
            <div class="card p-4">
                <h5 class="font-weight-bold mb-4">Ringkasan Pesanan</h5>
                <div class="product-preview d-flex align-items-center mb-3">
                    <img src="<?= base_url('assets/image/' .$data['image']) ?>" width="80" class="rounded mr-3 shadow-sm">
                    <div>
                        <h6 class="mb-1 font-weight-bold"><?php echo $data['nama_barang'] ?></h6>
                        <small class="text-muted">Harga Satuan:</small>
                        <p class="text-success font-weight-bold mb-0">Rp <span id="unitPrice"><?php echo number_format($data['harga'], 0, ',', '.') ?></span></p>
                    </div>
                </div>
                
                <div class="total-section">
                    <div class="d-flex justify-content-between mb-2">
                        <span>Subtotal</span>
                        <span id="subtotalDisplay">Rp <?php echo number_format($data['harga'], 0, ',', '.') ?></span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Biaya Layanan</span>
                        <span class="text-success">FREE</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <h5 class="font-weight-bold">Total</h5>
                        <h5 class="font-weight-bold text-primary" id="totalDisplay">Rp <?php echo number_format($data['harga'], 0, ',', '.') ?></h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-7">
            <div class="card p-4">
                <h5 class="font-weight-bold mb-4">Informasi Pengiriman</h5>
                <?php echo form_open('C_user/proses_checkout/'.$data['kd_barang']) ?>
                    
                    <div class="form-group mb-4">
                        <label class="font-weight-bold text-muted small">JUMLAH BARANG (QTY)</label>
                        <div class="input-group" style="max-width: 150px;">
                            <input type="number" name="qty" id="inputQty" class="form-control text-center" value="1" min="1" max="<?php echo $data['stok'] ?>">
                        </div>
                        <small class="text-info mt-1 d-block">Stok tersedia: <?php echo $data['stok'] ?></small>
                    </div>

                    <div class="form-group mb-4">
                        <label class="font-weight-bold text-muted small">ALAMAT LENGKAP PENGIRIMAN</label>
                        <textarea name="alamat" class="form-control" rows="4" placeholder="Contoh: Kelas XI RPL 1" required></textarea>
                        <small class="text-muted">Pastikan alamat lengkap agar kurir mudah menemukan lokasimu.</small>
                    </div>

                    <div class="alert alert-light border small text-muted">
                        * Pembayaran dilakukan dengan sistem COD atau Transfer (Hubungi Penjual setelah konfirmasi).
                    </div>

                    <button type="submit" class="btn btn-success btn-block btn-checkout mt-4 shadow-sm">
                        BUAT PESANAN SEKARANG
                    </button>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>

[Image of an e-commerce checkout flow diagram]

<script>
    // Script sederhana untuk update Total Harga secara Real-time
    const inputQty = document.getElementById('inputQty');
    const unitPrice = <?php echo $data['harga']; ?>;
    const subtotalDisplay = document.getElementById('subtotalDisplay');
    const totalDisplay = document.getElementById('totalDisplay');

    inputQty.addEventListener('input', function() {
        let qty = this.value;
        if (qty < 1) qty = 1;
        
        const total = qty * unitPrice;
        const formattedTotal = "Rp " + new Intl.NumberFormat('id-ID').format(total);
        
        subtotalDisplay.innerText = formattedTotal;
        totalDisplay.innerText = formattedTotal;
    });
</script>

</body>
</html>