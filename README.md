# Praktikum 11: PHP OOP Lanjutan (Framework Modular & Routing)

**Nama:** Tiara Hayatul Khoir

**NIM:** 312410474

**Kelas:** TI.24.A5

---

## 📂 Struktur Folder Proyek

Berikut adalah struktur folder untuk **Lab11Web** setelah menerapkan **OOP**, **Framework Modular**, dan **Routing**:

```text
lab11_php_oop/
├── README.md
├── .htaccess              <-- Konfigurasi URL Rewrite (Routing)
├── config.php             <-- Konfigurasi Database
├── index.php              <-- Main Router / Front Controller
├── class/
│   ├── Database.php       <-- Class Database (Koneksi & Query OOP)
│   └── Form.php           <-- Class Form Dinamis
├── module/
│   └── artikel/
│       ├── index.php      <-- List Data Artikel
│       ├── tambah.php     <-- Form Tambah
│       └── ubah.php       <-- Form Ubah
└── template/
    ├── header.php
    ├── footer.php
    └── sidebar.php
```

---

## 📝 Langkah-Langkah Praktikum

### 1. Mempersiapkan Struktur Projekt

Pertama membuat folder:

```
htdocs/lab11_php_oop/
```

Lalu membuat 3 folder utama:

* `class/` → Menyimpan seluruh class library
* `module/` → Tempat modul-modul halaman
* `template/` → Layout header/footer/sidebar

**Screenshot Struktur Folder:**

> [Masukkan screenshot struktur folder di sini]

---

## 2. Membuat Class Form

Class `Form` digunakan untuk membuat elemen form HTML secara dinamis seperti `text`, `textarea`, `select`, `radio`, `checkbox`, dan `password`.

**Kode Program (`class/Form.php`):**

```php
<?php
class Form {
    private $fields = array();
    private $action;
    private $submit = "Submit Form";
    private $jumField = 0;

    public function __construct($action, $submit) {
        $this->action = $action;
        $this->submit = $submit;
    }

    public function displayForm() {
        echo "<form action='" . $this->action . "' method='POST'>";
        echo '<table width="100%" border="0">';

        foreach ($this->fields as $field) {
            echo "<tr><td align='right' valign='top'>" . $field['label'] . "</td>";
            echo "<td>";

            switch ($field['type']) {
                case 'textarea':
                    echo "<textarea name='" . $field['name'] . "' cols='30' rows='4'></textarea>";
                    break;

                case 'select':
                    echo "<select name='" . $field['name'] . "'>";
                    foreach ($field['options'] as $value => $label) {
                        echo "<option value='" . $value . "'>" . $label . "</option>";
                    }
                    echo "</select>";
                    break;

                case 'radio':
                    foreach ($field['options'] as $value => $label) {
                        echo "<label><input type='radio' name='" . $field['name'] . "' value='$value'> $label</label> ";
                    }
                    break;

                case 'checkbox':
                    foreach ($field['options'] as $value => $label) {
                        echo "<label><input type='checkbox' name='".$field['name']."[]' value='$value'> $label</label> ";
                    }
                    break;

                case 'password':
                    echo "<input type='password' name='" . $field['name'] . "'>";
                    break;

                default:
                    echo "<input type='text' name='" . $field['name'] . "'>";
                    break;
            }

            echo "</td></tr>";
        }

        echo "<tr><td colspan='2'><input type='submit' value='" . $this->submit . "'></td></tr>";
        echo "</table></form>";
    }

    public function addField($name, $label, $type = "text", $options = array()) {
        $this->fields[$this->jumField]['name'] = $name;
        $this->fields[$this->jumField]['label'] = $label;
        $this->fields[$this->jumField]['type'] = $type;
        $this->fields[$this->jumField]['options'] = $options;
        $this->jumField++;
    }
}
?>
```

**Contoh Output Form:**

> [Masukkan screenshot hasil form dinamis di sini]

---

## 3. Membuat Class Database

Class `Database` digunakan untuk koneksi database, query, insert, dan update.

**Kode Program (`class/Database.php`):**

```php
<?php
class Database {
    protected $host;
    protected $user;
    protected $password;
    protected $db_name;
    protected $conn;

    public function __construct() {
        $this->getConfig();
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->db_name);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    private function getConfig() {
        include("config.php");
        $this->host = $config['host'];
        $this->user = $config['username'];
        $this->password = $config['password'];
        $this->db_name = $config['db_name'];
    }

    public function query($sql) {
        return $this->conn->query($sql);
    }

    public function get($table, $where = null) {
        if ($where) {
            $where = " WHERE " . $where;
        }
        $sql = "SELECT * FROM " . $table . $where;
        $result = $this->conn->query($sql);
        return $result->fetch_assoc();
    }

    public function insert($table, $data) {
        foreach ($data as $key => $val) {
            $column[] = $key;
            $value[]  = "'{$val}'";
        }

        $columns = implode(",", $column);
        $values  = implode(",", $value);

        $sql = "INSERT INTO $table ($columns) VALUES ($values)";
        return $this->conn->query($sql);
    }

    public function update($table, $data, $where) {
        foreach ($data as $key => $val) {
            $update_value[] = "$key='{$val}'";
        }

        $update_value = implode(",", $update_value);
        $sql = "UPDATE $table SET $update_value WHERE $where";

        return $this->conn->query($sql);
    }
}
?>
```

**Screenshot pengujian koneksi Database:**

> [Masukkan screenshot di sini]

---

## 4. Konfigurasi Routing Menggunakan `.htaccess`

Routing digunakan agar URL menjadi lebih rapi, seperti:

```
localhost/lab11_php_oop/artikel/tambah
```

Isi file:

```apache
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteBase /lab11_php_oop/

RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f

RewriteRule ^(.*)$ index.php/$1 [L]
</IfModule>
```

**Screenshot `.htaccess`:**

> [Masukkan screenshot di sini]

---

## 5. Routing Logic di index.php

`index.php` berfungsi menangkap URL dan menentukan modul mana yang harus dijalankan.

**Kode Program (index.php):**

```php
<?php
include "config.php";
include "class/Database.php";
include "class/Form.php";

session_start();

$path = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/home/index';
$segments = explode('/', trim($path, '/'));

$mod  = $segments[0] ?? 'home';
$page = $segments[1] ?? 'index';

$file = "module/{$mod}/{$page}.php";

include "template/header.php";

if (file_exists($file)) {
    include $file;
} else {
    echo "<div class='alert alert-danger'>Modul tidak ditemukan: $mod/$page</div>";
}

include "template/footer.php";
?>
```

**Screenshot hasil URL routing:**

> [Masukkan screenshot di sini]

---

## 6. Modul Artikel

Modul ini mendemonstrasikan penggunaan konsep modular dan routing.

Isi folder:

```
module/artikel/
├── index.php      <-- Menampilkan data artikel
├── tambah.php     <-- Tambah artikel
└── ubah.php       <-- Edit artikel
```

**Screenshot Modul Artikel:**

> [Masukkan screenshot di sini]

---

## 🚀 Tugas Praktikum

1. Membuat repository **Lab11Web**
2. Mengerjakan seluruh langkah pada modul
3. Screenshot setiap perubahan
4. Membuat README.md (dokumen ini)
5. Commit dan push ke repository
6. Submit URL repository di e-learning
