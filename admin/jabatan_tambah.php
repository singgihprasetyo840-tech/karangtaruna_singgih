<?php
session_start();
include "../config/koneksi.php";
if ($_SESSION['level'] != 'admin') header("location:../login.php");

if (isset($_POST['simpan'])) {
    mysqli_query($koneksi, "INSERT INTO jabatan VALUES('', '$_POST[nama]', '$_POST[desk]')");
    header("location:jabatan.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Jabatan - Karang Taruna</title>
  <link rel="stylesheet" href="../style.css">
</head>
<body>

<header>
  <h1>Tambah Jabatan Baru</h1>
</header>

<div class="container" style="max-width:500px;">
  <form method="POST">
    <label>Nama Jabatan</label>
    <input type="text" name="nama" placeholder="Masukkan nama jabatan..." required>

    <label>Deskripsi Jabatan</label>
    <textarea name="desk" rows="3" placeholder="Masukkan deskripsi jabatan..."></textarea>

    <div style="margin-top:15px; display:flex; gap:10px;">
      <button type="submit" name="simpan">💾 Simpan</button>
      <a href="jabatan.php" class="btn" style="background:var(--oranye)">⬅ Kembali</a>
    </div>
  </form>
</div>

<div class="footer">
  <p>&copy; 2025 Karang Taruna Desa Karangrejo</p>
</div>

</body>
</html>

