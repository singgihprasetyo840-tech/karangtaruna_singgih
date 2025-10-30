<?php
session_start();
if ($_SESSION['level'] != 'admin') header("location:../login.php");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
  <h1>Dashboard Administrator</h1>
</header>

<div class="container">
  <h2>Selamat Datang, <?= $_SESSION['nama']; ?> 👋</h2>
  <p>Gunakan menu di bawah untuk mengelola data Karang Taruna.</p>
  <hr>

  <div style="display:flex; flex-wrap:wrap; gap:10px;">
    <a class="btn" href="anggota.php">👥 Data Anggota</a>
    <a class="btn" href="jabatan.php">📋 Data Jabatan</a>
    <a class="btn" href="kegiatan.php">🎯 Data Kegiatan</a>
    <a class="btn" href="keuangan.php">💰 Data Keuangan</a>
    <a class="btn" href="laporan_anggota.php">📑 Laporan Anggota</a>
    <a class="btn" href="../logout.php" style="background:var(--oranye)">🚪 Logout</a>
  </div>
</div>

<div class="footer">
  <p>&copy; 2025 Karang Taruna Desa Karangrejo</p>
</div>
</body>
</html>
