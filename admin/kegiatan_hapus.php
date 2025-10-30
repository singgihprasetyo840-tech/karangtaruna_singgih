<?php
include "../config/koneksi.php";
$id=$_GET['id'];
mysqli_query($koneksi,"DELETE FROM kegiatan WHERE id='$id'");
header("location:kegiatan.php");
?>
