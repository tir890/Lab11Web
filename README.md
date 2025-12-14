
# Lab11Web: Framework PHP OOP Modular & Routing

**Nama:** Tiara Hayatul Khoir

**NIM:** 312410474

**Kelas:** TI.24.A5

**Mata Kuliah:** Pemrograman Web 1  

---

## 📝 Deskripsi
Project ini adalah implementasi praktikum Pemrograman Web mengenai pembuatan **Framework Sederhana** menggunakan PHP dengan konsep **OOP (Object Oriented Programming)**, **Modularisasi**, dan **Routing** menggunakan `.htaccess`.

Tampilan antarmuka menggunakan desain **Emerald Green** dengan layout responsif (Sidebar & Content).

---

## 📂 Struktur Folder
Berikut adalah struktur folder final setelah implementasi modular:

```text
lab11_php_oop/
├── .htaccess              <-- Konfigurasi Rewrite URL
├── config.php             <-- Konfigurasi Koneksi Database
├── index.php              <-- Main Router (Gerbang Utama)
├── README.md              <-- Dokumentasi Project
├── assets/
│   └── css/
│       └── style.css      <-- Styling CSS (Emerald Theme)
├── class/
│   ├── database.php       <-- Class Database Wrapper
│   └── form.php           <-- Class Form Generator
├── module/
│   └── artikel/
│       ├── index.php      <-- Halaman List Artikel
│       ├── tambah.php     <-- Halaman Tambah Data
│       └── ubah.php       <-- Halaman Ubah Data
└── template/
    ├── header.php         <-- Potongan Layout Header
    ├── footer.php         <-- Potongan Layout Footer
    └── sidebar.php        <-- Potongan Layout Sidebar
````

-----

## 🛠️ Langkah Implementasi

### 1\. Konfigurasi Database & Class Wrapper

File `class/database.php` dibuat untuk membungkus koneksi MySQLi ke dalam bentuk Object. Menggunakan `include` (bukan `include_once`) agar konfigurasi dapat terbaca berulang kali saat instansiasi.

```php
// Cuplikan Kode class/database.php
private function getConfig() {
    include __DIR__ . '/../config.php'; 
    if(isset($config)) {
        $this->host = $config['host'];
        // ... set variable lainnya
    }
}
```

### 2\. Class Form (OOP Form Generator)

Class ini mempermudah pembuatan form HTML secara dinamis. Mendukung input type `text`, `textarea`, dan tombol submit.

### 3\. Routing Sederhana (.htaccess)

Menggunakan `mod_rewrite` untuk mengubah URL cantik menjadi query string yang bisa dibaca PHP.

**File: `.htaccess`**

```apache
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteBase /lab11_php_oop/
    
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    
    RewriteRule ^(.*)$ index.php?path=$1 [L,QSA]
</IfModule>
```

### 4\. Main Router (index.php)

File ini bertugas memecah URL, memanggil modul yang sesuai, dan menyatukan layout (Header + Sidebar + Content + Footer).

**Logika Routing:**

```php
$request = isset($_GET['path']) ? $_GET['path'] : 'artikel/index';
$parts = explode('/', rtrim($request, '/'));
$modul = isset($parts[0]) ? $parts[0] : 'artikel';
$act   = isset($parts[1]) ? $parts[1] : 'index';
```

-----

## 📸 Hasil Tampilan (Screenshots)

### 1\. Halaman Utama (List Artikel)

Menampilkan data artikel dari database dengan layout 2 kolom (Sidebar di kanan).

> ![artikel](https://github.com/tir890/Lab11Web/blob/a1ad318f3ea37c24d9a0729027f3564f1fd4a298/artikel-web11.jpeg)

### 2\. Form Tambah Artikel

Menggunakan Class Form untuk generate input dan textarea.

*(Ganti link gambar di atas dengan screenshot form tambah kamu)*

### 3\. Form Ubah Artikel

Form otomatis terisi data lama saat tombol Edit diklik.

*(Ganti link gambar di atas dengan screenshot form ubah kamu)*

### 4\. Modularisasi (Sidebar)

Sidebar dipisahkan ke file `template/sidebar.php` agar bisa dipanggil di semua halaman.

-----

## 🏁 Kesimpulan

Dengan menerapkan konsep OOP dan Modularisasi:

1.  Kode menjadi lebih rapi dan terstruktur.
2.  Perawatan kode (maintenance) lebih mudah karena logika dipisah per modul.
3.  URL menjadi lebih user-friendly (SEO Friendly) berkat routing `.htaccess`.
