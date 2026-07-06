<?php defined('BASEPATH') OR exit('No direct script access allowed');
$fields     = isset($varian_fields) ? $varian_fields : [];
$v          = $varian_item;
$col_labels = $v->field_label ? explode(' | ', $v->field_label) : [];
$col_values = $v->field_value ? explode(' | ', $v->field_value) : [];
$current    = (count($col_labels) === count($col_values)) ? array_combine($col_labels, $col_values) : [];
$has_diskon = isset($v->harga_diskon) && $v->harga_diskon > 0;
$stok_low   = $v->stok < 5;
$has_gambar = !empty($v->gambar);
?>

<div class="es-content" style="padding-top:30px;">

    <!-- BACK LINK -->
    <div style="margin-bottom:18px;">
        <a href="<?= site_url('shop/varian/'.$barang->id) ?>" class="es-btn-back"
           style="width:fit-content; padding:0 16px; gap:7px; height:36px; font-size:13px;">
            <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar Varian
        </a>
    </div>

    <div class="es-form-card">

        <div class="es-form-header" style="background:linear-gradient(130deg,#1e3a5f,#0369a1);">
            <h2><i class="fa-solid fa-pen-to-square"></i> Edit Varian</h2>
            <p>
                <?= htmlspecialchars($barang->nama_barang) ?>
                <span style="margin:0 6px; opacity:.5;">•</span>
                <span style="background:rgba(255,255,255,.15); padding:2px 10px; border-radius:20px; font-size:11px;">
                    <i class="fa-solid fa-tag" style="font-size:10px;"></i>
                    <?= htmlspecialchars($barang->kategori) ?>
                </span>
            </p>
        </div>

        <div class="es-form-body">

            <?php if($this->session->flashdata('error')): ?>
                <div class="es-alert es-alert-error">
                    <div class="es-alert-icon"><i class="fa-solid fa-xmark"></i></div>
                    <?= $this->session->flashdata('error') ?>
                </div>
            <?php endif; ?>

            <?= form_open_multipart('shop/varian_update/'.$v->id) ?>

            <!-- GRID FIELD UTAMA -->
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(160px, 1fr)); gap:16px; margin-bottom:16px;">

                <?php foreach ($fields as $label => $cfg):
                    $field_name  = 'field_' . strtolower(str_replace(' ', '_', $label));
                    $current_val = isset($current[$label]) ? $current[$label] : '';
                    $icons = ['RAM'=>'fa-memory','Storage'=>'fa-hard-drive','Warna'=>'fa-palette','Ukuran'=>'fa-ruler','Konektivitas'=>'fa-wifi'];
                    $icon  = $icons[$label] ?? 'fa-tag';
                ?>
                <div>
                    <label style="display:block; font-size:12.5px; font-weight:600; color:#374151; margin-bottom:6px;">
                        <i class="fa-solid <?= $icon ?>" style="color:#1d4ed8; font-size:11px;"></i>
                        <?= htmlspecialchars($label) ?>
                    </label>
                    <?php if ($cfg['type'] === 'grouped_dropdown' && !empty($cfg['groups'])): ?>
                        <select name="<?= $field_name ?>" class="es-select" required>
                            <option value="">-- Pilih <?= htmlspecialchars($label) ?> --</option>
                            <?php foreach ($cfg['groups'] as $grp => $opts): ?>
                                <optgroup label="── <?= htmlspecialchars($grp) ?> ──">
                                    <?php foreach ($opts as $opt): ?>
                                        <option value="<?= htmlspecialchars($opt) ?>" <?= $current_val === $opt ? 'selected' : '' ?>><?= htmlspecialchars($opt) ?></option>
                                    <?php endforeach; ?>
                                </optgroup>
                            <?php endforeach; ?>
                        </select>
                    <?php elseif ($cfg['type'] === 'dropdown' && !empty($cfg['options'])): ?>
                        <select name="<?= $field_name ?>" class="es-select" required>
                            <option value="">-- Pilih <?= htmlspecialchars($label) ?> --</option>
                            <?php foreach ($cfg['options'] as $opt): ?>
                                <option value="<?= htmlspecialchars($opt) ?>" <?= $current_val === $opt ? 'selected' : '' ?>><?= htmlspecialchars($opt) ?></option>
                            <?php endforeach; ?>
                        </select>
                    <?php else: ?>
                        <input type="text" name="<?= $field_name ?>" class="es-input"
                               value="<?= htmlspecialchars($current_val) ?>" required>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>

                <!-- HARGA -->
                <div>
                    <label style="display:block; font-size:12.5px; font-weight:600; color:#374151; margin-bottom:6px;">
                        <i class="fa-solid fa-tag" style="color:#1d4ed8; font-size:11px;"></i> Harga Normal (Rp)
                    </label>
                    <input type="number" name="harga" class="es-input" value="<?= $v->harga ?>" min="0" required>
                </div>

                <!-- STOK -->
                <div>
                    <label style="display:block; font-size:12.5px; font-weight:600; color:#374151; margin-bottom:6px;">
                        <i class="fa-solid fa-box" style="color:#1d4ed8; font-size:11px;"></i> Stok
                    </label>
                    <input type="number" name="stok" class="es-input" id="inp-stok"
                           value="<?= $v->stok ?>" min="0" required>
                </div>

            </div>

            <!-- FOTO VARIAN — full width -->
            <div style="margin-bottom:16px;">
                <label style="display:block; font-size:12.5px; font-weight:600; color:#374151; margin-bottom:6px;">
                    <i class="fa-regular fa-image" style="color:#1d4ed8; font-size:11px;"></i>
                    Foto Varian
                    <span style="font-weight:400; color:#94a3b8; font-size:11px;">(opsional)</span>
                </label>
                <label style="display:flex; align-items:center; justify-content:center; gap:12px; cursor:pointer; background:#f8fafc; border:1.5px dashed #cbd5e1; border-radius:10px; padding:14px 16px; transition:border-color .15s; width:100%; box-sizing:border-box;"
                       onmouseover="this.style.borderColor='#1d4ed8'" onmouseout="this.style.borderColor='#cbd5e1'">
                    <input type="file" name="gambar_varian" accept="image/*"
                           onchange="previewVarianEdit(event)" style="display:none;">
                    <?php if ($has_gambar): ?>
                        <div id="prev-edit-wrap">
                            <img id="prev-edit-img"
                                 src="<?= base_url('upload/items/'.$v->gambar) ?>"
                                 style="width:52px; height:52px; object-fit:contain; border-radius:6px; border:1px solid #e2e8f0; background:#fff;">
                        </div>
                        <div id="prev-edit-ph" style="display:none; width:52px; height:52px; background:#e2e8f0; border-radius:6px; align-items:center; justify-content:center; flex-shrink:0;">
                            <i class="fa-solid fa-plus" style="color:#94a3b8; font-size:16px;"></i>
                        </div>
                    <?php else: ?>
                        <div id="prev-edit-wrap" style="display:none;">
                            <img id="prev-edit-img"
                                 style="width:52px; height:52px; object-fit:contain; border-radius:6px; border:1px solid #e2e8f0; background:#fff;">
                        </div>
                        <div id="prev-edit-ph" style="width:52px; height:52px; background:#e2e8f0; border-radius:6px; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                            <i class="fa-solid fa-plus" style="color:#94a3b8; font-size:16px;"></i>
                        </div>
                    <?php endif; ?>
                    <div style="text-align:center;">
                        <p style="font-size:12.5px; font-weight:600; color:#374151; margin:0;">
                            <?= $has_gambar ? 'Ganti foto' : 'Upload foto' ?>
                        </p>
                        <p style="font-size:11px; color:#94a3b8; margin:2px 0 0;">JPG · PNG · WEBP</p>
                    </div>
                </label>
                <?php if ($has_gambar): ?>
                    <label style="display:inline-flex; align-items:center; gap:6px; margin-top:8px; font-size:12px; color:#ef4444; cursor:pointer; font-weight:500;">
                        <input type="checkbox" name="hapus_gambar" value="1" style="margin:0;"> Hapus foto ini
                    </label>
                <?php endif; ?>
            </div>

            <!-- DISKON — muncul kalau stok < 5 -->
            <div id="diskon-section" style="<?= $stok_low ? '' : 'display:none;' ?> background:#fffbeb; border:1.5px solid #fde68a; border-radius:10px; padding:16px 20px; margin-bottom:20px;">
                <p style="font-size:13px; font-weight:600; color:#92400e; margin-bottom:10px;">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    Stok menipis (&lt;5) — kamu bisa set harga diskon untuk mempercepat penjualan.
                </p>
                <div style="margin-bottom:0;">
                    <label style="display:block; font-size:12.5px; font-weight:600; color:#374151; margin-bottom:6px;">
                        <i class="fa-solid fa-percent" style="color:#1d4ed8; font-size:11px;"></i>
                        Harga Diskon (Rp)
                        <span style="font-weight:400; color:#94a3b8; font-size:11px;">(opsional)</span>
                    </label>
                    <input type="number" name="harga_diskon" class="es-input"
                           placeholder="Contoh: 299000"
                           value="<?= $has_diskon ? $v->harga_diskon : '' ?>"
                           min="0">
                    <p style="font-size:11.5px; color:#94a3b8; margin-top:5px;">Kosongkan jika tidak mau diskon.</p>
                </div>
            </div>

            <!-- TOMBOL -->
            <div style="display:flex; gap:10px;">
                <button type="submit" class="es-btn-save" style="width:auto; padding:0 24px;">
                    <i class="fa-regular fa-floppy-disk"></i> SIMPAN
                </button>
                <a href="<?= site_url('shop/varian/'.$barang->id) ?>" class="es-btn-back" style="width:auto; padding:0 20px;">
                    <i class="fa-solid fa-arrow-left"></i> KEMBALI
                </a>
            </div>

            <?= form_close() ?>
        </div>
    </div>

</div>

<script>
document.getElementById('inp-stok').addEventListener('input', function() {
    var s = parseInt(this.value) || 0;
    document.getElementById('diskon-section').style.display = s < 5 ? '' : 'none';
    if (s >= 5) {
        var inp = document.querySelector('input[name="harga_diskon"]');
        if (inp) inp.value = '';
    }
});

function previewVarianEdit(e) {
    var file = e.target.files[0];
    if (!file) return;
    var reader = new FileReader();
    reader.onload = function(ev) {
        var wrap = document.getElementById('prev-edit-wrap');
        var ph   = document.getElementById('prev-edit-ph');
        var img  = document.getElementById('prev-edit-img');
        if (wrap) wrap.style.display = 'block';
        if (ph)   ph.style.display   = 'none';
        if (img)  img.src = ev.target.result;
    };
    reader.readAsDataURL(file);
}
</script>