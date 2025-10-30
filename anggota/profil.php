<?php
session_start();
include "../config/koneksi.php";
if ($_SESSION['level'] != 'anggota') header("location:../login.php");

$user = $_SESSION['nama'];
$q = mysqli_query($koneksi, "SELECT * FROM anggota WHERE nama='$user'");
$d = mysqli_fetch_array($q);

if (isset($_POST['update'])) {
    mysqli_query($koneksi, "UPDATE anggota SET 
        tempat_lahir='$_POST[tempat]',
        tanggal_lahir='$_POST[tgl]',
        jenis_kelamin='$_POST[jk]',
        alamat='$_POST[alamat]',
        no_hp='$_POST[hp]'
        WHERE nama='$user'");
    echo "<script>alert('✅ Profil berhasil diperbarui!');location='profil.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Profil Saya - Karang Taruna</title>
  <link rel="stylesheet" href="../style.css">
</head>
<body>

<header>
  <h1>Profil Anggota Karang Taruna</h1>
</header>

<div class="container" style="max-width:600px;">
  <h2>Data Diri Saya</h2>
  <p style="color: var(--abu-tua);">Perbarui informasi pribadi Anda di bawah ini.</p>
  <hr>

  <form method="POST">
    <label>Nama Lengkap</label>
    <input type="text" value="<?= $d['nama']; ?>" disabled>

    <label>Tempat Lahir</label>
    <input type="text" name="tempat" value="<?= $d['tempat_lahir']; ?>" required>

    <label>Tanggal Lahir</label>
    <input type="date" name="tgl" value="<?= $d['tanggal_lahir']; ?>" required>

    <label>Jenis Kelamin</label>
    <select name="jk" required>
      <option value="L" <?= $d['jenis_kelamin'] == 'L' ? 'selected' : ''; ?>>Laki-laki</option>
      <option value="P" <?= $d['jenis_kelamin'] == 'P' ? 'selected' : ''; ?>>Perempuan</option>
    </select>

    <label>Alamat</label>
    <textarea name="alamat" rows="3" required><?= $d['alamat']; ?></textarea>

    <label>No HP</label>
    <input type="text" name="hp" value="<?= $d['no_hp']; ?>" required>

    <div style="margin-top:15px; display:flex; gap:10px;">
      <button type="submit" name="update">💾 Update Profil</button>
      <a href="dashboard.php" class="btn" style="background:var(--oranye)">⬅ Kembali</a>
    </div>
  </form>
</div>

<div class="footer">
  <p>&copy; 2025 Karang Taruna Desa Karangrejo</p>
</div>

</body>
</html>
