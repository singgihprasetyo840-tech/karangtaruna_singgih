<?php include "config/koneksi.php"; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Karang Taruna Desa Karangrejo</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
  <h1>Karang Taruna Desa Karangrejo</h1>
  <p>Jl. Karangrejo Raya No.64, Banyumanik, Semarang</p>
</header>

<div class="container">
  <h2>Tentang Kami</h2>
  <p>
    Karang Taruna Desa Karangrejo adalah wadah generasi muda untuk berperan aktif
    dalam kegiatan sosial, budaya, dan pembangunan desa.
  </p>

  <hr>
  <h2>Kegiatan Terbaru</h2>
  <?php
  $query = mysqli_query($koneksi, "SELECT * FROM kegiatan ORDER BY tanggal_mulai DESC LIMIT 3");
  while ($data = mysqli_fetch_array($query)) {
    echo "<div style='padding:10px;border-bottom:1px solid #ddd;margin-bottom:8px'>
            <h3 style='color:#26a69a'>$data[nama_kegiatan]</h3>
            <small><b>$data[tanggal_mulai]</b> - $data[tanggal_selesai] di <b>$data[tempat]</b></small>
            <p>$data[deskripsi]</p>
          </div>";
  }
  ?>
  <center>
    <a href="login.php" class="btn">Login</a>
    <a href="register.php" class="btn" style="background:var(--oranye)">Daftar</a>
  </center>
</div>

<div class="footer">
  <p>&copy; 2025 Karang Taruna Desa Karangrejo</p>
</div>
</body>
</html>
