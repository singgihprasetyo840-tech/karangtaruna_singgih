<?php
session_start();
include "../config/koneksi.php";
if ($_SESSION['level'] != 'admin') header("location:../login.php");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Anggota - Karang Taruna</title>
  <link rel="stylesheet" href="../style.css">
</head>
<body>

<header>
  <h1>Data Anggota Karang Taruna</h1>
</header>

<div class="container">
  <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap;">
    <h2>Daftar Anggota</h2>
    <div>
      <a href="dashboard.php" class="btn">🏠 Kembali</a>
      <a href="anggota_tambah.php" class="btn" style="background:var(--oranye)">➕ Tambah Anggota</a>
    </div>
  </div>
  <hr>

  <table class="table">
    <tr>
      <th>No</th>
      <th>NIK</th>
      <th>Nama</th>
      <th>Tempat / Tanggal Lahir</th>
      <th>JK</th>
      <th>Alamat</th>
      <th>No HP</th>
      <th>Jabatan</th>
      <th>Aksi</th>
    </tr>
    <?php
    $no = 1;
    $q = mysqli_query($koneksi, "
      SELECT a.*, j.nama_jabatan 
      FROM anggota a 
      LEFT JOIN jabatan j ON a.jabatan_id = j.id 
      ORDER BY a.nama ASC
    ");
    while ($d = mysqli_fetch_array($q)):
    ?>
    <tr>
      <td><?= $no++; ?></td>
      <td><?= $d['nik']; ?></td>
      <td><?= $d['nama']; ?></td>
      <td><?= $d['tempat_lahir']; ?>, <?= $d['tanggal_lahir']; ?></td>
      <td><?= $d['jenis_kelamin']; ?></td>
      <td><?= $d['alamat']; ?></td>
      <td><?= $d['no_hp']; ?></td>
      <td><?= $d['nama_jabatan']; ?></td>
      <td>
        <a href="anggota_edit.php?id=<?= $d['id']; ?>">✏️ Edit</a> |
        <a href="anggota_hapus.php?id=<?= $d['id']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">🗑 Hapus</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </table>
</div>

<div class="footer">
  <p>&copy; 2025 Karang Taruna Desa Karangrejo</p>
</div>
</body>
</html>
