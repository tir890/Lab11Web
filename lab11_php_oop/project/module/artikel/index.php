<?php
// Ambil data dari database
$db = new Database();
$data = $db->query("SELECT * FROM barang");
?>

<div class="content">
    <h3>Daftar Barang</h3>
    
    <a href="tambah" class="btn-add">+ Tambah Data</a>
    <div style="clear:both;"></div>
    
    <br>

    <div class="table-responsive">
        <table border="0">
            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($data && $data->num_rows > 0): ?>
                    <?php while ($row = $data->fetch_assoc()): ?>
                    <tr>
                        <td>
                            <img src="<?= !empty($row['gambar']) ? $row['gambar'] : 'https://via.placeholder.com/50' ?>" alt="Gambar">
                        </td>
                        <td><?= $row['nama']; ?></td>
                        <td><?= $row['kategori']; ?></td>
                        <td>Rp <?= number_format($row['harga_jual'], 0, ',', '.'); ?></td>
                        <td><?= $row['stok']; ?></td>
                        <td>
                            <a href="ubah?id=<?= $row['id']; ?>" class="btn-edit">Edit</a>
                            <a href="hapus?id=<?= $row['id']; ?>" class="btn-delete">Hapus</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" align="center">Data barang masih kosong.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    </div>