/* ── NAVBAR ADMIN ── */
.es-nav {
    display: flex;
    align-items: center;
    justify-content: space-between;
    height: 100px;
    padding: 0 60px;
    background: #fff;
    border-bottom: 1px solid #e2e8f0;
    position: sticky;
    top: 0;
    z-index: 999;
}

.es-nav-logo {
    display: flex;
    align-items: center;
    flex-shrink: 0;
    min-width: 200px;
}

.es-nav-logo img {
    height: 72px;
    object-fit: contain;
    display: block;
}

.es-nav-links {
    display: flex;
    align-items: center;
    gap: 8px;
    flex: 1;
    justify-content: center;
}

.es-nav-right {
    display: flex;
    align-items: center;
    gap: 8px;
    flex-shrink: 0;
    min-width: 200px; 
    justify-content: flex-end;
}

.es-nav-link {
    display: flex;
    align-items: center;
    gap: 6px;
    padding: 10px 18px;
    border-radius: 10px;
    text-decoration: none;
    font-size: 13.5px;
    font-weight: 600;
    color: #334155;
    transition: .2s;
}

.es-nav-link:hover { background: #f1f5f9; }

.es-nav-link.active {
    background: #eff6ff;
    color: #2563eb;
}

.es-btn-add {
    display: flex;
    align-items: center;
    gap: 6px;
    height: 40px;
    padding: 0 16px;
    border-radius: 10px;
    background: #2563eb;
    color: #fff;
    text-decoration: none;
    font-size: 13.5px;
    font-weight: 600;
    transition: background .15s;
    white-space: nowrap;
}

.es-btn-add:hover { background: #1d4ed8; }

.es-admin-badge {
    display: flex;
    align-items: center;
    gap: 6px;
    height: 40px;
    padding: 0 14px;
    background: #f8fafc;
    border: 1.5px solid #e2e8f0;
    border-radius: 10px;
    font-size: 13.5px;
    font-weight: 500;
    color: #334155;
    white-space: nowrap;
}

.es-btn-logout {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 40px;
    height: 40px;
    border-radius: 10px;
    border: 1.5px solid #fecaca;
    color: #ef4444;
    text-decoration: none;
    transition: background .15s;
}

.es-btn-logout:hover { background: #fff5f5; }

/* ── BANNER ── */
.es-banner {
    background: linear-gradient(130deg, #1e3a5f 0%, #1d4ed8 60%, #3b82f6 100%);
    padding: 52px 60px;
    position: relative;
    overflow: hidden;
}

.es-banner::before {
    content: '';
    position: absolute;
    right: -80px;
    top: -80px;
    width: 340px;
    height: 340px;
    border-radius: 50%;
    background: rgba(255,255,255,.06);
}

.es-banner::after {
    content: '';
    position: absolute;
    right: 160px;
    bottom: -60px;
    width: 200px;
    height: 200px;
    border-radius: 50%;
    background: rgba(255,255,255,.04);
}

.es-banner-inner {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 40px;
    position: relative;
    z-index: 1;
}

.es-banner-greeting {
    font-size: 14px;
    font-weight: 500;
    color: rgba(255,255,255,.7);
    margin-bottom: 8px;
    letter-spacing: .3px;
}

.es-banner-text h1 {
    font-size: 32px;
    font-weight: 800;
    color: #fff;
    margin-bottom: 10px;
    line-height: 1.2;
}

.es-banner-text p {
    font-size: 14.5px;
    color: rgba(255,255,255,.72);
    line-height: 1.6;
    max-width: 420px;
}

.es-banner-stats {
    display: flex;
    gap: 16px;
    flex-shrink: 0;
}

.es-stat {
    background: rgba(255,255,255,.12);
    border: 1px solid rgba(255,255,255,.18);
    border-radius: 16px;
    padding: 20px 28px;
    text-align: center;
    min-width: 110px;
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    transition: background .2s;
}

.es-stat:hover {
    background: rgba(255,255,255,.18);
}

.es-stat-icon {
    font-size: 18px;
    color: rgba(255,255,255,.7);
    margin-bottom: 8px;
}

.es-stat-value {
    font-size: 30px;
    font-weight: 800;
    color: #fff;
    line-height: 1;
    margin-bottom: 6px;
}

.es-stat-label {
    font-size: 12px;
    color: rgba(255,255,255,.65);
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: .5px;
}