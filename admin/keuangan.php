<?php
session_start();
include "../config/koneksi.php";
if ($_SESSION['level'] != 'admin') header("location:../login.php");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Keuangan - Karang Taruna</title>
  <link rel="stylesheet" href="../style.css">
</head>
<body>

<header>
  <h1>Manajemen Keuangan Karang Taruna</h1>
</header>

<div class="container">
  <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap;">
    <h2>Data Transaksi Kas / Iuran</h2>
    <div>
      <a href="dashboard.php" class="btn">🏠 Kembali</a>
      <a href="keuangan_tambah.php" class="btn" style="background:var(--oranye)">➕ Tambah Transaksi</a>
    </div>
  </div>
  <hr>

  <table class="table">
    <tr>
      <th>No</th>
      <th>Tanggal</th>
      <th>Jenis</th>
      <th>Keterangan</th>
      <th>Jumlah (Rp)</th>
      <th>Aksi</th>
    </tr>
    <?php
    $no = 1;
    $masuk = 0;
    $keluar = 0;
    $q = mysqli_query($koneksi, "SELECT * FROM keuangan ORDER BY tanggal DESC");
    while ($d = mysqli_fetch_array($q)):
      if ($d['jenis'] == 'Masuk') $masuk += $d['jumlah'];
      else $keluar += $d['jumlah'];
    ?>
    <tr>
      <td><?= $no++; ?></td>
      <td><?= $d['tanggal']; ?></td>
      <td><?= $d['jenis']; ?></td>
      <td><?= $d['keterangan']; ?></td>
      <td>Rp <?= number_format($d['jumlah'], 0, ',', '.'); ?></td>
      <td>
        <a href="keuangan_edit.php?id=<?= $d['id']; ?>">✏️ Edit</a> |
        <a href="keuangan_hapus.php?id=<?= $d['id']; ?>" onclick="return confirm('Yakin ingin menghapus transaksi ini?')">🗑 Hapus</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </table>

  <hr>
  <?php $saldo = $masuk - $keluar; ?>
  <h3>Total Pemasukan: <span style="color:green;">Rp <?= number_format($masuk, 0, ',', '.'); ?></span></h3>
  <h3>Total Pengeluaran: <span style="color:red;">Rp <?= number_format($keluar, 0, ',', '.'); ?></span></h3>
  <h2>Saldo Akhir: <span style="color:blue;">Rp <?= number_format($saldo, 0, ',', '.'); ?></span></h2>
</div>

<div class="footer">
  <p>&copy; 2025 Karang Taruna Desa Karangrejo</p>
</div>

</body>
</html>
