<?php
session_start();
include "../config/koneksi.php";
if ($_SESSION['level'] != 'admin') header("location:../login.php");

$anggota = mysqli_query($koneksi, "
  SELECT a.*, j.nama_jabatan 
  FROM anggota a 
  LEFT JOIN jabatan j ON a.jabatan_id=j.id 
  ORDER BY j.nama_jabatan ASC, a.nama ASC
");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Laporan Anggota - Karang Taruna</title>
  <link rel="stylesheet" href="../style.css">
  <style>
    @media print {
      button, .btn, .no-print { display: none; }
      .container { box-shadow: none; }
    }
  </style>
</head>
<body>
<header>
  <h1>Laporan Data Anggota Karang Taruna</h1>
</header>

<div class="container">
  <div class="no-print">
    <a href="dashboard.php" class="btn">🏠 Kembali</a>
    <button onclick="window.print()">🖨 Cetak Laporan</button>
  </div>

  <h2>Daftar Anggota Berdasarkan Jabatan</h2>
  <table class="table">
    <tr>
      <th>No</th>
      <th>NIK</th>
      <th>Nama</th>
      <th>Tempat/Tanggal Lahir</th>
      <th>JK</th>
      <th>Alamat</th>
      <th>No HP</th>
      <th>Jabatan</th>
    </tr>
    <?php
    $no = 1;
    while ($d = mysqli_fetch_array($anggota)):
    ?>
    <tr>
      <td><?= $no++; ?></td>
      <td><?= $d['nik']; ?></td>
      <td><?= $d['nama']; ?></td>
      <td><?= $d['tempat_lahir']; ?>, <?= $d['tanggal_lahir']; ?></td>
      <td><?= $d['jenis_kelamin']; ?></td>
      <td><?= $d['alamat']; ?></td>
      <td><?= $d['no_hp']; ?></td>
      <td><?= $d['nama_jabatan']; ?></td>
    </tr>
    <?php endwhile; ?>
  </table>
</div>

<div class="footer">
  <p>&copy; 2025 Karang Taruna Desa Karangrejo</p>
</div>
</body>
</html>
