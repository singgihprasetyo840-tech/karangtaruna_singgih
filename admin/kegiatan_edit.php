<?php
session_start();
include "../config/koneksi.php";
if ($_SESSION['level'] != 'admin') header("location:../login.php");

$id = $_GET['id'];
$q = mysqli_query($koneksi, "SELECT * FROM kegiatan WHERE id='$id'");
$d = mysqli_fetch_array($q);

if (isset($_POST['update'])) {
    mysqli_query($koneksi, "UPDATE kegiatan SET
        nama_kegiatan='$_POST[nama]',
        tempat='$_POST[tempat]',
        tanggal_mulai='$_POST[tgl_mulai]',
        tanggal_selesai='$_POST[tgl_selesai]',
        deskripsi='$_POST[desk]'
        WHERE id='$id'");
    header("location:kegiatan.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Kegiatan - Karang Taruna</title>
  <link rel="stylesheet" href="../style.css">
</head>
<body>

<header>
  <h1>Edit Data Kegiatan</h1>
</header>

<div class="container" style="max-width:600px;">
  <form method="POST">
    <label>Nama Kegiatan</label>
    <input type="text" name="nama" value="<?= $d['nama_kegiatan']; ?>" required>

    <label>Tempat Pelaksanaan</label>
    <input type="text" name="tempat" value="<?= $d['tempat']; ?>" required>

    <label>Tanggal Mulai</label>
    <input type="date" name="tgl_mulai" value="<?= $d['tanggal_mulai']; ?>" required>

    <label>Tanggal Selesai</label>
    <input type="date" name="tgl_selesai" value="<?= $d['tanggal_selesai']; ?>" required>

    <label>Deskripsi Kegiatan</label>
    <textarea name="desk" rows="3"><?= $d['deskripsi']; ?></textarea>

    <div style="margin-top:15px; display:flex; gap:10px;">
      <button type="submit" name="update">💾 Update</button>
      <a href="kegiatan.php" class="btn" style="background:var(--oranye)">⬅ Kembali</a>
    </div>
  </form>
</div>

<div class="footer">
  <p>&copy; 2025 Karang Taruna Desa Karangrejo</p>
</div>

</body>
</html>
