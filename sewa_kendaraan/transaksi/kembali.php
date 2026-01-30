<?php
include "../config/koneksi.php";

if (isset($_POST['kembali'])) {
    mysqli_query($conn, "UPDATE transaksi SET
        tanggal_kembali = CURDATE(),
        denda = '$_POST[denda]',
        status = 'Kembali'
        WHERE id_transaksi = '$_POST[id]'
    ");

    mysqli_query($conn, "UPDATE kendaraan SET stok = stok + 1
        WHERE id_kendaraan = '$_POST[id_kendaraan]'");

    echo "<script>alert('Pengembalian berhasil');location='kembali.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pengembalian Kendaraan</title>
    <style>
        body { font-family: Arial; background: #f4f4f4; }
        .container {
            width: 900px;
            margin: 50px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        table { width: 100%; border-collapse: collapse; }
        th, td { 
            border: 1px solid #ddd; 
            padding: 10px; 
            text-align: center; 
            vertical-align: middle;
        }
        th { background: #0d6efd; color: white; }

        input[type=number] {
            width: 100%;
            padding: 6px;
            box-sizing: border-box;
            text-align: center;
        }

        .aksi {
            display: flex;
            flex-direction: column;
            gap: 6px;
            align-items: center;
        }

        button {
            padding: 6px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            color: white;
            font-size: 13px;
            width: 100px;
        }
        .btn-kembali { background: #198754; }
        .btn-kembali:hover { background: #146c43; }

        .btn-hapus {
            background: #dc3545;
            padding: 6px 10px;
            border-radius: 5px;
            color: white;
            text-decoration: none;
            font-size: 13px;
            width: 100px;
            text-align: center;
        }
        .btn-hapus:hover { background: #bb2d3b; }

        .back {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: #0d6efd;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
<h2 align="center">Pengembalian Kendaraan</h2>

<table>
<tr>
    <th>Pelanggan</th>
    <th>Kendaraan</th>
    <th>Tanggal Sewa</th>
    <th>Tanggal Kembali</th>
    <th>Denda</th>
    <th>Aksi</th>
</tr>

<?php
$data = mysqli_query($conn,"
    SELECT t.*, p.nama, k.nama_kendaraan
    FROM transaksi t
    JOIN pelanggan p ON t.id_pelanggan=p.id_pelanggan
    JOIN kendaraan k ON t.id_kendaraan=k.id_kendaraan
    WHERE t.status='Disewa'
");

while($d=mysqli_fetch_array($data)){
?>
<tr>
    <td><?= $d['nama'] ?></td>
    <td><?= $d['nama_kendaraan'] ?></td>
    <td><?= $d['tanggal_sewa'] ?></td>
    <td><?= $d['tanggal_kembali'] ? $d['tanggal_kembali'] : '-' ?></td>

    <td>
        <form method="post">
            <input type="hidden" name="id" value="<?= $d['id_transaksi'] ?>">
            <input type="hidden" name="id_kendaraan" value="<?= $d['id_kendaraan'] ?>">
            <input type="number" name="denda" value="0" min="0">
    </td>

    <td>
        <div class="aksi">
            <button class="btn-kembali" name="kembali">Kembalikan</button>
        </form>

            <a class="btn-hapus" 
               href="hapus.php?id=<?= $d['id_transaksi'] ?>&kendaraan=<?= $d['id_kendaraan'] ?>"
               onclick="return confirm('Hapus transaksi ini?')">
               Hapus
            </a>
        </div>
    </td>
</tr>
<?php } ?>
</table>

<a class="back" href="../index.php">⬅ Kembali ke Menu Utama</a>
</div>

</body>
</html>
