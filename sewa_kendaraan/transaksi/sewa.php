<?php
include "../config/koneksi.php";

if (isset($_POST['simpan'])) {
    mysqli_query($conn, "INSERT INTO transaksi VALUES (
        NULL,
        '$_POST[kendaraan]',
        '$_POST[pelanggan]',
        '$_POST[tgl_sewa]',
        '$_POST[tgl_kembali]',
        0,
        'Disewa'
    )");

    mysqli_query($conn, "UPDATE kendaraan SET stok = stok - 1 
        WHERE id_kendaraan='$_POST[kendaraan]'");

    echo "<script>alert('Transaksi berhasil');location='sewa.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Transaksi Penyewaan</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f4f4;
        }
        .container {
            width: 420px;
            margin: 60px auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
        }
        label {
            font-weight: bold;
        }
        select, input {
            width: 100%;
            padding: 8px;
            margin: 6px 0 12px;
        }
        button {
            width: 100%;
            padding: 10px;
            background: #198754;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background: #146c43;
        }
        .back {
            display: block;
            text-align: center;
            margin-top: 10px;
            text-decoration: none;
            color: #0d6efd;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Transaksi Penyewaan</h2>

    <form method="post">
        <label>Pelanggan</label>
        <select name="pelanggan" required>
            <option value="">-- Pilih Pelanggan --</option>
            <?php
            $p = mysqli_query($conn,"SELECT * FROM pelanggan");
            while($pl=mysqli_fetch_array($p)){
                echo "<option value='$pl[id_pelanggan]'>$pl[nama]</option>";
            }
            ?>
        </select>

        <label>Kendaraan</label>
        <select name="kendaraan" required>
            <option value="">-- Pilih Kendaraan --</option>
            <?php
            $k = mysqli_query($conn,"SELECT * FROM kendaraan WHERE stok > 0");
            while($kd=mysqli_fetch_array($k)){
                echo "<option value='$kd[id_kendaraan]'>$kd[nama_kendaraan]</option>";
            }
            ?>
        </select>

        <label>Tanggal Sewa</label>
        <input type="date" name="tgl_sewa" required>

        <label>Tanggal Kembali</label>
        <input type="date" name="tgl_kembali" required>

        <button type="submit" name="simpan">💾 Simpan Transaksi</button>
    </form>

    <a class="back" href="../index.php">⬅ Kembali ke Menu Utama</a>
</div>

</body>
</html>
