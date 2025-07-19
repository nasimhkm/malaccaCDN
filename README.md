# 📄 Malacca Web Application

**Terakhir diperbarui:** 19 Juli 2025

## 📌 Pengenalan Proyek

Malacca Web Application adalah aplikasi website profil perusahaan lengkap dengan sistem manajemen konten (CMS) internal. Admin dapat menambahkan, mengedit, dan menghapus artikel, sementara pengunjung dapat membaca informasi perusahaan dan artikel yang diterbitkan.

### 🔧 Teknologi yang Digunakan

* **Backend:** Laravel 11 (PHP 8.2+)
* **Database:** MariaDB / MySQL
* **Frontend (Public):** HTML Native, Tailwind CSS, Flowbite JS
* **Frontend (Admin):** Laravel Blade, Alpine.js, Tailwind CSS, Flowbite JS
* **Lingkungan Development:** Arch Linux & Windows (dengan XAMPP)

---

## 🧠 Alur Logika Aplikasi

### 👤 Untuk Stakeholder (Non-Teknis)

#### A. Manajemen Artikel (Admin)

1. **Login** via `/login`
2. **Otentikasi** menggunakan email dan password
3. **Dashboard** menampilkan daftar artikel
4. **Tambah Artikel** dengan editor form
5. **Edit Artikel** melalui tombol "Edit"
6. **Hapus Artikel** melalui tombol "Trash"

#### B. Untuk Pengunjung

1. Akses **Halaman Utama** (`/`)
2. Melihat daftar **Tulisan Unggulan**
3. Baca artikel lengkap via `/tulisan/judul-artikel`

### 👨‍💻 Untuk Tim Frontend (Teknis)

* **MPA (Multi-Page App)**: Blade + Laravel
* **Autentikasi:** Laravel Breeze, session-based
* **Manajemen Artikel (CRUD):**

  * `GET /dashboard` → Tabel artikel
  * `GET /articles/create` → Form tambah
  * `POST /articles` → Simpan artikel baru
  * `GET /articles/{id}/edit` → Form edit
  * `PUT /articles/{id}` → Update artikel
  * `DELETE /articles/{id}` → Hapus artikel
* **Aset:** disimpan di `public/`, akses via `{{ asset('...') }}`

---

## ⚙️ Panduan Setup & Instalasi

Pilih panduan yang sesuai dengan sistem operasi Anda.

### 🪟 A. Panduan untuk Windows (Menggunakan XAMPP)

XAMPP adalah cara termudah untuk mendapatkan Apache, MariaDB, dan PHP di Windows.

#### 🔎 1. Instalasi Lingkungan

1. **Install XAMPP:** Unduh dan install versi terbaru dari [https://www.apachefriends.org](https://www.apachefriends.org) (pastikan PHP 8.2+).
2. **Install Composer:** Unduh dari [https://getcomposer.org](https://getcomposer.org). Saat instalasi, arahkan ke `php.exe` di `C:\xampp\php\php.exe`.
3. **Install Node.js:** Unduh versi LTS dari [https://nodejs.org](https://nodejs.org).

#### 🛠️ 2. Konfigurasi XAMPP & PHP

1. Buka **XAMPP Control Panel** dan klik "Start" pada **Apache** & **MySQL**.
2. Klik tombol **Config** → **php.ini**.
3. Aktifkan ekstensi berikut (hapus tanda `;` di depannya):

```
extension=intl
extension=gd
extension=mysqli
extension=pdo_mysql
```

4. Simpan dan restart Apache.

#### 📂 3. Instalasi Proyek Laravel

```bash
cd C:\xampp\htdocs
# Buat folder baru atau clone proyek
cd MalaccaBackend
composer install
copy .env.example .env
php artisan key:generate
```

#### 📖 4. Konfigurasi Database & Seeder

1. Buka `http://localhost/phpmyadmin` dan buat database: `malacca_db`
2. Edit `.env`:

```
DB_DATABASE=malacca_db
DB_USERNAME=root
DB_PASSWORD=
```

3. Jalankan:

```bash
php artisan migrate
php artisan db:seed --class=AdminUserSeeder
php artisan storage:link
```

---

### 🐧 B. Panduan untuk Arch Linux

#### 🔎 1. Instalasi Lingkungan

```bash
sudo pacman -Syu
sudo pacman -S php php-intl php-gd
sudo pacman -S composer
sudo pacman -S mariadb
```

#### 🛠️ 2. Konfigurasi MariaDB

```bash
sudo mariadb-install-db --user=mysql --basedir=/usr --datadir=/var/lib/mysql
sudo systemctl start mariadb
sudo systemctl enable mariadb
sudo mariadb-secure-installation
```

#### 📆 3. Aktifkan Ekstensi PHP

```bash
sudo nano /etc/php/php.ini
# Hapus tanda titik koma pada:
# extension=mysqli
# extension=pdo_mysql
```

#### 📂 4. Instalasi Proyek Laravel

```bash
cd /path/to/MalaccaBackend
composer install
cp .env.example .env
php artisan key:generate
```

#### 📖 5. Konfigurasi Database & Seeder

```bash
mariadb -u root -p
CREATE DATABASE malacca_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'malacca_user'@'localhost' IDENTIFIED BY 'password_super_aman';
GRANT ALL PRIVILEGES ON malacca_db.* TO 'malacca_user'@'localhost';
FLUSH PRIVILEGES;
exit
```

Edit `.env`:

```
DB_DATABASE=malacca_db
DB_USERNAME=malacca_user
DB_PASSWORD=password_super_aman
```

Kemudian jalankan:

```bash
php artisan migrate
php artisan db:seed --class=AdminUserSeeder
php artisan storage:link
```

---

## 🚀 Menjalankan Aplikasi untuk Development

### 🔌 Terminal 1: Backend Laravel

```bash
php artisan serve
# → http://127.0.0.1:8000
```

### 🎨 Terminal 2: Vite untuk Frontend

```bash
npm run dev
# → Compile & watch assets
```

### 🌐 URL Penting

* **Halaman Utama:** `http://127.0.0.1:8000/`
* **Login Admin:** `http://127.0.0.1:8000/login`
* **Dashboard:** `http://127.0.0.1:8000/dashboard`

---

## 📁 Struktur Direktori Penting

| Folder/File             | Keterangan                                 |
| ----------------------- | ------------------------------------------ |
| `routes/web.php`        | Definisi semua URL / route aplikasi        |
| `app/Http/Controllers/` | Logic utama aplikasi (controller)          |
| `app/Models/`           | Model untuk berinteraksi dengan database   |
| `resources/views/`      | File Blade (HTML dengan templating)        |
| `public/`               | Aset publik seperti gambar, CSS, JS        |
| `.env`                  | Konfigurasi database & environment project |

---

## ✅ Status

* [x] Artikel CRUD
* [x] Autentikasi Admin
* [ ] Artikel Dinamis di Halaman Utama
* [ ] Fitur Kategori & Pencarian
