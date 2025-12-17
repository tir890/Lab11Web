<?php
$base_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['SCRIPT_NAME']);
$base_url = str_replace(['/module/artikel', '/module/user'], '', $base_url);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Modular</title>
    <link rel="stylesheet" href="<?= $base_url ?>/assets/css/style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>DATABASE MODULAR</h1>
            <p>Implementasi Praktikum PHP OOP & Routing</p>
        </header>
        <hr>
        
        <div class="main-wrapper">
            <div class="main-content"></div>