# Website & Sistem Manajemen Konten Malacca Enterprise

![Malacca Logo](/MalaccaBackend/public/asset/logo/logoCompany.svg)

**Versi 1.0**

Selamat datang di panduan teknis untuk website Malacca Enterprise. Dokumen ini adalah panduan lengkap yang mencakup semua aspek proyek, mulai dari filosofi desain, arsitektur teknis, hingga cara instalasi, pemeliharaan, dan penjelasan non-teknis untuk stakeholder.

---

## Daftar Isi
1.  [Filosofi & Arsitektur](#1-filosofi--arsitektur)
2.  [Stack Teknologi](#2-stack-teknologi)
3.  [Panduan Instalasi Lokal](#3-panduan-instalasi-lokal)
4.  [Struktur Proyek & File Penting](#4-struktur-proyek--file-penting)
5.  [Panduan untuk Developer Frontend](#5-panduan-untuk-developer-frontend)
6.  [Cara Menggunakan Panel Admin](#6-cara-menggunakan-panel-admin)
7.  [Lampiran: Penjelasan untuk Stakeholder (Non-Teknis)](#7-lampiran-penjelasan-untuk-stakeholder-non-teknis)

---

## 1. Filosofi & Arsitektur

Proyek ini dibangun di atas dua pilar utama: **Efisiensi Frontend** dan **Kekuatan Backend**.

* **Frontend (CDN-First)**: Tampilan website (UI) dirancang agar sangat ringan. Kami sengaja **menghindari penggunaan *build tools* JavaScript** seperti `npm`, `Vite`, atau `Webpack` dalam alur kerja produksi. Semua aset utama dimuat langsung dari **CDN**, membuat frontend sangat cepat dan mudah diedit secara visual.
* **Backend (Laravel)**: Bertindak sebagai "otak" aplikasi. Laravel mengelola semua data, otentikasi, dan logika bisnis. Tugasnya adalah mengambil data dari database dan "menyuntikkannya" ke dalam file-file template frontend.

---

## 2. Stack Teknologi

| Kategori | Teknologi |
| :--- | :--- |
| **Backend** | PHP 8.1+, Laravel 10+, MariaDB, Composer |
| **Frontend**| HTML5, Vanilla JavaScript, Tailwind CSS (CDN), Flowbite (CDN) |

---

## 3. Panduan Instalasi Lokal

Ikuti langkah-langkah ini untuk menjalankan proyek di komputer Anda.

### 3.1. Prasyarat

Sebelum memulai, pastikan perangkat lunak berikut sudah terinstal di sistem Anda:
* PHP 8.1 atau lebih baru
* Composer
* Server Database MariaDB

#### Catatan Instalasi Prasyarat
* **Untuk Windows (Direkomendasikan):** Cara termudah adalah menginstal lingkungan pengembangan seperti **[Laragon](https://laragon.org/)** atau **XAMPP**. Aplikasi ini sudah mencakup Apache/Nginx, PHP, MariaDB, dan sebuah terminal yang siap pakai.
* **Untuk Arch Linux:** Anda bisa menginstal semua prasyarat melalui `pacman`:
    ```bash
    sudo pacman -S php composer mariadb
    ```
    Pastikan layanan MariaDB sudah dijalankan (`sudo systemctl enable --now mariadb.service`).

### 3.2. Langkah-langkah Instalasi Proyek
Proses ini sama untuk Windows dan Arch Linux, asalkan prasyarat sudah terpenuhi.

1.  **Unduh Proyek**:
    * Clone repositori ini atau unduh file ZIP dan ekstrak.
    * **Untuk pengguna Laragon/XAMPP:** Tempatkan folder proyek di dalam direktori `www` atau `htdocs`.

2.  **Buka Terminal**: Buka terminal di dalam folder root proyek.
    * **Untuk pengguna Laragon/XAMPP:** Gunakan tombol "Terminal" yang sudah disediakan di aplikasi.

3.  **Instal Dependensi PHP**:
    ```bash
    composer install
    ```

4.  **Buat File Konfigurasi**: Salin file `.env.example` menjadi file `.env`.
    ```bash
    cp .env.example .env
    ```

5.  **Generate Kunci Aplikasi**:
    ```bash
    php artisan key:generate
    ```

6.  **Konfigurasi Database**:
    * Buat sebuah database baru di MariaDB (misalnya, `malacca_backend`).
    * Buka file `.env` dan isi detail koneksi: `DB_DATABASE`, `DB_USERNAME`, dan `DB_PASSWORD`.

7.  **Jalankan Migrasi Database**: Perintah ini akan membuat semua tabel yang diperlukan.
    ```bash
    php artisan migrate
    ```

8.  **Buat Symbolic Link**: Agar gambar yang di-upload bisa diakses publik.
    ```bash
    php artisan storage:link
    ```

9.  **Buat User Admin Pertama**:
    ```bash
    php artisan tinker
    ```
    Setelah masuk ke Tinker (`>>>`), jalankan perintah ini (ganti password jika perlu):
    ```php
    \App\Models\User::create(['name' => 'Admin', 'email' => 'admin@malacca.com', 'password' => bcrypt('password')]);
    ```
    Ketik `exit` untuk keluar.

10. **Jalankan Server Lokal**:
    ```bash
    php artisan serve
    ```
    🎉 Selamat! Proyek Anda sekarang berjalan di `http://127.0.0.1:8000`.

---

## 4. Struktur Proyek & File Penting

Berikut adalah peta file dan folder yang paling relevan untuk diedit:

```
.
├── app/
│   ├── Http/Controllers/ArticleController.php  # Otak di balik semua aksi artikel
│   └── Models/Article.php              # Representasi tabel 'articles'
├── public/
│   ├── asset/                       # LOKASI SEMUA GAMBAR, LOGO, IKON
│   └── scripts/                     # LOKASI SEMUA FILE JAVASCRIPT KUSTOM
├── resources/
│   └── views/                       # LOKASI SEMUA FILE TAMPILAN (FRONTEND)
│       ├── admin/                   # Halaman khusus Admin
│       ├── articles/                # Halaman publik terkait artikel
│       ├── auth/                    # Halaman login
│       └── index.blade.php          # Halaman utama (Landing Page) publik
└── routes/
    └── web.php                      # Peta URL website
```

---

## 5. Panduan untuk Developer Frontend

Anda akan menghabiskan sebagian besar waktu Anda di folder `resources/views/` dan `public/`.

* **Mengedit Tampilan**: Setiap halaman diwakili oleh sebuah file `.blade.php` di dalam `resources/views/`. Anda bisa langsung mengubah struktur HTML dan kelas Tailwind CSS di file-file ini.
* **Mengedit Aset Statis**:
    * Gambar & Ikon: Simpan di folder `public/asset/`. Panggil dengan sintaks `<img src="{{ asset('asset/namafile.svg') }}">`.
    * JavaScript Kustom: Simpan di `public/scripts/`.

---

## 6. Cara Menggunakan Panel Admin

1.  **Akses Halaman Login**: Buka `http://127.0.0.1:8000/login`.
2.  **Masukkan Kredensial**: Gunakan email (`admin@malacca.com`) dan password (`password`) yang Anda buat saat instalasi.
3.  **Masuk ke Dashboard**: Anda akan diarahkan ke Dashboard Admin (`/admin/dashboard`).
4.  **Manajemen Artikel**: Klik "Article" di sidebar untuk melihat, menambah, mengedit, atau menghapus konten website.

---

## 7. Lampiran: Penjelasan untuk Stakeholder (Non-Teknis)

### Bagaimana Cara Kerja Website Ini? (Analogi Restoran)

Bayangkan website kita adalah sebuah restoran yang canggih.

#### Tampilan Website (Frontend) - Ruang Makan & Menu
Ini adalah semua yang dilihat oleh pengunjung: desain interior, meja yang tertata rapi, dan buku menu yang indah. Di website kita, ini adalah **desain visual**, layout, dan semua konten yang Anda lihat. Kami sengaja memilih "perabotan" (seperti tombol dan tabel) dari pemasok global terbaik (disebut **CDN**), sehingga restoran kita terlihat modern dan bisa melayani tamu dengan sangat cepat.


#### Mesin Website (Backend - Laravel) - Dapur
Ini adalah **dapur restoran** yang tidak terlihat oleh tamu. Di sinilah semua "masakan" (data) diolah oleh para koki (programmer). Saat pengunjung membuka sebuah halaman, permintaan itu masuk ke dapur, lalu "koki" (sistem Laravel) akan menyiapkan "hidangan" (halaman web yang sudah berisi data).


#### Database (Gudang Data) - Gudang Bahan Makanan
Ini adalah gudang tempat semua "bahan makanan" disimpan: judul artikel, isi tulisan, nama penulis, dan gambar. Semuanya tersimpan rapi dan aman.

#### Panel Admin - Kantor Manajer
Ini adalah **kantor pribadi manajer restoran**. Hanya orang dengan kunci (password) yang bisa masuk. Dari kantor ini, Anda (sebagai admin) bisa melakukan hal-hal penting:
* **Menambah Menu Baru**: Sama seperti Anda **membuat artikel baru**.
* **Mengubah Deskripsi Menu**: Sama seperti Anda **mengedit artikel**.
* **Menghapus Menu**: Sama seperti Anda **menghapus artikel**.

Setiap perubahan yang Anda buat di kantor manajer akan langsung terlihat di buku menu yang dilihat oleh semua pengunjung. Dengan cara ini, Anda memiliki kontrol penuh untuk mengubah konten kapan saja, sementara pengunjung selalu mendapatkan tampilan website yang cepat dan indah.