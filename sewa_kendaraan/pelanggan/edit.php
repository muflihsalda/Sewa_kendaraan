<?php
include "../config/koneksi.php";
include "../config/auth.php";

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM pelanggan WHERE id_pelanggan='$id'");
$d = mysqli_fetch_array($data);

if (isset($_POST['simpan'])) {
    mysqli_query($conn, "UPDATE pelanggan SET
        nama='$_POST[nama]',
        alamat='$_POST[alamat]',
        no_hp='$_POST[hp]'
        WHERE id_pelanggan='$id'
    ");

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Pelanggan</title>
    <style>
        body { font-family: Arial; background:#f4f4f4; }
        .container { width:500px; margin:60px auto; background:white; padding:20px; border-radius:8px; }
        h2 { text-align:center; }
        label { font-weight:bold; }
        input, textarea { width:100%; padding:8px; margin:5px 0 15px; }
        button { width:100%; padding:10px; background:#0d6efd; color:white; border:none; border-radius:5px; }
        .back { display:block; margin-top:10px; text-align:center; color:#6c757d; text-decoration:none; }
    </style>
</head>
<body>

<div class="container">
    <h2>Edit Pelanggan</h2>

    <form method="POST">
        <label>Nama Pelanggan</label>
        <input type="text" name="nama" value="<?= $d['nama'] ?>" required>

        <label>Alamat</label>
        <textarea name="alamat" required><?= $d['alamat'] ?></textarea>

        <label>No HP</label>
        <input type="text" name="hp" value="<?= $d['no_hp'] ?>" required>

        <button type="submit" name="simpan">Simpan Perubahan</button>
        <a href="index.php" class="back">⬅ Kembali</a>
    </form>
</div>

</body>
</html>
