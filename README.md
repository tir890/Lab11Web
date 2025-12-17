
# Lab11Web: Framework PHP OOP Modular & Routing 

# Lab12Web: Framework PHP Modular dengan Sistem Autentikasi

**Nama:** Tiara Hayatul Khoir

**NIM:** 312410474

**Kelas:** TI.24.A5

**Mata Kuliah:** Pemrograman Web

## 📝 Deskripsi Project

Repository ini berisi implementasi **Framework Sederhana** menggunakan PHP dengan konsep **OOP (Object Oriented Programming)**, **Modularisasi**, dan **Routing**.

Project ini menggabungkan dua materi praktikum utama:

1. **Lab 11:** Membangun struktur dasar framework, routing `.htaccess`, dan manajemen data artikel (CRUD).
2. **Lab 12:** Menambahkan sistem keamanan berupa **Autentikasi User** (Login/Logout), manajemen **Session**, dan keamanan password (Hashing).

---

## ✨ Fitur Utama

### 1. Framework Dasar (Lab 11)

* **Konsep OOP:** Penggunaan Class untuk koneksi Database dan pembuatan Form dinamis.
* **Modularisasi:** Kode dipisah berdasarkan fungsinya (Module, Class, Template) agar rapi dan mudah dikelola.
* **Pretty URL (Routing):** Menggunakan `.htaccess` untuk mengubah URL menjadi lebih bersih (SEO Friendly).
* *Contoh:* `localhost/lab12web/artikel/tambah`



### 2. Keamanan & Autentikasi (Lab 12)

* **Login System:** Membatasi akses ke halaman admin hanya untuk user yang terdaftar.
* **Session Management:** Menggunakan PHP Session untuk menyimpan status login pengguna.
* **Password Hashing:** Password tidak disimpan sebagai teks biasa, melainkan dienkripsi menggunakan algoritma `bcrypt` (`password_hash`).
* **Profil User:** Fitur untuk melihat profil admin dan mengubah password secara aman.

---

## 📂 Struktur Folder Final

Berikut adalah struktur direktori lengkap dari project gabungan ini:

```text
lab12_php_oop/
├── .htaccess              <-- Konfigurasi Routing (Rewrite URL)
├── config.php             <-- Konfigurasi Koneksi Database
├── index.php              <-- Main Router & Gatekeeper (Cek Session)
├── README.md              <-- Dokumentasi Project
├── assets/
│   └── css/
│       └── style.css      <-- Desain Tampilan (Emerald Theme)
├── class/
│   ├── database.php       <-- Class Koneksi & Query Database
│   └── form.php           <-- Class Generator Form HTML
├── module/
│   ├── artikel/           <-- [MODUL ARTIKEL]
│   │   ├── index.php      <-- Menampilkan Data
│   │   ├── tambah.php     <-- Form Tambah Data
│   │   └── ubah.php       <-- Form Ubah Data
│   └── user/              <-- [MODUL USER]
│       ├── login.php      <-- Halaman Login
│       ├── logout.php     <-- Proses Logout
│       └── profile.php    <-- Halaman Profil & Ganti Password
└── template/
    ├── header.php         <-- Layout Header
    ├── footer.php         <-- Layout Footer
    └── sidebar.php        <-- Layout Sidebar (Menu Dinamis)

```

---

## 🛠️ Instalasi & Penggunaan

1. **Database:**
* Buat database MySQL bernama `latihan_oop`.
* Import tabel `artikel` dan `users` sesuai modul praktikum.
* Insert user admin default (Password: `admin123` yang sudah di-hash).


2. **Konfigurasi:**
* Sesuaikan file `config.php` dengan user/password database lokal kamu.


3. **Akses Web:**
* Buka browser dan akses `http://localhost/lab11_php_oop/`.
* Kamu akan diarahkan ke halaman Login.
* Gunakan akun: **admin** / **admin123**.



---

## 📸 Dokumentasi (Screenshots)

### A. Bagian Framework & CRUD (Lab 11)

**1. Halaman Dashboard Artikel**
Menampilkan daftar artikel dengan layout sidebar responsif.

> ![Dashboard Artikel]([Ganti dengan Link Screenshot Dashboard Artikel])

**2. Form Tambah & Ubah Data**
Implementasi penggunaan Class `Form` untuk input data.

> ![Form Input]([Ganti dengan Link Screenshot Form])

### B. Bagian Autentikasi (Lab 12)

**3. Halaman Login**
Form login dengan validasi password hash.

> ![Halaman Login]([Ganti dengan Link Screenshot Login])

**4. Menu Sidebar Dinamis**
Sidebar menyesuaikan tampilan menu berdasarkan status login user.

> ![Sidebar Dinamis]([Ganti dengan Link Screenshot Sidebar])

**5. Fitur Ganti Password**
Halaman profil untuk memperbarui password admin.

> ![Ganti Password]([Ganti dengan Link Screenshot Profil])

---

## 🏁 Penutup

Project ini membuktikan bahwa penggunaan konsep **Modular** dan **OOP** membuat pengembangan aplikasi web menjadi lebih terstruktur, aman, dan mudah untuk dikembangkan lebih lanjut (Scalable).
