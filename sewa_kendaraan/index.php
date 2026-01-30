<?php
include "config/koneksi.php";
include "config/auth.php";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Menu Utama</title>

    <style>
        body {
            margin: 0;
            height: 100vh;
            font-family: Arial, sans-serif;
            background: 
                linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)),
                url("assets/bg.jpg") no-repeat center center fixed;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .wrapper {
            text-align: center;
            width: 420px;
        }

        h1 {
            margin-bottom: 5px;
        }

        p {
            margin-top: 0;
            margin-bottom: 25px;
        }

        .menu {
            background: rgba(255,255,255,0.92);
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.3);
        }

        .menu a {
            display: block;
            padding: 14px;
            margin-bottom: 12px;
            text-decoration: none;
            font-weight: bold;
            border-radius: 10px;
            color: #333;
            background: #eef2f7;
            transition: 0.3s;
        }

        .menu a:hover {
            background: #dbe4f3;
        }

        .logout {
            background: #f8d7da !important;
            color: #842029 !important;
        }

        .logout:hover {
            background: #f1b0b7 !important;
        }
    </style>
</head>

<body>

<div class="wrapper">
    <h1>Sistem Informasi Sewa Kendaraan</h1>
    <p>Selamat datang, <b><?= $_SESSION['username']; ?></b></p>

    <div class="menu">
        <a href="kendaraan/index.php">🚗 Data Kendaraan</a>
        <a href="pelanggan/index.php">👤 Data Pelanggan</a>
        <a href="transaksi/sewa.php">📝 Transaksi Sewa</a>
        <a href="transaksi/kembali.php">🔁 Pengembalian</a>
        <a href="laporan/kendaraan_disewa.php">📊 Laporan Kendaraan Disewa</a>
        <a href="auth/logout.php" class="logout">🚪 Logout</a>
    </div>

</div>

</body>
</html>
