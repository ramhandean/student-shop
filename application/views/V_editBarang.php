<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk | Student Shop</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f4f7f6; }
        .edit-container { margin-top: 40px; margin-bottom: 40px; }
        .card { border: none; border-radius: 15px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); overflow: hidden; }
        .card-header { background: #343a40; color: #fff; padding: 20px; border: none; }
        .img-preview-box { 
            background: #fff; 
            border: 2px dashed #ddd; 
            border-radius: 10px; 
            padding: 20px; 
            text-align: center;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .img-preview-box img { max-width: 100%; max-height: 250px; border-radius: 8px; }
        .form-label { font-weight: 600; font-size: 0.85rem; color: #555; text-transform: uppercase; letter-spacing: 1px; }
        .form-control { border-radius: 8px; padding: 12px; border: 1px solid #ddd; }
        .form-control:focus { border-color: #28a745; box-shadow: none; }
        .btn-update { padding: 12px; font-weight: 600; border-radius: 8px; letter-spacing: 1px; }
    </style>
</head>
<body>

<nav class="navbar navbar-dark bg-dark p-3 shadow-sm sticky-top">
    <div class="container d-flex justify-content-between">
        <a class="btn btn-outline-light btn-sm" href="<?php echo site_url('C_utama/masukPenjual/') ?>">
            ← Kembali
        </a>
        <span class="navbar-brand font-weight-bold">Panel Penjual</span>
        <a class="btn btn-danger btn-sm" href="<?php echo site_url('C_utama/logout') ?>">Logout</a>
    </div>
</nav>

<div class="container edit-container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 font-weight-bold">📝 Edit Informasi Produk</h5>
                </div>
                <div class="card-body p-4 p-md-5">
                    <?php echo form_open('C_user/proses_editBarang/'.$data['kd_barang']) ?>
                        <div class="row">
                            <div class="col-md-4 mb-4 mb-md-0">
                                <label class="form-label d-block mb-3">Foto Produk Saat Ini</label>
                                <div class="img-preview-box shadow-sm">
                                    <img src="<?php echo base_url('assets/image/' .$data['image']) ?>" alt="Preview">
                                </div>
                                <p class="text-center mt-3 small text-muted">Untuk mengganti foto, silakan hubungi admin atau upload ulang produk baru.</p>
                            </div>

                            <div class="col-md-8">
                                <div class="form-group mb-4">
                                    <label class="form-label">Nama Barang</label>
                                    <input class="form-control form-control-lg" type="text" name="nama_barang" value="<?php echo $data['nama_barang'] ?>" required>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-4">
                                            <label class="form-label">Harga Produk (Rp)</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-light border-right-0">Rp</span>
                                                </div>
                                                <input class="form-control" type="number" name="harga" value="<?php echo $data['harga'] ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-4">
                                            <label class="form-label">Jumlah Stok</label>
                                            <input class="form-control" type="number" name="stok" value="<?php echo $data['stok'] ?>" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="alert alert-info border-0 small">
                                    <strong>Tips:</strong> Pastikan harga bersaing dan stok selalu diperbarui agar pembeli tidak kecewa.
                                </div>

                                <div class="mt-5 text-right">
                                    <button type="submit" class="btn btn-success btn-update px-5 shadow">
                                        SIMPAN PERUBAHAN
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="text-center pb-5 text-muted">
    <small>© 2026 Student Shop Admin • Project PKL Dean</small>
</footer>

</body>
</html>