<?php
session_start();
include "../config/koneksi.php";
if ($_SESSION['level'] != 'admin') header("location:../login.php");

$q1 = mysqli_query($koneksi, "SELECT SUM(jumlah) as masuk FROM keuangan WHERE jenis='Masuk'");
$masuk = mysqli_fetch_array($q1)['masuk'] ?? 0;
$q2 = mysqli_query($koneksi, "SELECT SUM(jumlah) as keluar FROM keuangan WHERE jenis='Keluar'");
$keluar = mysqli_fetch_array($q2)['keluar'] ?? 0;
$saldo = $masuk - $keluar;

$transaksi = mysqli_query($koneksi, "SELECT * FROM keuangan ORDER BY tanggal ASC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Laporan Keuangan - Karang Taruna</title>
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
  <h1>Laporan Keuangan Karang Taruna</h1>
</header>

<div class="container">
  <div class="no-print">
    <a href="dashboard.php" class="btn">🏠 Kembali</a>
    <button onclick="window.print()">🖨 Cetak Laporan</button>
  </div>

  <h2>Rekapitulasi Keuangan</h2>
  <table class="table">
    <tr><th>Tanggal</th><th>Jenis</th><th>Keterangan</th><th>Jumlah (Rp)</th></tr>
    <?php while ($d = mysqli_fetch_array($transaksi)): ?>
      <tr>
        <td><?= $d['tanggal']; ?></td>
        <td><?= $d['jenis']; ?></td>
        <td><?= $d['keterangan']; ?></td>
        <td><?= number_format($d['jumlah'], 0, ',', '.'); ?></td>
      </tr>
    <?php endwhile; ?>
  </table>

  <hr>
  <h3>Total Pemasukan: Rp <?= number_format($masuk, 0, ',', '.'); ?></h3>
  <h3>Total Pengeluaran: Rp <?= number_format($keluar, 0, ',', '.'); ?></h3>
  <h2>Saldo Akhir: <span style="color:green;">Rp <?= number_format($saldo, 0, ',', '.'); ?></span></h2>
</div>

<div class="footer">
  <p>&copy; 2025 Karang Taruna Desa Karangrejo</p>
</div>
</body>
</html>
