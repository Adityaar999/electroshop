-- Tambah kolom diskon & harga_diskon ke tabel barang_varian
ALTER TABLE `barang_varian`
  ADD COLUMN IF NOT EXISTS `diskon`       TINYINT(1)     NOT NULL DEFAULT 0,
  ADD COLUMN IF NOT EXISTS `harga_diskon` DECIMAL(15,0)  NOT NULL DEFAULT 0;
