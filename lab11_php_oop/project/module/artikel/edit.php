<?php
$id = $_GET['id'];
$data_barang = $db->get('data_barang', "id_barang = '$id'");

if (isset($_POST['submit'])) {
    $filename = $data_barang['gambar']; 
    if ($_FILES['file_gambar']['error'] == 0) {
        $file_gambar = $_FILES['file_gambar'];
        $filename = str_replace(' ', '_', $file_gambar['name']);
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

    $update = $db->update('data_barang', $data, "id_barang = '$id'");

    if ($update) {
        header('location: index.php?page=artikel/list');
        exit;
    } else {
        echo "<script>alert('Gagal mengubah data.');</script>";
    }
}
?>

<div class="widget">
    <h3>✏️ Ubah Data Barang</h3>
    
    <form method="post" action="" enctype="multipart/form-data" class="custom-form">
        
        <div style="margin-bottom: 15px;">
            <label style="display:block; font-weight:bold; margin-bottom: 5px;">Nama Barang</label>
            <input type="text" name="nama" value="<?= $data_barang['nama'] ?>" required />
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display:block; font-weight:bold; margin-bottom: 5px;">Kategori</label>
            <select name="kategori" style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px;">
                <option value="Elektronik" <?= ($data_barang['kategori'] == 'Elektronik') ? 'selected' : '' ?>>Elektronik</option>
                <option value="Komputer" <?= ($data_barang['kategori'] == 'Komputer') ? 'selected' : '' ?>>Komputer</option>
                <option value="Hand Phone" <?= ($data_barang['kategori'] == 'Hand Phone') ? 'selected' : '' ?>>Hand Phone</option>
                <option value="Aksesoris" <?= ($data_barang['kategori'] == 'Aksesoris') ? 'selected' : '' ?>>Aksesoris</option>
            </select>
        </div>

        <div style="display: flex; gap: 20px;">
            <div style="flex: 1; margin-bottom: 15px;">
                <label style="display:block; font-weight:bold; margin-bottom: 5px;">Harga Jual</label>
                <input type="number" name="harga_jual" value="<?= $data_barang['harga_jual'] ?>" required style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px;" />
            </div>
            <div style="flex: 1; margin-bottom: 15px;">
                <label style="display:block; font-weight:bold; margin-bottom: 5px;">Harga Beli</label>
                <input type="number" name="harga_beli" value="<?= $data_barang['harga_beli'] ?>" required style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px;" />
            </div>
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display:block; font-weight:bold; margin-bottom: 5px;">Stok Barang</label>
            <input type="number" name="stok" value="<?= $data_barang['stok'] ?>" required style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px;" />
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display:block; font-weight:bold; margin-bottom: 5px;">Gambar Produk (Biarkan kosong jika tidak diganti)</label>
            
            <?php if (!empty($data_barang['gambar'])): ?>
                <div style="margin-bottom: 10px;">
                    <img src="assets/img/<?= $data_barang['gambar'] ?>" alt="Preview" style="width: 80px; border: 1px solid #ddd; padding: 3px; border-radius: 5px;">
                </div>
            <?php endif; ?>
            
            <input type="file" name="file_gambar" style="width: 100%; padding: 8px; border: 1px solid #d1d5db; border-radius: 6px; background: #f9fafb;" />
        </div>

        <div class="submit">
            <button type="submit" name="submit" class="btn-submit" style="width: 100%;">Simpan Perubahan</button>
        </div>
        
    </form>
</div>