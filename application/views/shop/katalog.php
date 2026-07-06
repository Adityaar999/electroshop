<?php defined('BASEPATH') OR exit('No direct script access allowed');

$ikon_kategori = [
    'Handphone'       => 'fa-mobile-screen',
    'Laptop'          => 'fa-laptop',
    'TWS'             => 'fa-circle-dot',
    'Headphone'       => 'fa-headphones',
    'Tablet'          => 'fa-tablet-screen-button',
    'Smartwatch'      => 'fa-clock',
    'Speaker'         => 'fa-volume-high',
    'TWS & Headphone' => 'fa-headphones',
    'Kamera'          => 'fa-camera',
    'Aksesoris'       => 'fa-plug',
    'Lainnya'         => 'fa-box',
];

$warna_hex = [
    'Black'             => '#1a1a1a',
    'White'             => '#f0f0f0',
    'Silver'            => '#c0c0c0',
    'Gold'              => '#d4a843',
    'Blue'              => '#2563eb',
    'Sky Blue'          => '#38bdf8',
    'Deep Blue'         => '#1e3a8a',
    'Midnight'          => '#1c1c2e',
    'Starlight'         => '#f5f0e8',
    'Space Gray'        => '#6b7280',
    'Space Black'       => '#1f1f1f',
    'Pink'              => '#f472b6',
    'Red'               => '#dc2626',
    'Green'             => '#16a34a',
    'Yellow'            => '#facc15',
    'Purple'            => '#9333ea',
    'Orange'            => '#f97316',
    'Cosmic Orange'     => '#e8580a',
    'Sage'              => '#8aad8a',
    'Mist Blue'         => '#a8c4d4',
    'Lavender'          => '#c4b5fd',
    'Teal'              => '#0d9488',
    'Ultramarine'       => '#3730a3',
    'Sand'              => '#d4b896',
    'Gray'              => '#9ca3af',
    'Natural Titanium'  => '#c8b89a',
    'White Titanium'    => '#e8e4de',
    'Black Titanium'    => '#2d2d2d',
    'Blue Titanium'     => '#4a6fa5',
    'Desert Titanium'   => '#c8a87a',
    'Midnight Blue'     => '#1e3a6e',
    'Smoky Pink'        => '#d4a0a0',
    'Sand Pink'         => '#e8c4b4',
    'Navy'              => '#1e3a5f',
    'Mint'              => '#6ee7b7',
    'Icy Blue'          => '#bae6fd',
    'Silver Shadow'     => '#94a3b8',
    'Coral Red'         => '#f87171',
    'Blue Black'        => '#1e2d4f',
    'Pink Gold'         => '#f4c2c2',
    'Onyx Black'        => '#111111',
    'Marble Gray'       => '#9e9e9e',
    'Cobalt Violet'     => '#6d28d9',
    'Amber Yellow'      => '#f59e0b',
    'Jade Green'        => '#059669',
    'Sapphire Blue'     => '#1d4ed8',
    'Sandstone Orange'  => '#ea580c',
    'Titanium Black'    => '#1c1c1c',
    'Titanium Gray'     => '#6b7280',
    'Titanium Violet'   => '#7c3aed',
    'Titanium Yellow'   => '#ca8a04',
    'Titanium Green'    => '#15803d',
    'Titanium Blue'     => '#1d4ed8',
    'Titanium Orange'   => '#c2410c',
    'Moon White'        => '#f5f5f0',
    'Silver Military'   => '#8a9a7a',
    'OakWood'           => '#8b6543',
    'Dark Grey'         => '#4b5563',
    'Light Grey'        => '#d1d5db',
    'Light Green'       => '#86efac',
    'Neon Green'        => '#4ade80',
    'Anchor Blue'       => '#1e40af',
    'Terra Cotta'       => '#c2705a',
    'Light Blue'        => '#93c5fd',
    'Graphite'          => '#374151',
    'Jet Black'         => '#0a0a0a',
    'Rose Gold'         => '#f9a8d4',
    'Slate'             => '#64748b',
    'Natural'           => '#d6c9b4',
    'Midnight Blue'     => '#1e3a6e',
];
?>

<style>
.ek-overlay{display:none;position:fixed;inset:0;background:transparent;z-index:500;align-items:center;justify-content:center;padding:16px;}
.ek-overlay.open{display:flex;}
.ek-backdrop{position:fixed;inset:0;background:rgba(15,23,42,.35);backdrop-filter:blur(8px);-webkit-backdrop-filter:blur(8px);z-index:-1;cursor:pointer;}
.ek-modal{background:transparent;border-radius:20px;width:auto;max-width:95vw;max-height:85vh;overflow:visible;display:flex;position:relative;gap:0;align-items:stretch;}
.ek-modal-img{flex-shrink:0;background:#fff;display:flex;align-items:center;justify-content:center;overflow:hidden;padding:0;border-radius:20px 0 0 20px;max-height:85vh;}
.ek-modal-img img{width:auto;height:85vh;max-height:85vh;max-width:60vw;object-fit:contain;display:block;}
.ek-modal-body{width:460px;flex-shrink:0;overflow-y:auto;max-height:85vh;padding:32px 34px;background:#fff;border-radius:0 20px 20px 0;border-left:1px solid rgba(0,0,0,.06);}
.ek-close{position:absolute;top:-12px;right:-12px;width:34px;height:34px;background:rgba(255,255,255,.95);border:none;border-radius:50%;cursor:pointer;font-size:15px;display:flex;align-items:center;justify-content:center;color:#374151;z-index:10;transition:background .15s;box-shadow:0 2px 8px rgba(0,0,0,.15);}
.ek-close:hover{background:#f1f5f9;}
.ek-kategori-badge{font-size:11.5px;font-weight:700;color:#1d4ed8;letter-spacing:1px;text-transform:uppercase;background:#eff6ff;padding:4px 11px;border-radius:20px;display:inline-block;margin-bottom:12px;}
.ek-nama{font-size:24px;font-weight:800;color:#0f172a;line-height:1.3;margin-bottom:10px;}
.ek-harga{font-size:28px;font-weight:800;color:#1d4ed8;margin-bottom:3px;}
.ek-harga-coret{font-size:14px;color:#9ca3af;text-decoration:line-through;margin-bottom:12px;display:none;}
.ek-stok{display:inline-flex;align-items:center;gap:7px;font-size:13.5px;font-weight:600;padding:6px 13px;border-radius:20px;margin-bottom:16px;}
.ek-stok.ok{background:#f0fdf4;color:#15803d;}
.ek-stok.warn{background:#fef9c3;color:#92400e;}
.ek-stok.out{background:#fef2f2;color:#dc2626;}
.ek-stok.pilih{background:#f1f5f9;color:#64748b;}
.ek-stok.none{background:#fef2f2;color:#dc2626;}
.ek-desc{font-size:14.5px;color:#475569;line-height:1.8;margin-bottom:20px;padding-bottom:18px;border-bottom:1px solid #f1f5f9;}
.ek-field-label{font-size:12.5px;font-weight:700;color:#374151;text-transform:uppercase;letter-spacing:.5px;margin-bottom:10px;display:flex;align-items:center;gap:6px;}
.ek-field-label em{font-style:normal;font-weight:500;color:#64748b;text-transform:none;letter-spacing:0;font-size:14px;}
.ek-color-wrap{display:flex;gap:8px;flex-wrap:wrap;margin-bottom:18px;}
.ek-color-btn{width:30px;height:30px;border-radius:50%;border:2px solid transparent;cursor:pointer;transition:transform .15s,box-shadow .15s;outline:none;}
.ek-color-btn:hover{transform:scale(1.1);}
.ek-color-btn.active{box-shadow:0 0 0 2px #fff,0 0 0 4px #1d4ed8;}
.ek-box-wrap{display:flex;gap:8px;flex-wrap:wrap;margin-bottom:18px;}
.ek-box-btn{padding:8px 16px;border:1.5px solid #e2e8f0;border-radius:8px;font-size:14px;font-weight:500;color:#374151;background:#fff;cursor:pointer;transition:all .15s;outline:none;}
.ek-box-btn:hover{border-color:#93c5fd;color:#1d4ed8;}
.ek-box-btn.active{border-color:#1d4ed8;background:#eff6ff;color:#1d4ed8;font-weight:700;}
.ek-box-btn.unavail{opacity:.35;cursor:not-allowed;text-decoration:line-through;}
.ek-no-varian{background:#f8fafc;border:1px dashed #e2e8f0;border-radius:10px;padding:14px 16px;font-size:13px;color:#64748b;margin-bottom:16px;}
.ek-loading{text-align:center;padding:48px;color:#94a3b8;}
.es-card-katalog{cursor:pointer;}
.es-card-katalog:hover{transform:translateY(-3px);box-shadow:0 10px 28px rgba(13,27,46,.12);}
.ek-zoom-btn{position:absolute;bottom:16px;right:16px;width:38px;height:38px;background:rgba(255,255,255,.95);border:1px solid rgba(0,0,0,.1);border-radius:50%;cursor:pointer;display:flex;align-items:center;justify-content:center;font-size:14px;color:#374151;z-index:5;transition:background .15s;}
.ek-zoom-btn:hover{background:#f1f5f9;}
.ek-zoom-overlay{display:none;position:fixed;inset:0;background:rgba(0,0,0,.85);z-index:600;align-items:center;justify-content:center;padding:40px;}
.ek-zoom-overlay.open{display:flex;}
.ek-zoom-inner{position:relative;max-width:90%;max-height:90vh;display:flex;}
.ek-zoom-overlay img{max-width:100%;max-height:90vh;object-fit:contain;border-radius:8px;}
.ek-zoom-close{position:absolute;top:-16px;right:-16px;width:36px;height:36px;background:#fff;border:none;border-radius:50%;color:#374151;font-size:15px;cursor:pointer;display:flex;align-items:center;justify-content:center;box-shadow:0 4px 12px rgba(0,0,0,.3);z-index:2;}
.ek-zoom-close:hover{background:#f1f5f9;}

/* Search di atas sidebar */
.es-sidebar-search { padding:14px 16px 0; }
.es-sidebar-search form { display:flex; align-items:center; gap:8px; background:#f8fafc; border:1.5px solid #e2e8f0; border-radius:10px; padding:8px 12px; transition:border-color .15s; }
.es-sidebar-search form:focus-within { border-color:#1d4ed8; background:#fff; }
.es-sidebar-search input { border:none; background:transparent; outline:none; font-size:13px; color:#1e293b; font-family:inherit; width:100%; }
.es-sidebar-search input::placeholder { color:#94a3b8; }
.es-sidebar-search button { background:none; border:none; cursor:pointer; padding:0; color:#94a3b8; display:flex; align-items:center; }
.es-sidebar-search button:hover { color:#1d4ed8; }
</style>

<div class="es-content">

    <?php if ($this->session->flashdata('success')): ?>
    <div class="es-alert es-alert-success">
        <div class="es-alert-icon"><i class="fa-solid fa-check"></i></div>
        <?= $this->session->flashdata('success') ?>
    </div>
    <?php endif; ?>

    <div class="es-katalog-wrap">

        <!-- SIDEBAR -->
        <aside class="es-sidebar">

            <div class="es-sidebar-head">
                <h3><i class="fa-solid fa-layer-group"></i> Etalase Toko (<?= $total_produk ?>)</h3>
            </div>

            <!-- SEARCH DI BAWAH ETALASE TOKO -->
            <div class="es-sidebar-search" style="padding:12px 16px;">
                <form action="<?= site_url('shop/search') ?>" method="get">
                    <i class="fa-solid fa-magnifying-glass" style="font-size:12px; color:#94a3b8; flex-shrink:0;"></i>
                    <input type="text" name="q" placeholder="Cari barang..." value="<?= isset($keyword) ? htmlspecialchars($keyword) : '' ?>">
                    <button type="submit"><i class="fa-solid fa-arrow-right" style="font-size:11px;"></i></button>
                </form>
            </div>
            <div class="es-sidebar-menu">
                <a href="<?= site_url('katalog') ?>"
                   class="es-sidebar-item <?= (!$aktif_kategori) ? 'active' : '' ?>">
                    <span class="es-sidebar-item-text">
                        <i class="fa-solid fa-th-large" style="color:#1d4ed8;width:16px;"></i>
                        Semua Produk
                    </span>
                    <span class="es-sidebar-item-count"><?= $total_produk ?></span>
                </a>
                <div class="es-sidebar-divider"></div>
                <?php foreach ($kategori_list as $kat):
                    $icon      = $ikon_kategori[$kat->kategori] ?? 'fa-box';
                    $is_active = ($aktif_kategori == rawurlencode($kat->kategori));
                    $url_kat   = site_url('katalog/' . rawurlencode($kat->kategori));
                ?>
                <a href="<?= $url_kat ?>"
                   class="es-sidebar-item <?= $is_active ? 'active' : '' ?>">
                    <span class="es-sidebar-item-text">
                        <i class="fa-solid <?= $icon ?>" style="color:#1d4ed8;width:16px;"></i>
                        <?= htmlspecialchars($kat->kategori) ?>
                    </span>
                    <span class="es-sidebar-item-count"><?= $kat->total ?></span>
                </a>
                <?php endforeach; ?>
            </div>
        </aside>

        <!-- PRODUK GRID -->
        <div>
            <div class="es-katalog-topbar">
                <div>
                    <div class="es-katalog-title"><?= htmlspecialchars($page_title) ?></div>
                    <div class="es-katalog-count"><?= count($barang) ?> produk ditampilkan</div>
                </div>
                <select class="es-sort-select">
                    <option>Terbaru</option>
                    <option>Harga Terendah</option>
                    <option>Harga Tertinggi</option>
                </select>
            </div>

            <?php if (empty($barang)): ?>
            <div class="es-empty">
                <i class="fa-solid fa-box-open"></i>
                <p>Belum ada produk di kategori ini.</p>
            </div>
            <?php else: ?>
            <div class="es-grid">
                <?php foreach ($barang as $i => $item): ?>
                <div class="es-card-katalog" onclick="bukaProduk(<?= (int)$item->id ?>)">
                    <div class="es-card-img">
                        <?php if ($item->gambar): ?>
                            <img src="<?= base_url('upload/items/'.$item->gambar) ?>"
                                 alt="<?= htmlspecialchars($item->nama_barang) ?>">
                        <?php else: ?>
                            <i class="fa-solid fa-laptop es-card-img-ph"></i>
                        <?php endif; ?>
                        <?php if ($i % 3 === 0): ?>
                            <span class="es-badge es-badge-new">NEW</span>
                        <?php elseif ($i % 3 === 2): ?>
                            <span class="es-badge es-badge-promo">PROMO</span>
                        <?php endif; ?>
                        <span class="es-card-kat"><?= htmlspecialchars($item->kategori ?? 'Lainnya') ?></span>
                    </div>
                    <div class="es-card-body">
                        <div class="es-card-name"><?= htmlspecialchars($item->nama_barang) ?></div>
                        <div class="es-card-price">Rp <?= number_format($item->harga ?? 0, 0, ',', '.') ?></div>
                        <div class="es-card-desc"><?= nl2br(htmlspecialchars($item->deskripsi)) ?></div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>

    </div>
</div>

<!-- MODAL -->
<div class="ek-overlay" id="ekOverlay">
    <div class="ek-backdrop" onclick="tutupModal()"></div>
    <div class="ek-modal">
        <button class="ek-close" onclick="tutupModal()">✕</button>
        <div class="ek-modal-img" id="ekImg" style="position:relative;">
            <i class="fa-solid fa-laptop ek-modal-img-ph"></i>
        </div>
        <div class="ek-modal-body" id="ekBody">
            <div class="ek-loading">
                <i class="fa-solid fa-spinner fa-spin fa-2x"></i>
                <p style="margin-top:12px;font-size:14px;">Memuat...</p>
            </div>
        </div>
    </div>
</div>

<div class="ek-zoom-overlay" id="ekZoomOverlay" onclick="toggleZoom()">
    <div class="ek-zoom-inner" onclick="event.stopPropagation()">
        <button class="ek-zoom-close" onclick="toggleZoom()">✕</button>
        <img id="ekZoomImg" src="" alt="">
    </div>
</div>

<script>
var BASE = '<?= base_url() ?>';
var HEX  = <?= json_encode($warna_hex) ?>;
var currentImgSrc = '';

function bukaProduk(id) {
    var overlay = document.getElementById('ekOverlay');
    var body    = document.getElementById('ekBody');
    var imgWrap = document.getElementById('ekImg');
    body.innerHTML = '<div class="ek-loading"><i class="fa-solid fa-spinner fa-spin fa-2x"></i><p style="margin-top:12px;font-size:14px;">Memuat...</p></div>';
    imgWrap.innerHTML = '<i class="fa-solid fa-laptop ek-modal-img-ph"></i>';
    overlay.classList.add('open');
    document.body.style.overflow = 'hidden';

    var xhr = new XMLHttpRequest();
    xhr.open('GET', BASE + 'index.php/shop/detail/' + id, true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            try { renderModal(JSON.parse(xhr.responseText), imgWrap, body); }
            catch(e) { body.innerHTML = '<p style="padding:20px;color:red;">Gagal memuat data.</p>'; }
        }
    };
    xhr.onerror = function() {
        body.innerHTML = '<p style="padding:20px;color:red;">Koneksi gagal.</p>';
    };
    xhr.send();
}

function tutupModal() {
    document.getElementById('ekOverlay').classList.remove('open');
    document.body.style.overflow = '';
}

function toggleZoom() {
    var overlay = document.getElementById('ekZoomOverlay');
    var zoomImg = document.getElementById('ekZoomImg');
    if (overlay.classList.contains('open')) {
        overlay.classList.remove('open');
    } else {
        zoomImg.src = currentImgSrc;
        overlay.classList.add('open');
    }
}

document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        var zoomOverlay = document.getElementById('ekZoomOverlay');
        if (zoomOverlay.classList.contains('open')) {
            toggleZoom();
        } else {
            tutupModal();
        }
    }
});

function renderModal(p, imgWrap, body) {
    // Gambar
    if (p.gambar) {
        currentImgSrc = p.gambar;
        imgWrap.innerHTML = '<img src="' + p.gambar + '" alt="' + esc(p.nama_barang) + '" style="width:100%;height:100%;object-fit:contain;cursor:zoom-in;transition:opacity .18s ease;" onclick="toggleZoom()">'
            + '<button class="ek-zoom-btn" onclick="toggleZoom()"><i class="fa-solid fa-magnifying-glass-plus"></i></button>';
    }

    // Kumpulkan field unik dari semua varian
    var fieldKeys = [];
    var fieldVals = {};
    p.varian.forEach(function(v) {
        Object.keys(v.specs).forEach(function(k) {
            if (fieldKeys.indexOf(k) === -1) { fieldKeys.push(k); fieldVals[k] = []; }
            if (fieldVals[k].indexOf(v.specs[k]) === -1) fieldVals[k].push(v.specs[k]);
        });
    });

    // State pilihan saat ini
    var pilihan = {};
    fieldKeys.forEach(function(k) { pilihan[k] = null; });

    var gambarUtama  = p.gambar;
    var gambarByWarna = {};
    p.varian.forEach(function(v) {
        if (v.gambar && v.specs['Warna']) {
            gambarByWarna[v.specs['Warna']] = v.gambar;
        }
    });

    function getMatch() {
        var match = null;
        p.varian.forEach(function(v) {
            var ok = true;
            fieldKeys.forEach(function(k) { if (pilihan[k] && v.specs[k] !== pilihan[k]) ok = false; });
            if (ok) match = v;
        });
        return match;
    }

    function isAvail(targetKey, targetVal) {
        return p.varian.some(function(v) {
            if (v.specs[targetKey] !== targetVal) return false;
            var ok = true;
            fieldKeys.forEach(function(k) {
                if (k !== targetKey && pilihan[k] && v.specs[k] !== pilihan[k]) ok = false;
            });
            return ok;
        });
    }

    function updateHarga() {
        var m   = getMatch();
        var hEl = document.getElementById('ek-harga');
        var cEl = document.getElementById('ek-coret');
        var sEl = document.getElementById('ek-stok');
        if (!hEl) return;

        if (m) {
            var h = (m.diskon && m.harga_diskon > 0) ? m.harga_diskon : m.harga;
            hEl.textContent = 'Rp ' + h.toLocaleString('id-ID');
            if (m.diskon && m.harga_diskon > 0) {
                cEl.textContent = 'Rp ' + m.harga.toLocaleString('id-ID');
                cEl.style.display = 'block';
            } else {
                cEl.style.display = 'none';
            }
            var sc = m.stok > 5 ? 'ok' : (m.stok > 0 ? 'warn' : 'out');
            var st = m.stok > 5
                ? '<i class="fa-solid fa-check"></i> Tersedia (' + m.stok + ' unit)'
                : (m.stok > 0
                    ? '<i class="fa-solid fa-triangle-exclamation"></i> Stok terbatas (' + m.stok + ' unit)'
                    : '<i class="fa-solid fa-xmark"></i> Stok habis');
            sEl.className = 'ek-stok ' + sc;
            sEl.innerHTML = st;
        } else {
            hEl.textContent = 'Rp ' + p.harga.toLocaleString('id-ID');
            cEl.style.display = 'none';
            if (fieldKeys.length > 0) {
                sEl.className = 'ek-stok pilih';
                sEl.innerHTML = '<i class="fa-solid fa-hand-pointer"></i> Pilih varian untuk lihat stok';
            }
        }
    }

    function updateSelectors() {
        fieldKeys.forEach(function(k) {
            var isWarna = k.toLowerCase().indexOf('warna') !== -1;
            document.querySelectorAll('[data-field="' + k + '"]').forEach(function(btn) {
                var v = btn.getAttribute('data-val');
                btn.classList.toggle('active', pilihan[k] === v);
                if (!isWarna) btn.classList.toggle('unavail', !isAvail(k, v));
            });
            var lbl = document.getElementById('lbl-' + k);
            if (lbl) lbl.textContent = (pilihan[k] ? ' — ' + pilihan[k] : '');
        });

        var imgEl  = document.getElementById('ekImg');
        var newSrc = (pilihan['Warna'] && gambarByWarna[pilihan['Warna']]) ? gambarByWarna[pilihan['Warna']] : gambarUtama;

        if (imgEl && newSrc && newSrc !== currentImgSrc) {
            var existingImg = imgEl.querySelector('img');
            if (existingImg) {
                existingImg.style.opacity = '0';
                setTimeout(function() {
                    currentImgSrc = newSrc;
                    existingImg.src = currentImgSrc;
                    existingImg.onload = function() { existingImg.style.opacity = '1'; };
                }, 180);
            } else {
                currentImgSrc = newSrc;
                imgEl.innerHTML = '<img src="' + currentImgSrc + '" alt="" style="width:100%;height:100%;object-fit:contain;cursor:zoom-in;transition:opacity .18s ease;opacity:0;" onclick="toggleZoom()">'
                    + '<button class="ek-zoom-btn" onclick="toggleZoom()"><i class="fa-solid fa-magnifying-glass-plus"></i></button>';
                var freshImg = imgEl.querySelector('img');
                freshImg.onload = function() { freshImg.style.opacity = '1'; };
            }
        }
        updateHarga();
    }

    // Build HTML
    var html = '';
    html += '<span class="ek-kategori-badge">' + esc(p.kategori) + '</span>';
    html += '<div class="ek-nama">' + esc(p.nama_barang) + '</div>';
    html += '<div class="ek-harga" id="ek-harga">Rp ' + p.harga.toLocaleString('id-ID') + '</div>';
    html += '<div class="ek-harga-coret" id="ek-coret"></div>';

    if (p.varian.length === 0) {
        // Tidak ada varian sama sekali
        html += '<div class="ek-stok none" id="ek-stok"><i class="fa-solid fa-xmark"></i> Tidak Tersedia</div>';
    } else {
        html += '<div class="ek-stok pilih" id="ek-stok"><i class="fa-solid fa-hand-pointer"></i> Pilih varian untuk lihat stok</div>';
    }

    html += '<div class="ek-desc">' + esc(p.deskripsi).replace(/\n/g, '<br>') + '</div>';

    if (p.varian.length === 0) {
        html += '<div class="ek-no-varian"><i class="fa-solid fa-circle-info" style="margin-right:6px;color:#1d4ed8;"></i>Produk ini belum memiliki varian.</div>';
    } else {
        fieldKeys.forEach(function(k) {
            var isWarna = k.toLowerCase().indexOf('warna') !== -1;
            html += '<div class="ek-field-label">' + esc(k);
            if (isWarna) html += '<em id="lbl-' + k + '"></em>';
            html += '</div>';

            if (isWarna) {
                html += '<div class="ek-color-wrap">';
                fieldVals[k].forEach(function(val) {
                    var hex   = HEX[val] || '#94a3b8';
                    var light = isLight(hex);
                    html += '<button class="ek-color-btn" data-field="' + k + '" data-val="' + esc(val) + '"'
                          + ' style="background:' + hex + ';' + (light ? 'border-color:#d1d5db;' : '') + '"'
                          + ' title="' + esc(val) + '"></button>';
                });
                html += '</div>';
            } else {
                html += '<div class="ek-box-wrap">';
                fieldVals[k].forEach(function(val) {
                    html += '<button class="ek-box-btn" data-field="' + k + '" data-val="' + esc(val) + '">'
                          + esc(val) + '</button>';
                });
                html += '</div>';
            }
        });
    }

    body.innerHTML = html;

    body.querySelectorAll('[data-field]').forEach(function(btn) {
        btn.addEventListener('click', function() {
            if (this.classList.contains('unavail')) return;
            var k   = this.getAttribute('data-field');
            var val = this.getAttribute('data-val');
            pilihan[k] = (pilihan[k] === val) ? null : val;
            updateSelectors();
        });
    });

    updateSelectors();
}

function esc(s) {
    return String(s)
        .replace(/&/g,'&amp;').replace(/</g,'&lt;')
        .replace(/>/g,'&gt;').replace(/"/g,'&quot;');
}

function isLight(hex) {
    var r = parseInt(hex.slice(1,3),16);
    var g = parseInt(hex.slice(3,5),16);
    var b = parseInt(hex.slice(5,7),16);
    return (r*299 + g*587 + b*114)/1000 > 180;
}
</script>