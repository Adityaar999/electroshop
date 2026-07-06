<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="es-content" style="padding-top:28px;">
<div class="es-form-wrap">
<div class="es-form-card">

    <div class="es-form-header" style="background:linear-gradient(130deg,#1e3a5f,#0369a1);">
        <h2><i class="fa-solid fa-pen-to-square"></i> Edit Barang</h2>
        <p>Update data: <strong><?= htmlspecialchars($barang->nama_barang) ?></strong></p>
    </div>

    <div class="es-form-body">

        <?php if(validation_errors()): ?>
            <div class="es-validation-error"><?= validation_errors(); ?></div>
        <?php endif; ?>
        <?php if($this->session->flashdata('error')): ?>
            <div class="es-validation-error"><?= $this->session->flashdata('error'); ?></div>
        <?php endif; ?>
        <?php if($this->session->flashdata('success')): ?>
            <div class="es-alert es-alert-success">
                <div class="es-alert-icon"><i class="fa-solid fa-check"></i></div>
                <?= $this->session->flashdata('success') ?>
            </div>
        <?php endif; ?>

        <?= form_open_multipart('shop/update/'.$barang->id) ?>

        <div class="es-form-row">

            <div>
                <div class="es-field">
                    <label><i class="fa-regular fa-rectangle-list"></i> Nama Barang</label>
                    <input type="text" name="nama_barang" class="es-input"
                           value="<?= set_value('nama_barang', $barang->nama_barang) ?>">
                </div>

                <div class="es-field">
                    <label><i class="fa-regular fa-file-lines"></i> Deskripsi</label>
                    <textarea name="deskripsi" class="es-textarea"><?= set_value('deskripsi', $barang->deskripsi) ?></textarea>
                </div>

                <div class="es-field">
                    <label><i class="fa-solid fa-tag"></i> Kategori</label>
                    <select name="kategori" class="es-select">
                        <?php
                        $kategori_list = ['Handphone','Laptop','Tablet','Smartwatch','TWS','Headphone','Speaker','Kamera','Aksesoris','Lainnya'];
                        foreach ($kategori_list as $k):
                        ?>
                        <option value="<?= $k ?>" <?= ($barang->kategori == $k) ? 'selected' : '' ?>>
                            <?= $k ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                    <p style="font-size:11.5px; color:#f59e0b; margin-top:6px; display:flex; align-items:center; gap:5px;">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        Mengubah kategori akan menghapus semua varian yang ada.
                    </p>
                </div>

                <div class="es-field">
                    <label><i class="fa-solid fa-money-bill-wave"></i> Harga Dasar (Rp)</label>
                    <input type="number" name="harga" class="es-input"
                           value="<?= set_value('harga', $barang->harga) ?>">
                    <p style="font-size:11.5px; color:#94a3b8; margin-top:5px;">
                        Harga per varian diatur di Kelola Varian.
                    </p>
                </div>

                <!-- KELOLA VARIAN — tombol langsung, tanpa dropdown -->
                <div class="es-field">
                    <label><i class="fa-solid fa-layer-group"></i> Varian Produk</label>
                    <a href="<?= site_url('shop/varian/'.$barang->id) ?>"
                       style="display:inline-flex; align-items:center; gap:8px; background:#1d4ed8; color:#fff; padding:10px 20px; border-radius:9px; font-size:13px; font-weight:600; text-decoration:none; transition:background .15s;"
                       onmouseover="this.style.background='#1e40af'" onmouseout="this.style.background='#1d4ed8'">
                        <i class="fa-solid fa-layer-group"></i>
                        Kelola Varian
                        <?php if (!empty($varian)): ?>
                            <span style="background:rgba(255,255,255,.25); padding:1px 8px; border-radius:20px; font-size:11px;">
                                <?= count($varian) ?> varian
                            </span>
                        <?php endif; ?>
                    </a>
                </div>
            </div>

            <div>
                <div class="es-field">
                    <label><i class="fa-regular fa-image"></i> Gambar Produk</label>

                    <?php if ($barang->gambar): ?>
                    <div class="es-img-preview" style="margin-bottom:15px;">
                        <img src="<?= base_url('upload/items/'.$barang->gambar) ?>" style="max-width:220px;">
                    </div>
                    <?php endif; ?>

                    <div class="es-upload-zone">
                        <input type="file" name="gambar" accept="image/*"
                               onchange="previewImg(event,'prev-update')">
                        <div class="es-upload-icon"><i class="fa-solid fa-cloud-arrow-up"></i></div>
                        <p>Upload gambar baru</p>
                        <span>JPG • PNG • WEBP • Maks 5MB</span>
                    </div>

                    <div class="es-img-preview" id="prev-update" style="display:none; margin-top:15px;">
                        <img id="prev-update-img">
                    </div>
                </div>
            </div>

        </div>

        <div class="es-form-btns">
            <a href="<?= site_url('shop') ?>" class="es-btn-back">
                <i class="fa-solid fa-arrow-left"></i> KEMBALI
            </a>
            <button type="submit" class="es-btn-save">
                <i class="fa-regular fa-floppy-disk"></i> UPDATE
            </button>
        </div>

        <?= form_close() ?>
    </div>
</div>
</div>
</div>

<script>
function previewImg(e, wrapId) {
    var file = e.target.files[0];
    if (!file) return;
    var reader = new FileReader();
    reader.onload = function(ev) {
        document.getElementById(wrapId).style.display = 'block';
        document.getElementById(wrapId + '-img').src = ev.target.result;
    };
    reader.readAsDataURL(file);
}
</script>