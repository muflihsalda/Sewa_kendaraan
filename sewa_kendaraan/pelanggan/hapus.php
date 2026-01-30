<?php
include "../config/koneksi.php";

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM pelanggan WHERE id_pelanggan='$id'");

header("location:index.php");
?>
