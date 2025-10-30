<?php
include "../config/koneksi.php";
$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM keuangan WHERE id='$id'");
header("location:keuangan.php");
?>
