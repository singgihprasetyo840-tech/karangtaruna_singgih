<?php
include "../config/koneksi.php";
$id=$_GET['id'];
mysqli_query($koneksi,"DELETE FROM jabatan WHERE id='$id'");
header("location:jabatan.php");
?>
