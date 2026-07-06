<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="es-content" style="padding-top:28px;">
<div class="es-form-wrap">
<div class="es-form-card">
    <div class="es-form-header">
        <h2><i class="fa-solid fa-plus"></i> Tambah Barang Elektronik</h2>
        <p>Isi detail barang yang ingin ditambahkan ke katalog</p>
    </div>
    <div class="es-form-body">
        <?php if (validation_errors()): ?><div class="es-validation-error"><?= validation_errors() ?></div><?php endif; ?>
        <?php if ($this->session->flashdata('error')): ?><div class="es-validation-error"><?= $this->session->flashdata('error') ?></div><?php endif; ?>
        <?= form_open_multipart('shop/store') ?>
        <div class="es-form-row">
            <div>
                <div class="es-field">
                    <label><i class="fa-regular fa-rectangle-list"></i> Nama Barang</label>
                    <input type="text" name="nama_barang" class="es-input" placeholder="Nama Barang Elektronik" value="<?= set_value('nama_barang') ?>">
                </div>
                <div class="es-field">
                    <label><i class="fa-regular fa-file-lines"></i> Deskripsi</label>
                    <textarea name="deskripsi" class="es-textarea" placeholder="Deskripsi singkat produk..."><?= set_value('deskripsi') ?></textarea>
                </div>
                <div class="es-field">
                    <label><i class="fa-solid fa-tag"></i> Kategori</label>
                    <select name="kategori" class="es-select">
                        <option value="">-- Pilih Kategori --</option>
                        <?php foreach(['Handphone','Laptop','Tablet','Smartwatch','TWS','Headphone','Speaker','Kamera','Aksesoris','Lainnya'] as $k): ?>
                        <option value="<?= $k ?>" <?= set_select('kategori', $k) ?>><?= $k ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="es-field">
                    <label><i class="fa-solid fa-dollar-sign"></i> Harga (Rp)</label>
                    <input type="number" name="harga" class="es-input" placeholder="Contoh: 5000000" value="<?= set_value('harga') ?>">
                </div>
            </div>
            <div>
                <div class="es-field">
                    <label><i class="fa-regular fa-image"></i> Gambar Barang</label>
                    <div class="es-upload-zone">
                        <input type="file" name="gambar" accept="image/*" onchange="previewImg(event, 'prev-create')">
                        <div class="es-upload-icon"><i class="fa-solid fa-cloud-arrow-up"></i></div>
                        <p>Klik atau drag file ke sini</p>
                        <span>JPG, PNG, WEBP — Maks 5MB</span>
                    </div>
                    <div class="es-img-preview" id="prev-create" style="display:none;">
                        <img id="prev-create-img" src="#" alt="Preview">
                    </div>
                </div>
            </div>
        </div>
        <div class="es-form-btns">
            <a href="<?= site_url('shop') ?>" class="es-btn-back"><i class="fa-solid fa-arrow-left"></i> KEMBALI</a>
            <button type="submit" class="es-btn-save"><i class="fa-regular fa-floppy-disk"></i> SIMPAN</button>
        </div>
        <?= form_close() ?>
    </div>
</div>
</div>
</div>
<script>
function previewImg(e, wrapId) {
    var wrap = document.getElementById(wrapId);
    var img  = document.getElementById(wrapId + '-img');
    var file = e.target.files[0];
    if (file) { var r = new FileReader(); r.onload = function(ev){ img.src = ev.target.result; wrap.style.display='block'; }; r.readAsDataURL(file); }
}
</script>
