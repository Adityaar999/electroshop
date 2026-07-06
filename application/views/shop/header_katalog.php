<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog — ElectroShop</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        <?php include(APPPATH.'views/shop/_styles.php'); ?>
        <?php include(APPPATH.'views/shop/navbar_katalog.php'); ?>
    </style>
</head>

<body>

<nav class="es-nav-katalog">

    <div class="es-nav-left">

        <a href="<?= site_url('katalog') ?>" class="es-nav-logo">
            <img src="<?= base_url('Logo.jpg') ?>">
        </a>

    </div>

    <div class="es-nav-center">

        <a href="<?= site_url('katalog') ?>" class="es-nav-link active">

            <i class="fa-solid fa-store"></i>

            Katalog

        </a>

    </div>

    <div class="es-nav-right">

        <a href="<?= site_url('auth') ?>" class="es-btn-login">

            <i class="fa-solid fa-lock"></i>

            Admin Login

        </a>

    </div>

</nav>

<div class="es-main">