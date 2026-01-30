<?php
include "../config/koneksi.php";

$id = $_GET['id'];
$id_kendaraan = $_GET['kendaraan'];

/* kembalikan stok */
mysqli_query($conn, "UPDATE kendaraan SET stok = stok + 1 
    WHERE id_kendaraan = '$id_kendaraan'");

/* hapus transaksi */
mysqli_query($conn, "DELETE FROM transaksi WHERE id_transaksi = '$id'");

header("location:kembali.php");
?>
