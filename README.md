# 📊 Aplikasi Monitoring Sosial Media

![PHP](https://img.shields.io/badge/PHP-7.4-blue?style=flat-square&logo=php)
![jQuery](https://img.shields.io/badge/jQuery-AJAX-blue?style=flat-square&logo=jquery)
![Bootstrap](https://img.shields.io/badge/Bootstrap-4-purple?style=flat-square&logo=bootstrap)
![SQL Server](https://img.shields.io/badge/Database-SQL%20Server-red?style=flat-square&logo=microsoftsqlserver)
![License](https://img.shields.io/badge/License-MIT-green?style=flat-square)

Aplikasi ini digunakan untuk **monitoring sosial media**, dibangun dengan kombinasi teknologi:

- ✅ PHP
- ✅ jQuery + AJAX
- ✅ HTML & CSS
- ✅ Bootstrap
- ✅ SQL Server

---

## 🚀 Fitur Utama

- 👁️‍🗨️ Pantau data sosial media secara dinamis
- 📊 Tampilkan data dengan AJAX tanpa reload halaman
- 📥 Upload dan simpan video dengan dukungan direktori khusus
- 🔒 Sistem koneksi ke SQL Server via ODBC
- ⚙️ Konfigurasi backend modular (koneksi terpusat)

---

## ⚙️ Langkah Instalasi di Lokal

1. Clone atau download project ini ke folder `htdocs`:
   ```bash
   git clone https://github.com/wardi17/monitoring_sosmed.git
2.Buat database baru di SQL Server dengan nama:

um_db

3.Buat koneksi ODBC dengan nama yang sesuai (contoh: um_db).

4.Ubah konfigurasi koneksi database di file berikut:

public/models/koneksi.php

5.Untuk fitur upload video, ikuti panduan di bawah ini.



## 📁 Konfigurasi Upload dan Alias di XAMPP

### ✅ Langkah 1: Konfigurasi `php.ini` untuk Upload File Besar

1. Buka **XAMPP Control Panel**.
2. Klik tombol **`Config`** pada bagian **Apache**, lalu pilih **`php.ini`**.
3. Setelah file terbuka, cari dan ubah atau tambahkan pengaturan berikut:

    ```ini
    post_max_size = 2000M
    upload_max_filesize = 2000M
    default_socket_timeout = 600
    memory_limit = 50G
    ```

    > 💡 Nilai di atas memungkinkan upload file hingga 2GB dan meningkatkan batas memori serta waktu koneksi.

4. Simpan perubahan dan **restart Apache** dari XAMPP Control Panel agar perubahan berlaku.

---

### ✅ Langkah 2: Menambahkan Alias untuk Folder Upload

1. Buka file konfigurasi Apache berikut:

    ```
    F:\xampp\apache\conf\extra\httpd-xampp.conf
    ```

2. Tambahkan baris berikut di bagian bawah (atau di bagian alias):

    ```apache
    Alias /UploadVideoPD3R "D:/UploadVideoSOSMED"

    <Directory "D:/UploadVideoSOSMED">
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>
    ```

3. Simpan perubahan dan **restart Apache** dari XAMPP Control Panel.

> 📂 Sekarang kamu bisa mengakses folder `D:/UploadVideoSOSMED` dari browser melalui URL:

