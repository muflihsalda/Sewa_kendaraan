<?php
include "../config/koneksi.php";

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM transaksi WHERE id_transaksi='$id'");

header("Location: kendaraan_disewa.php");
exit;
