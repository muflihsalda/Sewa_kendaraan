<?php
include "../config/koneksi.php";

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM kendaraan WHERE id_kendaraan='$id'");

header("location:index.php");
?>
