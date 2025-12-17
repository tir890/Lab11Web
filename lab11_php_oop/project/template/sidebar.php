<aside class="sidebar">
    
    <div class="widget">
        <h3>Menu Navigasi</h3>
        <ul class="sidebar-menu">
            <li><a href="../home/index">🏠 Beranda</a></li>
            <li><a href="../artikel/list">📦 Data Barang</a></li>
            <li><a href="../artikel/add">➕ Tambah Barang</a></li>
            
            <?php if (isset($_SESSION['is_login'])): ?>
                <li><a href="../user/profile">👤 Profil (<?= $_SESSION['nama'] ?>)</a></li>
                <li><a href="../user/logout" style="color: #ef4444;">🚪 Logout</a></li>
            <?php else: ?>
                <li><a href="../user/login">🔐 Login</a></li>
            <?php endif; ?>
        </ul>
    </div>

    <div class="widget">
        <h3>Info Praktikum</h3>
        <p style="font-size: 13px; color: #64748b; line-height: 1.5; margin:0;">
            Aplikasi ini disusun untuk memenuhi tugas <strong>Pemrograman Web 2</strong>.
        </p>
    </div>

</aside>