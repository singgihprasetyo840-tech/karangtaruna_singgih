<?php
session_start();
include "../config/koneksi.php";
if ($_SESSION['level'] != 'admin') header("location:../login.php");

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $tempat = $_POST['tempat'];
    $tgl_mulai = $_POST['tgl_mulai'];
    $tgl_selesai = $_POST['tgl_selesai'];
    $desk = $_POST['desk'];

    mysqli_query($koneksi, "INSERT INTO kegiatan VALUES('', '$nama', '$tempat', '$tgl_mulai', '$tgl_selesai', '$desk')");
    header("location:kegiatan.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Kegiatan - Karang Taruna</title>
  <link rel="stylesheet" href="../style.css">
</head>
<body>

<header>
  <h1>Tambah Kegiatan Baru</h1>
</header>

<div class="container" style="max-width:600px;">
  <form method="POST">
    <label>Nama Kegiatan</label>
    <input type="text" name="nama" placeholder="Masukkan nama kegiatan..." required>

    <label>Tempat Pelaksanaan</label>
    <input type="text" name="tempat" placeholder="Contoh: Balai Desa Karangrejo" required>

    <label>Tanggal Mulai</label>
    <input type="date" name="tgl_mulai" required>

    <label>Tanggal Selesai</label>
    <input type="date" name="tgl_selesai" required>

    <label>Deskripsi Kegiatan</label>
    <textarea name="desk" rows="3" placeholder="Masukkan deskripsi singkat kegiatan..."></textarea>

    <div style="margin-top:15px; display:flex; gap:10px;">
      <button type="submit" name="simpan">💾 Simpan</button>
      <a href="kegiatan.php" class="btn" style="background:var(--oranye)">⬅ Kembali</a>
    </div>
  </form>
</div>

<div class="footer">
  <p>&copy; 2025 Karang Taruna Desa Karangrejo</p>
</div>

</body>
</html>
