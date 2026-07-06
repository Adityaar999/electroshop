*, *::before, *::after { margin:0; padding:0; box-sizing:border-box; }
html, body { height:100%; }
body { font-family:'Inter',system-ui,sans-serif; background:#eef2f7; display:flex; flex-direction:column; min-height:100vh; color:#1e293b; }

/* MAIN */
.es-main { flex:1; }

/* BANNER */
.es-banner { background:linear-gradient(130deg,#1e3a5f 0%,#1d4ed8 60%,#2563eb 100%); padding:28px 32px; position:relative; overflow:hidden; }
.es-banner::before { content:''; position:absolute; right:-80px; top:-80px; width:300px; height:300px; border-radius:50%; background:rgba(255,255,255,.05); }
.es-banner::after  { content:''; position:absolute; right:80px; bottom:-80px; width:200px; height:200px; border-radius:50%; background:rgba(255,255,255,.04); }
.es-banner-inner { display:flex; align-items:center; justify-content:space-between; gap:20px; position:relative; z-index:1; }
.es-banner-text h1 { color:#fff; font-size:20px; font-weight:800; letter-spacing:-.4px; margin-bottom:5px; }
.es-banner-text p  { color:rgba(255,255,255,.75); font-size:13px; line-height:1.5; max-width:400px; }
.es-banner-stats { display:flex; gap:10px; flex-shrink:0; }
.es-stat { background:rgba(255,255,255,.12); border:1px solid rgba(255,255,255,.18); border-radius:12px; padding:12px 18px; text-align:center; min-width:90px; }
.es-stat-label { color:rgba(255,255,255,.7); font-size:10.5px; font-weight:600; letter-spacing:.6px; text-transform:uppercase; margin-bottom:4px; }
.es-stat-value { color:#fff; font-size:22px; font-weight:800; }
.es-stat-value span { color:#93c5fd; font-size:14px; }

/* CONTENT */
.es-content { max-width:1200px; margin:0 auto; padding:24px 32px; }

/* ALERTS */
.es-alert { display:flex; align-items:center; gap:10px; padding:11px 15px; border-radius:9px; font-size:13px; font-weight:500; margin-bottom:18px; }
.es-alert-success { background:#f0fdf4; border:1px solid #bbf7d0; color:#15803d; }
.es-alert-error   { background:#fef2f2; border:1px solid #fecaca; color:#dc2626; }
.es-alert-icon { width:20px; height:20px; border-radius:50%; display:flex; align-items:center; justify-content:center; flex-shrink:0; font-size:11px; }
.es-alert-success .es-alert-icon { background:#22c55e; color:#fff; }
.es-alert-error   .es-alert-icon { background:#ef4444; color:#fff; }

/* GRID HEADER */
.es-grid-header { display:flex; align-items:center; justify-content:space-between; margin-bottom:16px; flex-wrap:wrap; gap:10px; }
.es-grid-title { font-size:14.5px; font-weight:700; color:#0f172a; }
.es-grid-meta { font-size:12.5px; color:#64748b; background:#f1f5f9; padding:4px 10px; border-radius:20px; }
.es-grid-actions { display:flex; gap:8px; align-items:center; flex-wrap:wrap; }
.es-filter-btn { display:flex; align-items:center; gap:6px; background:#fff; border:1px solid #e2e8f0; border-radius:8px; height:36px; padding:0 13px; font-size:12.5px; color:#475569; cursor:pointer; font-family:inherit; transition:border-color .15s; }
.es-filter-btn:hover { border-color:#1d4ed8; color:#1d4ed8; }
.es-filter-btn.danger:hover { border-color:#ef4444; color:#ef4444; }

/* PRODUCT GRID */
.es-grid { display:grid; grid-template-columns:repeat(auto-fill,minmax(260px,1fr)); gap:16px; }
.es-card { background:#fff; border-radius:14px; border:1px solid #e8edf4; overflow:hidden; transition:transform .18s, box-shadow .18s; display:flex; flex-direction:column; }
.es-card:hover { transform:translateY(-3px); box-shadow:0 10px 28px rgba(13,27,46,.1); }
.es-card-img { height:175px; overflow:hidden; position:relative; background:linear-gradient(145deg,#eef3fb,#dde8f7); display:flex; align-items:center; justify-content:center; }
.es-card-img img { width:100%; height:100%; object-fit:cover; display:block; }
.es-card-img-ph { font-size:52px; opacity:.2; }
.es-badge { position:absolute; top:10px; left:10px; font-size:9.5px; font-weight:700; letter-spacing:.6px; text-transform:uppercase; padding:4px 8px; border-radius:5px; }
.es-badge-new   { background:#1d4ed8; color:#fff; }
.es-badge-promo { background:#dc2626; color:#fff; }
.es-card-kat { position:absolute; bottom:10px; right:10px; background:rgba(0,0,0,.45); color:#fff; font-size:10px; font-weight:600; padding:3px 8px; border-radius:5px; backdrop-filter:blur(4px); }
.es-card-body { padding:14px 16px; flex:1; }
.es-card-name  { font-size:13.5px; font-weight:700; color:#0f172a; margin-bottom:3px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; }
.es-card-price { font-size:14.5px; font-weight:800; color:#1d4ed8; margin-bottom:5px; }
.es-card-desc  { font-size:11.5px; color:#64748b; line-height:1.55; display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; overflow:hidden; }
.es-card-foot  { padding:10px 16px 13px; border-top:1px solid #f1f5f9; display:flex; gap:8px; }
.es-btn-edit { flex:1; height:32px; border:1.5px solid #1d4ed8; background:transparent; color:#1d4ed8; border-radius:7px; font-size:12px; font-weight:600; cursor:pointer; font-family:inherit; display:flex; align-items:center; justify-content:center; gap:5px; text-decoration:none; transition:background .12s; }
.es-btn-edit:hover { background:#eff6ff; }
.es-btn-del { width:32px; height:32px; border:1.5px solid #fecaca; background:#fff5f5; color:#ef4444; border-radius:7px; cursor:pointer; font-family:inherit; display:flex; align-items:center; justify-content:center; transition:background .12s; }
.es-btn-del:hover { background:#fee2e2; }

/* EMPTY */
.es-empty { text-align:center; padding:70px 0; color:#94a3b8; }
.es-empty i { font-size:50px; margin-bottom:12px; display:block; }
.es-empty p { font-size:14.5px; margin-bottom:16px; }

/* MODAL */
.es-overlay { display:none; position:fixed; inset:0; background:rgba(15,23,42,.45); z-index:200; align-items:center; justify-content:center; }
.es-overlay.open { display:flex; }
.es-modal { background:#fff; border-radius:16px; padding:30px 26px; max-width:380px; width:90%; text-align:center; box-shadow:0 20px 50px rgba(0,0,0,.18); }
.es-modal-icon { font-size:38px; margin-bottom:10px; }
.es-modal h3 { font-size:16px; font-weight:700; color:#0f172a; margin-bottom:6px; }
.es-modal p  { font-size:13px; color:#64748b; line-height:1.5; }
.es-modal-btns { display:flex; gap:10px; justify-content:center; margin-top:20px; }
.es-modal-cancel  { height:38px; padding:0 18px; border:1.5px solid #e2e8f0; background:#fff; color:#475569; border-radius:8px; font-size:13px; font-weight:500; cursor:pointer; font-family:inherit; }
.es-modal-confirm { height:38px; padding:0 18px; background:#dc2626; color:#fff; border:none; border-radius:8px; font-size:13px; font-weight:600; cursor:pointer; font-family:inherit; display:flex; align-items:center; gap:6px; text-decoration:none; }
.es-modal-confirm:hover { background:#b91c1c; color:#fff; }

/* FORM */
.es-form-wrap { max-width:820px; margin:0 auto; }
.es-form-card { background:#fff; border-radius:16px; border:1px solid #e2e8f0; overflow:hidden; }
.es-form-header { background:linear-gradient(130deg,#1e3a5f,#1d4ed8); padding:20px 26px; position:relative; overflow:hidden; }
.es-form-header::after { content:''; position:absolute; right:-50px; top:-50px; width:180px; height:180px; border-radius:50%; background:rgba(255,255,255,.06); }
.es-form-header h2 { color:#fff; font-size:17px; font-weight:700; margin-bottom:2px; display:flex; align-items:center; gap:9px; position:relative; z-index:1; }
.es-form-header p  { color:rgba(255,255,255,.75); font-size:12.5px; position:relative; z-index:1; }
.es-form-body { padding:26px; }
.es-form-row { display:grid; grid-template-columns:1fr 1fr; gap:24px; }
.es-field { margin-bottom:16px; }
.es-field label { display:flex; align-items:center; gap:6px; font-size:12.5px; font-weight:600; color:#374151; margin-bottom:6px; }
.es-field label i { color:#1d4ed8; font-size:13px; }
.es-input, .es-textarea, .es-select { width:100%; border:1.5px solid #e2e8f0; border-radius:9px; padding:10px 13px; font-size:13px; font-family:inherit; color:#1e293b; background:#f8fafc; outline:none; transition:border-color .15s; }
.es-input:focus, .es-textarea:focus, .es-select:focus { border-color:#1d4ed8; background:#fff; box-shadow:0 0 0 3px rgba(29,78,216,.08); }
.es-textarea { resize:vertical; min-height:95px; line-height:1.5; }
.es-upload-zone { border:2px dashed #c7d4e8; border-radius:10px; padding:20px; text-align:center; cursor:pointer; background:#f8fafc; transition:border-color .15s; position:relative; }
.es-upload-zone:hover { border-color:#1d4ed8; background:#eff6ff; }
.es-upload-zone input[type=file] { position:absolute; inset:0; opacity:0; cursor:pointer; width:100%; height:100%; }
.es-upload-icon { width:42px; height:42px; background:#eff6ff; border-radius:10px; display:flex; align-items:center; justify-content:center; margin:0 auto 8px; font-size:18px; color:#1d4ed8; }
.es-upload-zone p { font-size:12.5px; color:#64748b; }
.es-upload-zone span { font-size:11px; color:#94a3b8; }
.es-img-preview { margin-top:11px; border-radius:10px; overflow:hidden; border:2px solid #e2e8f0; }
.es-img-preview img { width:100%; max-height:190px; object-fit:cover; display:block; }
.es-form-btns { display:grid; grid-template-columns:1fr 1fr; gap:12px; margin-top:18px; }
.es-btn-back { height:44px; border:1.5px solid #e2e8f0; background:#fff; color:#475569; border-radius:10px; font-size:13.5px; font-weight:500; cursor:pointer; font-family:inherit; display:flex; align-items:center; justify-content:center; gap:8px; text-decoration:none; transition:background .12s; }
.es-btn-back:hover { background:#f1f5f9; }
.es-btn-save { height:44px; background:#1d4ed8; color:#fff; border:none; border-radius:10px; font-size:13.5px; font-weight:600; cursor:pointer; font-family:inherit; display:flex; align-items:center; justify-content:center; gap:8px; transition:background .12s; }
.es-btn-save:hover { background:#1e40af; }
.es-validation-error { background:#fef2f2; border:1px solid #fecaca; border-radius:9px; padding:11px 14px; color:#dc2626; font-size:12.5px; margin-bottom:16px; }

/* FOOTER */
.es-footer { background:#fff; border-top:1px solid #e2e8f0; padding:32px 40px; margin-top:auto; }
.es-footer-inner { max-width:1200px; margin:0 auto; display:flex; align-items:center; justify-content:space-between; gap:16px; }
.es-footer-brand img { height:44px; object-fit:contain; }
.es-footer-brand p { font-size:13px; color:#94a3b8; margin-top:5px; }
.es-footer-links { display:flex; gap:18px; }
.es-footer-links a { font-size:12.5px; color:#64748b; text-decoration:none; }
.es-footer-links a:hover { color:#1d4ed8; }
.es-footer-copy { font-size:12px; color:#94a3b8; text-align:center; margin-top:12px; padding-top:12px; border-top:1px solid #f1f5f9; max-width:1200px; margin-left:auto; margin-right:auto; }

/* KATALOG SIDEBAR */
.es-katalog-wrap { display:grid; grid-template-columns:240px 1fr; gap:20px; align-items:start; }
.es-sidebar { background:#fff; border-radius:14px; border:1px solid #e8edf4; overflow:hidden; position:sticky; top:80px; }
.es-sidebar-head { background:linear-gradient(130deg,#1e3a5f,#1d4ed8); padding:14px 18px; }
.es-sidebar-head h3 { color:#fff; font-size:13.5px; font-weight:700; display:flex; align-items:center; gap:8px; }
.es-sidebar-menu { padding:8px 0; }
.es-sidebar-item { display:flex; align-items:center; justify-content:space-between; padding:10px 18px; cursor:pointer; text-decoration:none; transition:background .12s; }
.es-sidebar-item:hover { background:#f8fafc; }
.es-sidebar-item.active { background:#eff6ff; border-left:3px solid #1d4ed8; }
.es-sidebar-item-text { display:flex; align-items:center; gap:9px; font-size:13px; font-weight:500; color:#374151; }
.es-sidebar-item.active .es-sidebar-item-text { color:#1d4ed8; font-weight:600; }
.es-sidebar-item-count { background:#f1f5f9; color:#64748b; font-size:11px; font-weight:600; padding:2px 7px; border-radius:10px; }
.es-sidebar-item.active .es-sidebar-item-count { background:#dbeafe; color:#1d4ed8; }
.es-sidebar-divider { height:1px; background:#f1f5f9; margin:4px 0; }

/* KATALOG SORT */
.es-katalog-topbar { display:flex; align-items:center; justify-content:space-between; margin-bottom:16px; flex-wrap:wrap; gap:10px; }
.es-katalog-title { font-size:14.5px; font-weight:700; color:#0f172a; }
.es-katalog-count { font-size:12.5px; color:#64748b; }
.es-sort-select { border:1px solid #e2e8f0; border-radius:8px; padding:7px 12px; font-size:12.5px; font-family:inherit; color:#475569; background:#fff; outline:none; cursor:pointer; }

/* Katalog card (no edit/delete btns) */
.es-card-katalog { background:#fff; border-radius:14px; border:1px solid #e8edf4; overflow:hidden; transition:transform .18s, box-shadow .18s; cursor:pointer; }
.es-card-katalog:hover { transform:translateY(-3px); box-shadow:0 10px 28px rgba(13,27,46,.1); }
