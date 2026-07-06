<?php defined('BASEPATH') OR exit('No direct script access allowed');
$fields   = isset($varian_fields) ? $varian_fields : [];
$kategori = $barang->kategori ?? 'Umum';
?>

<div class="es-content" style="padding-top:30px;">

    <?php if($this->session->flashdata('success')): ?>
        <div class="es-alert es-alert-success">
            <div class="es-alert-icon"><i class="fa-solid fa-check"></i></div>
            <?= $this->session->flashdata('success') ?>
        </div>
    <?php endif; ?>
    <?php if($this->session->flashdata('error')): ?>
        <div class="es-alert es-alert-error">
            <div class="es-alert-icon"><i class="fa-solid fa-xmark"></i></div>
            <?= $this->session->flashdata('error') ?>
        </div>
    <?php endif; ?>

    <!-- BACK LINK -->
    <div style="margin-bottom:18px;">
        <a href="<?= site_url('shop/edit/'.$barang->id) ?>" class="es-btn-back"
           style="width:fit-content; padding:0 16px; gap:7px; height:36px; font-size:13px;">
            <i class="fa-solid fa-arrow-left"></i> Kembali ke Edit Barang
        </a>
    </div>

    <!-- HEADER CARD -->
    <div class="es-form-card" style="margin-bottom:24px;">
        <div class="es-form-header" style="background:linear-gradient(130deg,#1e3a5f,#0369a1);">
            <h2><i class="fa-solid fa-layer-group"></i> Kelola Varian Produk</h2>
            <p>
                <?= htmlspecialchars($barang->nama_barang) ?>
                <span style="margin:0 6px; opacity:.5;">•</span>
                <span style="background:rgba(255,255,255,.15); padding:2px 10px; border-radius:20px; font-size:11px;">
                    <i class="fa-solid fa-tag" style="font-size:10px;"></i>
                    <?= htmlspecialchars($kategori) ?>
                </span>
            </p>
        </div>
    </div>

    <!-- FORM TAMBAH VARIAN -->
    <div class="es-form-card" style="margin-bottom:24px;">
        <div style="padding:18px 26px; border-bottom:1px solid #f1f5f9; display:flex; align-items:center; gap:9px;">
            <div style="width:32px; height:32px; background:#eff6ff; border-radius:8px; display:flex; align-items:center; justify-content:center;">
                <i class="fa-solid fa-plus" style="color:#1d4ed8; font-size:13px;"></i>
            </div>
            <span style="font-size:14px; font-weight:700; color:#0f172a;">Tambah Varian</span>
        </div>
        <div class="es-form-body">
            <?= form_open_multipart('shop/varian_store/'.$barang->id) ?>

            <!-- GRID FIELD UTAMA -->
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(160px, 1fr)); gap:16px; margin-bottom:16px;">

                <?php foreach ($fields as $label => $cfg):
                    $field_name = 'field_' . strtolower(str_replace(' ', '_', $label));
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
                                        <option value="<?= htmlspecialchars($opt) ?>"><?= htmlspecialchars($opt) ?></option>
                                    <?php endforeach; ?>
                                </optgroup>
                            <?php endforeach; ?>
                        </select>
                    <?php elseif ($cfg['type'] === 'dropdown' && !empty($cfg['options'])): ?>
                        <select name="<?= $field_name ?>" class="es-select" required>
                            <option value="">-- Pilih <?= htmlspecialchars($label) ?> --</option>
                            <?php foreach ($cfg['options'] as $opt): ?>
                                <option value="<?= htmlspecialchars($opt) ?>"><?= htmlspecialchars($opt) ?></option>
                            <?php endforeach; ?>
                        </select>
                    <?php else: ?>
                        <input type="text" name="<?= $field_name ?>" class="es-input"
                               placeholder="Masukkan <?= htmlspecialchars($label) ?>" required>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>

                <!-- HARGA -->
                <div>
                    <label style="display:block; font-size:12.5px; font-weight:600; color:#374151; margin-bottom:6px;">
                        <i class="fa-solid fa-tag" style="color:#1d4ed8; font-size:11px;"></i> Harga (Rp)
                    </label>
                    <input type="number" name="harga" class="es-input" placeholder="Contoh: 24999000" min="0" required>
                </div>

                <!-- STOK -->
                <div>
                    <label style="display:block; font-size:12.5px; font-weight:600; color:#374151; margin-bottom:6px;">
                        <i class="fa-solid fa-box" style="color:#1d4ed8; font-size:11px;"></i> Stok
                    </label>
                    <input type="number" name="stok" class="es-input" placeholder="Contoh: 10" min="0" required>
                </div>

            </div>

            <!-- FOTO VARIAN — full width di bawah grid -->
            <div style="margin-bottom:20px;">
                <label style="display:block; font-size:12.5px; font-weight:600; color:#374151; margin-bottom:6px;">
                    <i class="fa-regular fa-image" style="color:#1d4ed8; font-size:11px;"></i>
                    Foto Varian
                    <span style="font-weight:400; color:#94a3b8; font-size:11px;">(opsional)</span>
                </label>
                <label style="display:flex; align-items:center; justify-content:center; gap:12px; cursor:pointer; background:#f8fafc; border:1.5px dashed #cbd5e1; border-radius:10px; padding:14px 16px; transition:border-color .15s; width:100%; box-sizing:border-box;"
                       onmouseover="this.style.borderColor='#1d4ed8'" onmouseout="this.style.borderColor='#cbd5e1'">
                    <input type="file" name="gambar_varian" accept="image/*"
                           onchange="previewVarian(event,'prev-tambah')" style="display:none;">
                    <div id="prev-tambah-wrap" style="display:none;">
                        <img id="prev-tambah-img"
                             style="width:52px; height:52px; object-fit:contain; border-radius:6px; border:1px solid #e2e8f0; background:#fff;">
                    </div>
                    <div id="prev-tambah-ph" style="width:52px; height:52px; background:#e2e8f0; border-radius:6px; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                        <i class="fa-solid fa-plus" style="color:#94a3b8; font-size:16px;"></i>
                    </div>
                    <div style="text-align:center;">
                        <p style="font-size:12.5px; font-weight:600; color:#374151; margin:0;">Upload foto</p>
                        <p style="font-size:11px; color:#94a3b8; margin:2px 0 0;">JPG · PNG · WEBP</p>
                    </div>
                </label>
            </div>

            <!-- TOMBOL -->
            <div style="display:flex; gap:10px;">
                <button type="submit" class="es-btn-save" style="width:auto; padding:0 24px;">
                    <i class="fa-solid fa-plus"></i> Tambah Varian
                </button>
                <a href="<?= site_url('shop/edit/'.$barang->id) ?>" class="es-btn-back" style="width:auto; padding:0 20px;">
                    <i class="fa-solid fa-rotate-left"></i> Kembali
                </a>
            </div>

            <?= form_close() ?>
        </div>
    </div>

    <!-- TABEL DAFTAR VARIAN -->
    <div class="es-form-card" style="margin-bottom:32px; overflow:hidden;">
        <div style="padding:18px 26px; border-bottom:1px solid #f1f5f9; display:flex; align-items:center; justify-content:space-between;">
            <div style="display:flex; align-items:center; gap:9px;">
                <div style="width:32px; height:32px; background:#f0fdf4; border-radius:8px; display:flex; align-items:center; justify-content:center;">
                    <i class="fa-solid fa-list" style="color:#16a34a; font-size:13px;"></i>
                </div>
                <span style="font-size:14px; font-weight:700; color:#0f172a;">Daftar Varian</span>
            </div>
            <span style="background:#f1f5f9; color:#475569; font-size:12px; font-weight:600; padding:4px 12px; border-radius:20px;">
                <?= count($varian) ?> varian
            </span>
        </div>

        <?php if (empty($varian)): ?>
            <div style="text-align:center; padding:48px 24px; color:#94a3b8;">
                <i class="fa-solid fa-box-open" style="font-size:36px; margin-bottom:12px; display:block; opacity:.4;"></i>
                <p style="font-size:13.5px; font-weight:500;">Belum ada varian.</p>
                <p style="font-size:12px; margin-top:4px;">Tambahkan varian menggunakan form di atas.</p>
            </div>
        <?php else:
            $first      = $varian[0];
            $col_labels = $first->field_label ? explode(' | ', $first->field_label) : ['Spesifikasi'];
        ?>
            <div style="overflow-x:auto; width:100%;">
                <table style="width:100%; border-collapse:collapse; font-size:13px; table-layout:auto;">
                    <thead>
                        <tr style="background:#f8fafc; border-bottom:1.5px solid #e2e8f0;">
                            <th style="padding:10px 12px; text-align:left; font-size:11px; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:.04em; width:40px;">No</th>
                            <th style="padding:10px 12px; text-align:left; font-size:11px; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:.04em; width:60px;">Foto</th>
                            <?php foreach ($col_labels as $col): ?>
                                <th style="padding:10px 12px; text-align:left; font-size:11px; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:.04em;"><?= htmlspecialchars($col) ?></th>
                            <?php endforeach; ?>
                            <th style="padding:10px 12px; text-align:left; font-size:11px; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:.04em;">Harga</th>
                            <th style="padding:10px 12px; text-align:center; font-size:11px; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:.04em; width:65px;">Stok</th>
                            <th style="padding:10px 12px; text-align:center; font-size:11px; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:.04em; width:90px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($varian as $v):
                            $values     = $v->field_value ? explode(' | ', $v->field_value) : ['-'];
                            $has_diskon = isset($v->harga_diskon) && $v->harga_diskon > 0;
                            if ($v->stok > 10)    { $stok_bg = '#f0fdf4'; $stok_color = '#16a34a'; }
                            elseif ($v->stok > 0) { $stok_bg = '#fefce8'; $stok_color = '#ca8a04'; }
                            else                  { $stok_bg = '#fef2f2'; $stok_color = '#dc2626'; }
                        ?>
                        <tr style="border-bottom:1px solid #f1f5f9;">
                            <td style="padding:12px 12px; color:#94a3b8; font-weight:500;"><?= $no++ ?></td>
                            <td style="padding:8px 12px;">
                                <?php if (!empty($v->gambar)): ?>
                                    <img src="<?= base_url('upload/items/'.$v->gambar) ?>"
                                         style="width:44px; height:44px; object-fit:contain; border-radius:6px; border:1px solid #e2e8f0; background:#f8fafc;">
                                <?php else: ?>
                                    <div style="width:44px; height:44px; background:#f1f5f9; border-radius:6px; display:flex; align-items:center; justify-content:center;">
                                        <i class="fa-regular fa-image" style="color:#cbd5e1; font-size:14px;"></i>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <?php foreach ($values as $val): ?>
                                <td style="padding:12px 12px;">
                                    <span style="display:inline-flex; align-items:center; background:#f1f5f9; border:1px solid #e2e8f0; padding:3px 9px; border-radius:6px; font-size:12px; font-weight:600; color:#1e293b; white-space:nowrap;">
                                        <?= htmlspecialchars($val) ?>
                                    </span>
                                </td>
                            <?php endforeach; ?>
                            <td style="padding:12px 12px; white-space:nowrap;">
                                <?php if ($has_diskon): ?>
                                    <span style="font-size:11px; color:#94a3b8; text-decoration:line-through; display:block;">Rp <?= number_format($v->harga, 0, ',', '.') ?></span>
                                    <span style="font-size:13px; font-weight:700; color:#dc2626;">Rp <?= number_format($v->harga_diskon, 0, ',', '.') ?></span>
                                <?php else: ?>
                                    <span style="font-size:13px; font-weight:700; color:#1d4ed8;">Rp <?= number_format($v->harga, 0, ',', '.') ?></span>
                                <?php endif; ?>
                            </td>
                            <td style="padding:12px 12px; text-align:center;">
                                <span style="background:<?= $stok_bg ?>; color:<?= $stok_color ?>; font-size:12px; font-weight:700; padding:3px 10px; border-radius:20px;">
                                    <?= $v->stok ?>
                                </span>
                            </td>
                            <td style="padding:12px 12px; text-align:center;">
                                <div style="display:flex; flex-direction:column; gap:5px; align-items:center;">
                                    <a href="<?= site_url('shop/varian_edit/'.$v->id) ?>"
                                       style="display:inline-flex; align-items:center; justify-content:center; gap:4px; background:#eff6ff; border:1.5px solid #bfdbfe; color:#1d4ed8; padding:5px 0; border-radius:7px; font-size:11.5px; font-weight:600; text-decoration:none; width:70px;"
                                       onmouseover="this.style.background='#dbeafe'" onmouseout="this.style.background='#eff6ff'">
                                        <i class="fa-solid fa-pen-to-square" style="font-size:10px;"></i> Edit
                                    </a>
                                    <a href="<?= site_url('shop/varian_delete/'.$v->id) ?>"
                                       onclick="return confirm('Hapus varian ini?')"
                                       style="display:inline-flex; align-items:center; justify-content:center; gap:4px; background:#fff5f5; border:1.5px solid #fecaca; color:#ef4444; padding:5px 0; border-radius:7px; font-size:11.5px; font-weight:600; text-decoration:none; width:70px;"
                                       onmouseover="this.style.background='#fee2e2'" onmouseout="this.style.background='#fff5f5'">
                                        <i class="fa-solid fa-trash" style="font-size:10px;"></i> Hapus
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>

</div>

<script>
window.addEventListener('unload', function() {});

function previewVarian(e, wrapId) {
    var file = e.target.files[0];
    if (!file) return;
    var reader = new FileReader();
    reader.onload = function(ev) {
        var wrap = document.getElementById(wrapId + '-wrap');
        var ph   = document.getElementById(wrapId + '-ph');
        var img  = document.getElementById(wrapId + '-img');
        if (wrap) wrap.style.display = 'block';
        if (ph)   ph.style.display   = 'none';
        if (img)  img.src = ev.target.result;
    };
    reader.readAsDataURL(file);
}

window.addEventListener('pageshow', function(event) {
    if (event.persisted) {
        window.location.reload();
    }
});
</script>