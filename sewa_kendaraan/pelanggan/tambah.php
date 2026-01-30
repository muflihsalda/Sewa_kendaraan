<?php
include "../config/koneksi.php";

if (isset($_POST['simpan'])) {
    mysqli_query($conn, "INSERT INTO pelanggan VALUES (
        NULL,
        '$_POST[nama]',
        '$_POST[alamat]',
        '$_POST[no_hp]'
    )");

    header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Pelanggan</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #eef2f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            width: 420px;
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 6px;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ccc;
            margin-bottom: 15px;
            font-size: 14px;
        }

        textarea {
            resize: none;
            height: 80px;
        }

        button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 10px;
            background: #198754;
            color: white;
            font-weight: bold;
            font-size: 15px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: #157347;
        }

        .back {
            display: block;
            text-align: center;
            margin-top: 15px;
            text-decoration: none;
            color: #0d6efd;
            font-weight: bold;
        }

        .back:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

<div class="card">
    <h2>👤 Tambah Pelanggan</h2>

    <form method="post">
        <label>Nama Pelanggan</label>
        <input type="text" name="nama" required>

        <label>Alamat</label>
        <textarea name="alamat" required></textarea>

        <label>No HP</label>
        <input type="text" name="no_hp" required>

        <button type="submit" name="simpan">💾 Simpan Data</button>
    </form>

    <a href="index.php" class="back">⬅ Kembali</a>
</div>

</body>
</html>
