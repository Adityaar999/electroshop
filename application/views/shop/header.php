<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin — ElectroShop</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        <?php include(APPPATH.'views/shop/_styles.php'); ?>
        <?php include(APPPATH.'views/shop/navbar_admin.php'); ?>
    </style>
</head>
<body>

<nav class="es-nav">

    <a href="<?= site_url('shop') ?>" class="es-nav-logo">
        <img src="<?= base_url('Logo.jpg') ?>">
    </a>

    <div class="es-nav-links">
        <a href="<?= site_url('shop') ?>"
           class="es-nav-link <?= (uri_string()=='shop'||uri_string()=='') ? 'active':'' ?>">
            <i class="fa-solid fa-house"></i> Dashboard
        </a>
        <a href="<?= site_url('katalog') ?>" target="_blank" class="es-nav-link">
            <i class="fa-solid fa-store"></i> Lihat Katalog
        </a>
    </div>

    <div class="es-nav-right">
        <a href="<?= site_url('shop/create') ?>" class="es-btn-add">
            <i class="fa-solid fa-plus"></i> Tambah Barang
        </a>
        <div class="es-admin-badge">
            <i class="fa-solid fa-circle-user"></i>
            <?= $this->session->userdata('admin_nama') ?>
        </div>
        <a href="<?= site_url('auth/logout') ?>" class="es-btn-logout">
            <i class="fa-solid fa-right-from-bracket"></i>
        </a>
    </div>

</nav>

<div class="es-main">