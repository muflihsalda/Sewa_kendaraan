<?php include "../config/koneksi.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Pelanggan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
        }
        .container {
            width: 800px;
            margin: 50px auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
        }
        h2 {
            text-align: center;
        }
        .top {
            margin-bottom: 15px;
        }
        .btn {
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 5px;
            color: white;
            font-size: 14px;
        }
        .btn-add { background: #198754; }
        .btn-back { background: #6c757d; }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
        }
        th {
            background: #0d6efd;
            color: white;
            text-align: center;
        }
        tr:nth-child(even) {
            background: #f9f9f9;
        }
        .btn-edit { background: #ffc107; color: black; }
        .btn-delete { background: #dc3545; }
    </style>
</head>
<body>

<div class="container">
    <h2>Data Pelanggan</h2>

    <div class="top">
        <a href="tambah.php" class="btn btn-add">➕ Tambah Pelanggan</a>
        <a href="../index.php" class="btn btn-back">⬅ Menu Utama</a>
    </div>

    <table>
        <tr>
            <th>No</th>
            <th>Nama Pelanggan</th>
            <th>Alamat</th>
            <th>No HP</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;
        $data = mysqli_query($conn,"SELECT * FROM pelanggan");
        while($d=mysqli_fetch_array($data)){
        ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $d['nama'] ?></td>
            <td><?= $d['alamat'] ?></td>
            <td><?= $d['no_hp'] ?></td>
            <td align="center">
                <a href="edit.php?id=<?= $d['id_pelanggan'] ?>" class="btn btn-edit">Edit</a>
                <a href="hapus.php?id=<?= $d['id_pelanggan'] ?>" 
                   class="btn btn-delete"
                   onclick="return confirm('Hapus data?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>
