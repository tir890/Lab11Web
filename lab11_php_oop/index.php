<?php
// TAMPILKAN ERROR
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Load Config & Helpers
include "config.php";
include "class/database.php";
include "class/form.php";

// Routing Sederhana
$request = isset($_GET['path']) ? $_GET['path'] : 'artikel/index';
$parts = explode('/', rtrim($request, '/'));

$modul = isset($parts[0]) ? $parts[0] : 'artikel';
$act   = isset($parts[1]) ? $parts[1] : 'index';

// Path File Module
$pageFile = "module/{$modul}/{$act}.php";

// Render Template
include "template/header.php";
?>

<div class="main-wrapper">
    
    <div class="main-content">
        <?php
        if (file_exists($pageFile)) {
            include $pageFile;
        } else {
            echo "<div style='padding:20px; text-align:center; color:red;'>
                    <h3>404 Not Found</h3>
                    <p>Modul tidak ditemukan: <b>$pageFile</b></p>
                  </div>";
        }
        ?>
    </div>

    <?php include "template/sidebar.php"; ?>

</div>
<?php
include "template/footer.php";
?>