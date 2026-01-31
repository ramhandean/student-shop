<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Student Shop</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #1d1e22 0%, #33383e 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 400px;
        }
        .logo-img {
            transition: transform 0.3s ease;
            filter: drop-shadow(0 0 10px rgba(255, 193, 7, 0.3));
        }
        .logo-img:hover {
            transform: scale(1.05);
        }
        .form-control {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: #fff;
            border-radius: 10px;
            padding: 12px;
        }
        .form-control:focus {
            background: rgba(255, 255, 255, 0.15);
            border-color: #ffc107;
            color: #fff;
            box-shadow: none;
        }
        .btn-login {
            background: #ffc107;
            border: none;
            border-radius: 10px;
            padding: 12px;
            font-weight: 600;
            color: #000;
            transition: all 0.3s;
        }
        .btn-login:hover {
            background: #e0a800;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 193, 7, 0.4);
        }
        label {
            font-size: 0.9rem;
            margin-bottom: 8px;
            color: #ccc;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="text-center mb-4">
            <img class="logo-img" width="100px" src="<?php echo base_url("assets/image/ss.png") ?>" alt="Logo">
            <h3 class="mt-3 font-weight-bold">Student Shop</h3>
            <p class="text-muted small">Silakan login untuk mulai belanja</p>
        </div>

        <form action="<?php echo site_url('C_utama/aksi_login') ?>" method="post">
            <div class="form-group mb-3">
                <label>Username</label>
                <input class="form-control" type="text" name="username" placeholder="Masukkan username" required autocomplete="off">
            </div>
            <div class="form-group mb-4">
                <label>Password</label>
                <input class="form-control" type="password" name="password" placeholder="Masukkan password" required>
            </div>
            <button type="submit" class="btn btn-login btn-block w-100">MASUK SEKARANG</button>
        </form>

        <div class="text-center mt-4">
            <small class="text-muted">© 2026 Dean - Project PKL</small>
        </div>
    </div>

    <?php if (!empty($this->session->flashdata('error'))): ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Login Gagal',
                text: 'Username atau Password Salah!!!',
                background: '#333',
                color: '#fff',
                confirmButtonColor: '#ffc107'
            });
        </script>
    <?php endif ?>
</body>
</html>