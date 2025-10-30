<?php
include "config/koneksi.php";

if (isset($_POST['daftar'])) {
    $username = trim($_POST['username']);
    $password = md5($_POST['password']);
    $nama = $_POST['nama'];
    $nik = $_POST['nik'];
    $tempat = $_POST['tempat'];
    $tgl = $_POST['tgl'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['hp'];

    $cekUser = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");
    if (mysqli_num_rows($cekUser) > 0) {
        echo "<script>alert('❌ Username sudah digunakan!');history.back();</script>";
        exit;
    }

    $cekNik = mysqli_query($koneksi, "SELECT * FROM anggota WHERE nik='$nik'");
    if (mysqli_num_rows($cekNik) > 0) {
        echo "<script>alert('❌ NIK sudah terdaftar!');history.back();</script>";
        exit;
    }

    mysqli_query($koneksi, "INSERT INTO user (username, password, nama, level)
                            VALUES ('$username', '$password', '$nama', 'anggota')");

    $qjab = mysqli_query($koneksi, "SELECT id FROM jabatan WHERE nama_jabatan='Anggota' LIMIT 1");
    if (mysqli_num_rows($qjab) == 0) {
        mysqli_query($koneksi, "INSERT INTO jabatan (nama_jabatan, deskripsi) VALUES ('Anggota', 'Anggota biasa')");
        $jabatan_id = mysqli_insert_id($koneksi);
    } else {
        $jab = mysqli_fetch_array($qjab);
        $jabatan_id = $jab['id'];
    }

    mysqli_query($koneksi, "INSERT INTO anggota 
        (nik, nama, tempat_lahir, tanggal_lahir, jenis_kelamin, alamat, no_hp, jabatan_id)
        VALUES ('$nik','$nama','$tempat','$tgl','$jk','$alamat','$no_hp','$jabatan_id')");

    echo "<script>alert('✅ Pendaftaran berhasil! Silakan login.');window.location='login.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Pendaftaran Anggota</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
  <h1>Form Pendaftaran Anggota Karang Taruna</h1>
</header>

<div class="container" style="max-width:500px;">
  <form method="POST">
    <label>Username</label>
    <input type="text" name="username" required>

    <label>Password</label>
    <input type="password" name="password" required>

    <label>NIK</label>
    <input type="text" name="nik" required>

    <label>Nama Lengkap</label>
    <input type="text" name="nama" required>

    <label>Tempat Lahir</label>
    <input type="text" name="tempat" required>

    <label>Tanggal Lahir</label>
    <input type="date" name="tgl" required>

    <label>Jenis Kelamin</label>
    <select name="jk">
      <option value="L">Laki-laki</option>
      <option value="P">Perempuan</option>
    </select>

    <label>Alamat</label>
    <textarea name="alamat" required></textarea>

    <label>No HP</label>
    <input type="text" name="hp" required>

    <button type="submit" name="daftar">Daftar</button>
  </form>

  <p align="center">Sudah punya akun? <a href="login.php">Login di sini</a></p>
</div>

<div class="footer">
  <p>&copy; 2025 Karang Taruna Desa Karangrejo</p>
</div>
</body>
</html>
