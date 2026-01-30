<?php
include "../config/koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Laporan Transaksi Kendaraan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .container {
            width: 1000px;
            margin: 50px auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 10px;
        }
        .info {
            margin-bottom: 15px;
            font-size: 14px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }
        th {
            background-color: #0d6efd;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .status-disewa {
            color: #0d6efd;
            font-weight: bold;
        }
        .status-kembali {
            color: #198754;
            font-weight: bold;
        }
        .btn-hapus {
            background: #dc3545;
            color: white;
            padding: 6px 10px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 13px;
        }
        .btn-hapus:hover {
            background: #bb2d3b;
        }
        .back {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: white;
            background: #6c757d;
            padding: 8px 14px;
            border-radius: 5px;
        }
        .back:hover {
            background: #5a6268;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Laporan Transaksi Kendaraan</h2>

    <div class="info">
        Tanggal cetak: <b><?= date('d-m-Y') ?></b>
    </div>

    <table>
        <tr>
            <th>No</th>
            <th>Nama Pelanggan</th>
            <th>Nama Kendaraan</th>
            <th>Jenis</th>
            <th>Tanggal Sewa</th>
            <th>Tanggal Kembali</th>
            <th>Denda</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;
        $data = mysqli_query($conn,"
            SELECT 
                t.id_transaksi,
                p.nama,
                k.nama_kendaraan,
                k.jenis,
                t.tanggal_sewa,
                t.tanggal_kembali,
                t.denda,
                t.status
            FROM transaksi t
            JOIN pelanggan p ON t.id_pelanggan = p.id_pelanggan
            JOIN kendaraan k ON t.id_kendaraan = k.id_kendaraan
        ");

        if(mysqli_num_rows($data) > 0){
            while($d = mysqli_fetch_array($data)){
        ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $d['nama'] ?></td>
            <td><?= $d['nama_kendaraan'] ?></td>
            <td><?= $d['jenis'] ?></td>
            <td><?= $d['tanggal_sewa'] ?></td>
            <td><?= $d['tanggal_kembali'] ? $d['tanggal_kembali'] : '-' ?></td>
            <td><?= $d['denda'] ?></td>
            <td class="<?= $d['status'] == 'Disewa' ? 'status-disewa' : 'status-kembali' ?>">
                <?= $d['status'] ?>
            </td>
            <td>
                <a class="btn-hapus"
                   href="../transaksi/hapus.php?id=<?= $d['id_transaksi'] ?>"
                   onclick="return confirm('Hapus transaksi ini?')">
                   Hapus
                </a>
            </td>
        </tr>
        <?php
            }
        } else {
        ?>
        <tr>
            <td colspan="9" style="font-style:italic;color:#666;">
                Tidak ada data transaksi
            </td>
        </tr>
        <?php } ?>
    </table>

    <a class="back" href="../index.php">⬅ Kembali ke Menu Utama</a>
</div>

</body>
</html>
