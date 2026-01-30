<?php
include "../config/koneksi.php";

if (isset($_POST['simpan'])) {
    mysqli_query($conn, "INSERT INTO kendaraan VALUES (
        NULL,
        '$_POST[nama]',
        '$_POST[jenis]',
        '$_POST[plat]',
        '$_POST[harga]',
        '$_POST[stok]'
    )");

    header("location:index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Kendaraan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #eef2f7, #d9e2ec);
            height: 100vh;
        }
        .card {
            width: 450px;
            margin: 70px auto;
            background: white;
            padding: 25px 30px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }
        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 14px;
        }
        input:focus, select:focus {
            outline: none;
            border-color: #0d6efd;
            box-shadow: 0 0 4px rgba(13,110,253,0.4);
        }
        .btn {
            width: 100%;
            padding: 12px;
            background: #0d6efd;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
        }
        .btn:hover {
            background: #0b5ed7;
        }
        .back {
            display: block;
            text-align: center;
            margin-top: 15px;
            text-decoration: none;
            color: #555;
            font-size: 14px;
        }
        .back:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="card">
    <h2>🚗 Tambah Data Kendaraan</h2>

    <form method="post">
        <label>Nama Kendaraan</label>
        <input type="text" name="nama" placeholder="Contoh: Avanza" required>

        <label>Jenis Kendaraan</label>
        <select name="jenis" required>
            <option value="">-- Pilih Jenis --</option>
            <option value="Mobil">Mobil</option>
            <option value="Motor">Motor</option>
            <option value="Minibus">Minibus</option>
        </select>

        <label>Plat Nomor</label>
        <input type="text" name="plat" placeholder="Contoh: B 1234 ABC" required>

        <label>Harga Sewa / Hari</label>
        <input type="number" name="harga" placeholder="Contoh: 300000" required>

        <label>Stok Kendaraan</label>
        <input type="number" name="stok" placeholder="Contoh: 5" required>

        <button type="submit" name="simpan" class="btn">💾 Simpan Data</button>
    </form>

    <a href="index.php" class="back">⬅ Kembali ke Data Kendaraan</a>
</div>

</body>
</html>
