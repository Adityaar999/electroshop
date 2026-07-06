.es-nav-katalog{
    display:flex;
    justify-content:space-between;
    align-items:center;

    height:100px;
    padding:0 60px;

    background:#fff;
    border-bottom:1px solid #e2e8f0;

    position:sticky;
    top:0;
    z-index:100;
}

.es-nav-katalog .es-nav-left,
.es-nav-katalog .es-nav-center,
.es-nav-katalog .es-nav-right{
    flex:1;
    display:flex;
    align-items:center;
}

.es-nav-katalog .es-nav-left{
    justify-content:flex-start;
}

.es-nav-katalog .es-nav-center{
    justify-content:center;
}

.es-nav-katalog .es-nav-right{
    justify-content:flex-end;
}

.es-nav-katalog .es-nav-logo img{
    height:72px;
    display:block;
}

.es-nav-katalog .es-nav-link{
    display:flex;
    align-items:center;
    gap:8px;

    padding:12px 24px;

    border-radius:12px;

    text-decoration:none;

    background:#eff6ff;

    color:#2563eb;

    font-weight:700;
}

.es-nav-katalog .es-nav-link:hover{
    background:#dbeafe;
}

.es-nav-katalog .es-btn-login{

    display:flex;

    align-items:center;

    gap:8px;

    padding:12px 24px;

    border-radius:12px;

    text-decoration:none;

    background:#1e3a5f;

    color:#fff;

    font-weight:700;
}

.es-nav-katalog .es-btn-login:hover{

    background:#173454;

}