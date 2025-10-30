<?php
session_start();
include "../config/koneksi.php";
if ($_SESSION['level'] != 'admin') header("location:../login.php");

if (isset($_POST['simpan'])) {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $tempat = $_POST['tempat'];
    $tgl = $_POST['tgl'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $hp = $_POST['hp'];
    $jab = $_POST['jabatan'];

    mysqli_query($koneksi, "INSERT INTO anggota VALUES('', '$nik', '$nama', '$tempat', '$tgl', '$jk', '$alamat', '$hp', '$jab')");
    header("location:anggota.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Anggota - Karang Taruna</title>
  <link rel="stylesheet" href="../style.css">
</head>
<body>

<header>
  <h1>Tambah Data Anggota</h1>
</header>

<div class="container" style="max-width:600px;">
  <form method="POST">
    <label>NIK</label>
    <input type="text" name="nik" placeholder="Masukkan NIK Anggota" required>

    <label>Nama Lengkap</label>
    <input type="text" name="nama" placeholder="Masukkan Nama Lengkap" required>

    <label>Tempat Lahir</label>
    <input type="text" name="tempat" placeholder="Contoh: Semarang" required>

    <label>Tanggal Lahir</label>
    <input type="date" name="tgl" required>

    <label>Jenis Kelamin</label>
    <select name="jk">
      <option value="L">Laki-laki</option>
      <option value="P">Perempuan</option>
    </select>

    <label>Alamat</label>
    <textarea name="alamat" rows="3" placeholder="Masukkan alamat lengkap..."></textarea>

    <label>No HP</label>
    <input type="text" name="hp" placeholder="08xxxxxxxxxx">

    <label>Jabatan</label>
    <select name="jabatan" required>
      <option value="">-- Pilih Jabatan --</option>
      <?php
      $q = mysqli_query($koneksi, "SELECT * FROM jabatan ORDER BY nama_jabatan ASC");
      while ($j = mysqli_fetch_array($q)) {
          echo "<option value='$j[id]'>$j[nama_jabatan]</option>";
      }
      ?>
    </select>

    <div style="margin-top:15px; display:flex; gap:10px;">
      <button type="submit" name="simpan">💾 Simpan Data</button>
      <a href="anggota.php" class="btn" style="background:var(--oranye)">⬅ Kembali</a>
    </div>
  </form>
</div>

<div class="footer">
  <p>&copy; 2025 Karang Taruna Desa Karangrejo</p>
</div>
</body>
</html>
