<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk Baru | Student Shop</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f4f7f6; }
        .card-upload { border: none; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.08); }
        .form-label { font-weight: 600; font-size: 0.85rem; color: #555; text-transform: uppercase; letter-spacing: 1px; }
        .form-control { border-radius: 10px; padding: 12px; border: 1px solid #ddd; }
        .image-preview-zone {
            border: 2px dashed #ccc;
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            background: #fafafa;
            cursor: pointer;
            transition: all 0.3s;
        }
        .image-preview-zone:hover { border-color: #28a745; background: #f0fff4; }
        #previewImg { max-height: 200px; border-radius: 10px; display: none; margin: 10px auto; }
        .btn-submit { padding: 12px; font-weight: 600; border-radius: 10px; letter-spacing: 1px; }
    </style>
</head>
<body>

<nav class="navbar navbar-dark bg-dark p-3 shadow-sm sticky-top">
    <div class="container d-flex justify-content-between">
        <a class="btn btn-outline-light btn-sm" href="<?php echo site_url('C_utama/masukPenjual/') ?>">
            ← Kembali ke Panel
        </a>
        <span class="navbar-brand font-weight-bold">Tambah Produk</span>
        <a class="btn btn-danger btn-sm" href="<?php echo site_url('C_utama/logout') ?>">Logout</a>
    </div>
</nav>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card card-upload p-4 p-md-5">
                <div class="text-center mb-5">
                    <h3 class="font-weight-bold">🚀 Jual Barang Baru</h3>
                    <p class="text-muted">Lengkapi detail produk di bawah ini untuk mulai berjualan</p>
                </div>

                <?php echo form_open_multipart('C_user/proses_tambahBarang/')?>
                    <div class="row">
                        <div class="col-md-12 mb-4 text-center">
                            <label class="form-label d-block mb-3">Foto Produk</label>
                            <div class="image-preview-zone" onclick="document.getElementById('imageInput').click()">
                                <div id="uploadPlaceholder">
                                    <img src="https://illustrations.popsy.co/white/photo-upload.svg" width="100" class="mb-2">
                                    <p class="mb-0 text-muted">Klik untuk pilih gambar</p>
                                </div>
                                <img id="previewImg" src="#" alt="Pratinjau Gambar">
                                <input type="file" name="image" id="imageInput" style="display: none;" onchange="previewFile()" required>
                            </div>
                        </div>

                        <div class="col-md-12 mb-4">
                            <label class="form-label">Nama Produk</label>
                            <input class="form-control" type="text" name="nama_barang" placeholder="Contoh: Pulpen Kenko Gel 0.5mm" required>
                        </div>

                        <div class="col-md-6 mb-4">
                            <label class="form-label">Harga Satuan (Rp)</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white border-right-0">Rp</span>
                                </div>
                                <input class="form-control" type="number" name="harga" placeholder="0" required>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <label class="form-label">Stok Tersedia</label>
                            <input class="form-control" type="number" name="stok" placeholder="Contoh: 50" required>
                        </div>
                    </div>

                    <div class="alert alert-light border small text-muted mt-3">
                        * Pastikan gambar yang diunggah memiliki format .jpg, .png, atau .jpeg dengan ukuran maksimal 2MB.
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-success btn-block btn-submit shadow">
                            PUBLIKASIKAN BARANG
                        </button>
                    </div>
                <?php form_close() ?>
            </div>
        </div>
    </div>
</div>

[Image of an e-commerce product addition form with image preview]

<script>
    function previewFile() {
        const preview = document.getElementById('previewImg');
        const file = document.getElementById('imageInput').files[0];
        const placeholder = document.getElementById('uploadPlaceholder');
        const reader = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
            preview.style.display = "block";
            placeholder.style.display = "none";
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
            preview.style.display = "none";
            placeholder.style.display = "block";
        }
    }
</script>

</body>
</html>