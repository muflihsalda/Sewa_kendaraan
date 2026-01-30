<?php
include "../config/koneksi.php";
include "../config/auth.php";

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM kendaraan WHERE id_kendaraan='$id'");
$d = mysqli_fetch_array($data);

if (isset($_POST['simpan'])) {
    mysqli_query($conn, "UPDATE kendaraan SET
        nama_kendaraan='$_POST[nama]',
        jenis='$_POST[jenis]',
        plat_nomor='$_POST[plat]',
        harga_sewa='$_POST[harga]',
        stok='$_POST[stok]'
        WHERE id_kendaraan='$id'
    ");

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Kendaraan</title>
    <!-- STYLE FORM -->
    <style>
        body { font-family: Arial; background:#f4f4f4; }
        .container { width:500px; margin:60px auto; background:white; padding:20px; border-radius:8px; }
        h2 { text-align:center; }
        label { font-weight:bold; }
        input { width:100%; padding:8px; margin:5px 0 15px; }
        button { width:100%; padding:10px; background:#0d6efd; color:white; border:none; border-radius:5px; }
        .back { display:block; margin-top:10px; text-align:center; color:#6c757d; text-decoration:none; }
    </style>
</head>
<body>

<div class="container">
    <h2>Edit Kendaraan</h2>

    <form method="POST">
        <label>Nama Kendaraan</label>
        <input type="text" name="nama" value="<?= $d['nama_kendaraan'] ?>" required>

        <label>Jenis</label>
        <input type="text" name="jenis" value="<?= $d['jenis'] ?>" required>

        <label>Plat Nomor</label>
        <input type="text" name="plat" value="<?= $d['plat_nomor'] ?>" required>

        <label>Harga Sewa</label>
        <input type="number" name="harga" value="<?= $d['harga_sewa'] ?>" required>

        <label>Stok</label>
        <input type="number" name="stok" value="<?= $d['stok'] ?>" required>

        <button type="submit" name="simpan">Simpan Perubahan</button>
        <a href="index.php" class="back">⬅ Kembali</a>
    </form>
</div>

</body>
</html>
