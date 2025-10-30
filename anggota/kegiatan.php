<?php
session_start();
include "../config/koneksi.php";
if ($_SESSION['level'] != 'anggota') header("location:../login.php");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Daftar Kegiatan - Karang Taruna</title>
  <link rel="stylesheet" href="../style.css">
</head>
<body>

<header>
  <h1>Daftar Kegiatan Karang Taruna</h1>
</header>

<div class="container">
  <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap;">
    <h2>Kegiatan yang Akan dan Telah Dilaksanakan</h2>
    <a href="dashboard.php" class="btn">🏠 Kembali</a>
  </div>
  <hr>

  <table class="table">
    <tr>
      <th>No</th>
      <th>Nama Kegiatan</th>
      <th>Tanggal</th>
      <th>Tempat</th>
      <th>Deskripsi</th>
    </tr>
    <?php
    $no = 1;
    $q = mysqli_query($koneksi, "SELECT * FROM kegiatan ORDER BY tanggal_mulai DESC");
    while ($d = mysqli_fetch_array($q)):
    ?>
    <tr>
      <td><?= $no++; ?></td>
      <td><?= $d['nama_kegiatan']; ?></td>
      <td><?= date('d M Y', strtotime($d['tanggal_mulai'])); ?> s/d <?= date('d M Y', strtotime($d['tanggal_selesai'])); ?></td>
      <td><?= $d['tempat']; ?></td>
      <td><?= $d['deskripsi']; ?></td>
    </tr>
    <?php endwhile; ?>
  </table>
</div>

<div class="footer">
  <p>&copy; 2025 Karang Taruna Desa Karangrejo</p>
</div>

</body>
</html>
