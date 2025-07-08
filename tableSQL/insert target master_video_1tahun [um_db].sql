use [um_db]

-- 1. Tabel kategori sementara
DECLARE @Kategori TABLE (NamaKategori VARCHAR(50));
INSERT INTO @Kategori (NamaKategori)
VALUES ('Youtube'), ('TikTok'), ('Instagram'), ('Facebook'), ('Twitter');

-- 2. Tabel bulan (nama bulan & angka bulan)
DECLARE @Bulan TABLE (angka_bulan INT, nama_bulan VARCHAR(20));
INSERT INTO @Bulan (angka_bulan, nama_bulan)
VALUES 
 (1, 'Januari'),
 (2, 'Februari'),
 (3, 'Maret'),
 (4, 'April'),
 (5, 'Mei'),
 (6, 'Juni'),
 (7, 'Juli'),
 (8, 'Agustus'),
 (9, 'September'),
 (10, 'Oktober'),
 (11, 'November'),
 (12, 'Desember');

-- 3. Insert ke master_video (jika belum ada)
INSERT INTO master_video (divisi, bulan, tahun, kategory, target, angka_bulan)
SELECT 
    d.kode_divisi AS divisi,
    b.nama_bulan AS bulan,
    2025 AS tahun,
    k.NamaKategori AS kategory,
    10 AS target,
    b.angka_bulan
FROM ms_divisi_upload_video d
CROSS JOIN @Kategori k
CROSS JOIN @Bulan b
WHERE NOT EXISTS (
    SELECT 1 
    FROM master_video mv
    WHERE mv.divisi = d.kode_divisi
      AND mv.kategory = k.NamaKategori
      AND mv.angka_bulan = b.angka_bulan
      AND mv.tahun = 2025
);

select * from master_video where tahun =2025