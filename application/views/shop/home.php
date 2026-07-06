<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="es-banner">
    <div class="es-banner-inner">
        <div class="es-banner-text">
            <div class="es-banner-greeting">Selamat datang kembali 👋</div>
            <h1><?= $this->session->userdata('admin_nama') ?>!</h1>
            <p>Kelola inventaris produk ElectroShop dengan mudah melalui panel admin ini.</p>
        </div>
        <div class="es-banner-stats">
            <div class="es-stat">
                <div class="es-stat-icon"><i class="fa-solid fa-box"></i></div>
                <div class="es-stat-value"><?= $total_produk ?></div>
                <div class="es-stat-label">Total Produk</div>
            </div>
            <div class="es-stat">
                <div class="es-stat-icon"><i class="fa-solid fa-layer-group"></i></div>
                <div class="es-stat-value"><?= count($kategori_list) ?></div>
                <div class="es-stat-label">Kategori</div>
            </div>
            <div class="es-stat">
                <div class="es-stat-icon"><i class="fa-solid fa-star"></i></div>
                <div class="es-stat-value"><?= $produk_baru ?><span style="font-size:14px;font-weight:500;opacity:.7;"> /7hr</span></div>
                <div class="es-stat-label">Produk Baru</div>
            </div>
        </div>
    </div>
</div>

<div class="es-content">

    <?php if ($this->session->flashdata('success')): ?>
    <div class="es-alert es-alert-success">
        <div class="es-alert-icon"><i class="fa-solid fa-check"></i></div>
        <?= $this->session->flashdata('success') ?>
    </div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')): ?>
    <div class="es-alert es-alert-error">
        <div class="es-alert-icon"><i class="fa-solid fa-xmark"></i></div>
        <?= $this->session->flashdata('error') ?>
    </div>
    <?php endif; ?>

    <div class="es-grid-header">
        <div>
            <div class="es-grid-title">Daftar Produk</div>
        </div>
        <div class="es-grid-actions">
            <span class="es-grid-meta"><?= count($barang) ?> produk</span>
            <?php if (!empty($barang)): ?>
            <button class="es-filter-btn danger" id="btn-hapus-semua">
                <i class="fa-solid fa-trash" style="font-size:11px;"></i> Hapus Semua
            </button>
            <?php endif; ?>
        </div>
    </div>

    <?php if (empty($barang)): ?>
    <div class="es-empty">
        <i class="fa-solid fa-box-open"></i>
        <p>Belum ada produk. Yuk tambahkan!</p>
        <a href="<?= site_url('shop/create') ?>" class="es-btn-add" style="display:inline-flex; margin:0 auto;">
            <i class="fa-solid fa-plus"></i> Tambah Sekarang
        </a>
    </div>
    <?php else: ?>
    <div class="es-grid">
        <?php foreach ($barang as $i => $item): ?>
        <div class="es-card">
            <div class="es-card-img">
                <?php if ($item->gambar): ?>
                    <img src="<?= base_url('upload/items/' . $item->gambar) ?>" alt="<?= htmlspecialchars($item->nama_barang) ?>">
                <?php else: ?>
                    <i class="fa-solid fa-laptop es-card-img-ph"></i>
                <?php endif; ?>
                <?php if ($i % 3 === 0): ?><span class="es-badge es-badge-new">NEW</span>
                <?php elseif ($i % 3 === 2): ?><span class="es-badge es-badge-promo">PROMO</span>
                <?php endif; ?>
                <span class="es-card-kat"><?= htmlspecialchars($item->kategori ?? 'Lainnya') ?></span>
            </div>
            <div class="es-card-body">
                <div class="es-card-name"><?= htmlspecialchars($item->nama_barang) ?></div>
                <div class="es-card-price">Rp <?= number_format($item->harga ?? 0, 0, ',', '.') ?></div>
                <div class="es-card-desc"><?= htmlspecialchars($item->deskripsi) ?></div>
            </div>
            <div class="es-card-foot">
                <a href="<?= site_url('shop/edit/' . $item->id) ?>" class="es-btn-edit">
                    <i class="fa-solid fa-pen-to-square" style="font-size:11px;"></i> Edit
                </a>
                <button class="es-btn-del btn-hapus"
                        data-id="<?= $item->id ?>"
                        data-nama="<?= htmlspecialchars($item->nama_barang) ?>">
                    <i class="fa-solid fa-trash" style="font-size:11px;"></i>
                </button>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</div>

<!-- MODAL HAPUS SATU -->
<div class="es-overlay" id="modal-satu">
    <div class="es-modal">
        <div class="es-modal-icon">🗑️</div>
        <h3>Hapus Barang?</h3>
        <p id="modal-satu-pesan">Barang ini akan dihapus permanen.</p>
        <div class="es-modal-btns">
            <button class="es-modal-cancel" onclick="document.getElementById('modal-satu').classList.remove('open')">Batal</button>
            <a id="modal-satu-link" href="#" class="es-modal-confirm">
                <i class="fa-solid fa-trash"></i> Ya, Hapus
            </a>
        </div>
    </div>
</div>

<!-- MODAL HAPUS SEMUA -->
<div class="es-overlay" id="modal-semua">
    <div class="es-modal">
        <div class="es-modal-icon">⚠️</div>
        <h3>Hapus SEMUA Produk?</h3>
        <p>Seluruh data produk akan dihapus permanen dan tidak bisa dikembalikan!</p>
        <div class="es-modal-btns">
            <button class="es-modal-cancel" onclick="document.getElementById('modal-semua').classList.remove('open')">Batal</button>
            <a href="<?= site_url('shop/delete_all') ?>" class="es-modal-confirm">
                <i class="fa-solid fa-trash"></i> Ya, Hapus Semua
            </a>
        </div>
    </div>
</div>

<script>
document.querySelectorAll('.btn-hapus').forEach(function(btn) {
    btn.addEventListener('click', function() {
        var id = this.dataset.id, nama = this.dataset.nama;
        document.getElementById('modal-satu-pesan').textContent = 'Produk "' + nama + '" akan dihapus permanen.';
        document.getElementById('modal-satu-link').href = '<?= site_url('shop/delete/') ?>' + id;
        document.getElementById('modal-satu').classList.add('open');
    });
});
var btnSemua = document.getElementById('btn-hapus-semua');
if (btnSemua) btnSemua.addEventListener('click', function() {
    document.getElementById('modal-semua').classList.add('open');
});
</script>