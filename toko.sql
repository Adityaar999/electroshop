CREATE DATABASE IF NOT EXISTS electroshop;
USE electroshop;

-- Tabel barang
CREATE TABLE IF NOT EXISTS barang (
    id                  INT AUTO_INCREMENT PRIMARY KEY,
    nama_barang         VARCHAR(255) NOT NULL,
    deskripsi           TEXT,
    harga               INT DEFAULT 0,
    kategori            VARCHAR(100) DEFAULT 'Lainnya',
    gambar              VARCHAR(255),
    varian_id           INT NULL DEFAULT NULL,
    kategori_snapshot   VARCHAR(100) NULL DEFAULT NULL,
    created_at          TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabel admin
CREATE TABLE IF NOT EXISTS admin (
    id         INT AUTO_INCREMENT PRIMARY KEY,
    nama       VARCHAR(100) NOT NULL,
    username   VARCHAR(50)  NOT NULL UNIQUE,
    password   VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabel varian barang
CREATE TABLE IF NOT EXISTS barang_varian (
    id          INT AUTO_INCREMENT PRIMARY KEY,
    barang_id   INT NOT NULL,
    field_label VARCHAR(200) NOT NULL,
    field_value VARCHAR(500) NOT NULL,
    harga       DECIMAL(15,0) NOT NULL DEFAULT 0,
    stok        INT NOT NULL DEFAULT 0,
    diskon      TINYINT(1) NOT NULL DEFAULT 0,
    harga_diskon DECIMAL(15,0) NOT NULL DEFAULT 0,
    created_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (barang_id) REFERENCES barang(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Default admin: username=admin | password=admin123
INSERT INTO admin (nama, username, password) VALUES
('Administrator', 'admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');

-- Sample data
INSERT INTO barang (nama_barang, deskripsi, harga, kategori, kategori_snapshot, gambar) VALUES
('iPhone 17 Pro Max',    'Smartphone flagship Apple chip A19 Pro, kamera 48MP, layar 6.9" Super Retina XDR.', 24999000, 'Handphone',      'Handphone',      NULL),
('MacBook Air M3',       'Laptop tipis Apple chip M3, RAM 16GB, SSD 512GB, layar 13.6" Liquid Retina.',       18499000, 'Laptop',         'Laptop',         NULL),
('Sony WH-1000XM5',     'Headphone ANC terbaik, 30 jam battery, audio Hi-Res wireless.',                     5299000,  'TWS & Headphone','TWS & Headphone', NULL),
('Samsung Galaxy S25',   'Smartphone Android premium Snapdragon 8 Elite, kamera 200MP, layar 6.7" AMOLED.',  16999000, 'Handphone',      'Handphone',      NULL),
('ASUS ROG Zephyrus G16','Laptop gaming RTX 4080, layar OLED 240Hz, desain ultra-slim.',                     32999000, 'Laptop',         'Laptop',         NULL),
('Apple Watch Ultra 2',  'Smartwatch paling tangguh Apple, layar 49mm, GPS presisi ganda, tahan air 100m.',  12999000, 'Smartwatch',     'Smartwatch',     NULL),
('iPad Pro M4',          'Tablet profesional Apple chip M4, layar 11" Ultra Retina XDR, Apple Pencil Pro.',  14999000, 'Tablet',         'Tablet',         NULL),
('JBL Charge 5',         'Speaker Bluetooth portable tahan air IP67, bass mantap, 20 jam playback.',         1299000,  'Speaker',        'Speaker',        NULL);
