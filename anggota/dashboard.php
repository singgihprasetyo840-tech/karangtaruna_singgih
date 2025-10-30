<?php
session_start();
if ($_SESSION['level'] != 'anggota') header("location:../login.php");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Anggota</title>
  <link rel="stylesheet" href="../style.css">
</head>
<body>
<header>
  <h1>Dashboard Anggota Karang Taruna</h1>
</header>

<div class="container">
  <h2>Selamat Datang, <?= $_SESSION['nama']; ?> 👋</h2>
  <p>Silakan akses menu berikut untuk melihat profil dan kegiatan.</p>
  <hr>
  <div style="display:flex; flex-wrap:wrap; gap:10px;">
    <a class="btn" href="profil.php">🧑 Profil Saya</a>
    <a class="btn" href="kegiatan.php">📅 Daftar Kegiatan</a>
    <a class="btn" href="../logout.php" style="background:var(--oranye)">🚪 Logout</a>
  </div>
</div>

<div class="footer">
  <p>&copy; 2025 Karang Taruna Desa Karangrejo</p>
</div>
</body>
</html>
