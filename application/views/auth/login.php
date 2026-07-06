<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin — ElectroShop</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        *, *::before, *::after { margin:0; padding:0; box-sizing:border-box; }
        body { font-family:'Inter',system-ui,sans-serif; background:#eef2f7; min-height:100vh; display:flex; align-items:center; justify-content:center; }

        .login-wrap { width:100%; max-width:420px; padding:20px; }

        .login-logo { text-align:center; margin-bottom:28px; }
        .login-logo img { height:72px; object-fit:contain; }

        .login-card { background:#fff; border-radius:18px; border:1px solid #e2e8f0; overflow:hidden; box-shadow:0 4px 24px rgba(0,0,0,.08); }

        .login-header { background:linear-gradient(130deg,#1e3a5f,#1d4ed8); padding:24px 28px; text-align:center; position:relative; overflow:hidden; }
        .login-header::before { content:''; position:absolute; right:-50px; top:-50px; width:180px; height:180px; border-radius:50%; background:rgba(255,255,255,.05); }
        .login-header h2 { color:#fff; font-size:17px; font-weight:700; position:relative; z-index:1; }
        .login-header p  { color:rgba(255,255,255,.7); font-size:12.5px; margin-top:3px; position:relative; z-index:1; }
        .login-header-icon { width:52px; height:52px; background:rgba(255,255,255,.15); border-radius:14px; display:flex; align-items:center; justify-content:center; margin:0 auto 12px; font-size:22px; color:#fff; position:relative; z-index:1; }

        .login-body { padding:28px; }

        .es-alert { display:flex; align-items:center; gap:9px; padding:11px 14px; border-radius:9px; font-size:13px; font-weight:500; margin-bottom:18px; }
        .es-alert-error { background:#fef2f2; border:1px solid #fecaca; color:#dc2626; }
        .es-alert-success { background:#f0fdf4; border:1px solid #bbf7d0; color:#15803d; }
        .es-alert i { font-size:14px; flex-shrink:0; }

        .es-field { margin-bottom:16px; }
        .es-field label { display:flex; align-items:center; gap:6px; font-size:12.5px; font-weight:600; color:#374151; margin-bottom:7px; }
        .es-field label i { color:#1d4ed8; font-size:13px; }
        .es-input { width:100%; border:1.5px solid #e2e8f0; border-radius:9px; padding:10px 14px; font-size:13.5px; font-family:inherit; color:#1e293b; background:#f8fafc; outline:none; transition:border-color .15s; }
        .es-input:focus { border-color:#1d4ed8; background:#fff; box-shadow:0 0 0 3px rgba(29,78,216,.08); }

        .btn-login { width:100%; height:46px; background:#1d4ed8; color:#fff; border:none; border-radius:10px; font-size:14px; font-weight:700; cursor:pointer; font-family:inherit; display:flex; align-items:center; justify-content:center; gap:8px; transition:background .15s; margin-top:20px; }
        .btn-login:hover { background:#1e40af; }

        .login-hint { text-align:center; margin-top:16px; padding-top:16px; border-top:1px solid #f1f5f9; font-size:12px; color:#94a3b8; }
        .login-hint a { color:#64748b; text-decoration:none; }
        .login-hint a:hover { color:#1d4ed8; }

        .demo-info { background:#f8fafc; border:1px dashed #cbd5e1; border-radius:8px; padding:10px 14px; margin-top:14px; font-size:12px; color:#64748b; text-align:center; }
        .demo-info strong { color:#1d4ed8; }
    </style>
</head>
<body>
<div class="login-wrap">

    <div class="login-logo">
        <img src="<?= base_url('Logo.jpg') ?>" alt="ElectroShop">
    </div>

    <div class="login-card">
        <div class="login-header">
            <div class="login-header-icon"><i class="fa-solid fa-lock"></i></div>
            <h2>Admin Panel</h2>
            <p>Masuk untuk mengelola produk ElectroShop</p>
        </div>
        <div class="login-body">

            <?php if ($this->session->flashdata('error')): ?>
            <div class="es-alert es-alert-error">
                <i class="fa-solid fa-circle-exclamation"></i>
                <?= $this->session->flashdata('error') ?>
            </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('success')): ?>
            <div class="es-alert es-alert-success">
                <i class="fa-solid fa-check-circle"></i>
                <?= $this->session->flashdata('success') ?>
            </div>
            <?php endif; ?>

            <?= form_open('auth/login') ?>

            <div class="es-field">
                <label><i class="fa-solid fa-user"></i> Username</label>
                <input type="text" name="username" class="es-input" placeholder="Masukkan username" value="<?= set_value('username') ?>" autocomplete="username">
                <?php if (form_error('username')): ?>
                <small style="color:#dc2626; font-size:11.5px;"><?= form_error('username') ?></small>
                <?php endif; ?>
            </div>

            <div class="es-field">
                <label><i class="fa-solid fa-key"></i> Password</label>
                <input type="password" name="password" class="es-input" placeholder="Masukkan password" autocomplete="current-password">
                <?php if (form_error('password')): ?>
                <small style="color:#dc2626; font-size:11.5px;"><?= form_error('password') ?></small>
                <?php endif; ?>
            </div>

            <button type="submit" class="btn-login">
                <i class="fa-solid fa-right-to-bracket"></i> Masuk ke Admin Panel
            </button>

            <?= form_close() ?>

            <div class="demo-info">
                Demo: username <strong>admin</strong> / password <strong>admin123</strong>
            </div>

            <div class="login-hint">
                Ingin lihat katalog publik? <a href="<?= site_url('katalog') ?>">Lihat Katalog →</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>