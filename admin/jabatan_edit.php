<?php
session_start();
include "../config/koneksi.php";
if ($_SESSION['level'] != 'admin') header("location:../login.php");

$id = $_GET['id'];
$q = mysqli_query($koneksi, "SELECT * FROM jabatan WHERE id='$id'");
$d = mysqli_fetch_array($q);

if (isset($_POST['update'])) {
    mysqli_query($koneksi, "UPDATE jabatan SET 
        nama_jabatan='$_POST[nama]', 
        deskripsi='$_POST[desk]' 
        WHERE id='$id'");
    header("location:jabatan.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Jabatan - Karang Taruna</title>
  <link rel="stylesheet" href="../style.css">
</head>
<body>

<header>
  <h1>Edit Data Jabatan</h1>
</header>

<div class="container" style="max-width:500px;">
  <form method="POST">
    <label>Nama Jabatan</label>
    <input type="text" name="nama" value="<?= $d['nama_jabatan']; ?>" required>

    <label>Deskripsi Jabatan</label>
    <textarea name="desk" rows="3"><?= $d['deskripsi']; ?></textarea>

    <div style="margin-top:15px; display:flex; gap:10px;">
      <button type="submit" name="update">💾 Update</button>
      <a href="jabatan.php" class="btn" style="background:var(--oranye)">⬅ Kembali</a>
    </div>
  </form>
</div>

<div class="footer">
  <p>&copy; 2025 Karang Taruna Desa Karangrejo</p>
</div>

</body>
</html>
