<?php
// Proses simpan data
if (isset($_POST['submit'])) { 
    // Logika upload file
    $filename = null;
    $file_gambar = $_FILES['file_gambar'];
    if ($file_gambar['error'] == 0) {
        $filename = str_replace(' ', '_', $file_gambar['name']);
        // Pastikan folder ini ada
        move_uploaded_file($file_gambar['tmp_name'], 'assets/img/' . $filename);
    }

    $data = [
        'nama' => $_POST['nama'],
        'kategori' => $_POST['kategori'],
        'harga_jual' => $_POST['harga_jual'],
        'harga_beli' => $_POST['harga_beli'],
        'stok' => $_POST['stok'],
        'gambar' => $filename
    ];

    $insert = $db->insert('data_barang', $data);

    if ($insert) {
        header('location: index.php?page=artikel/list');
        exit;
    } else {
        echo "<script>alert('Gagal menyimpan data.');</script>";
    }
}
?>

<div class="widget">
    <h3>➕ Tambah Barang Baru</h3>
    
    <form method="post" action="" enctype="multipart/form-data" class="custom-form">
        
        <div style="margin-bottom: 15px;">
            <label style="display:block; font-weight:bold; margin-bottom: 5px;">Nama Barang</label>
            <input type="text" name="nama" required placeholder="Contoh: HP Samsung Galaxy..." />
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display:block; font-weight:bold; margin-bottom: 5px;">Kategori</label>
            <select name="kategori" style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px;">
                <option value="Elektronik">Elektronik</option>
                <option value="Komputer">Komputer</option>
                <option value="Hand Phone">Hand Phone</option>
                <option value="Aksesoris">Aksesoris</option>
            </select>
        </div>

        <div style="display: flex; gap: 20px;">
            <div style="flex: 1; margin-bottom: 15px;">
                <label style="display:block; font-weight:bold; margin-bottom: 5px;">Harga Jual</label>
                <input type="number" name="harga_jual" required style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px;" />
            </div>
            <div style="flex: 1; margin-bottom: 15px;">
                <label style="display:block; font-weight:bold; margin-bottom: 5px;">Harga Beli</label>
                <input type="number" name="harga_beli" required style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px;" />
            </div>
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display:block; font-weight:bold; margin-bottom: 5px;">Stok Barang</label>
            <input type="number" name="stok" required style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px;" />
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display:block; font-weight:bold; margin-bottom: 5px;">Gambar Produk</label>
            <input type="file" name="file_gambar" style="width: 100%; padding: 8px; border: 1px solid #d1d5db; border-radius: 6px; background: #f9fafb;" />
        </div>

        <div class="submit">
            <button type="submit" name="submit" class="btn-submit" style="width: 100%;">Simpan Barang</button>
        </div>
        
    </form>
</div>