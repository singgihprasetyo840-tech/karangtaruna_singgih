<?php
session_start();
include "../config/koneksi.php";
if ($_SESSION['level'] != 'admin') header("location:../login.php");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Kegiatan - Karang Taruna</title>
  <link rel="stylesheet" href="../style.css">
</head>
<body>

<header>
  <h1>Data Kegiatan Karang Taruna</h1>
</header>

<div class="container">
  <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap;">
    <h2>Daftar Kegiatan</h2>
    <div>
      <a href="dashboard.php" class="btn">🏠 Kembali</a>
      <a href="kegiatan_tambah.php" class="btn" style="background:var(--oranye)">➕ Tambah Kegiatan</a>
    </div>
  </div>
  <hr>

  <table class="table">
    <tr>
      <th>No</th>
      <th>Nama Kegiatan</th>
      <th>Tempat</th>
      <th>Tanggal Mulai</th>
      <th>Tanggal Selesai</th>
      <th>Deskripsi</th>
      <th>Aksi</th>
    </tr>
    <?php
    $no = 1;
    $q = mysqli_query($koneksi, "SELECT * FROM kegiatan ORDER BY tanggal_mulai DESC");
    while ($d = mysqli_fetch_array($q)):
    ?>
    <tr>
      <td><?= $no++; ?></td>
      <td><?= $d['nama_kegiatan']; ?></td>
      <td><?= $d['tempat']; ?></td>
      <td><?= $d['tanggal_mulai']; ?></td>
      <td><?= $d['tanggal_selesai']; ?></td>
      <td><?= $d['deskripsi']; ?></td>
      <td>
        <a href="kegiatan_edit.php?id=<?= $d['id']; ?>">✏️ Edit</a> |
        <a href="kegiatan_hapus.php?id=<?= $d['id']; ?>" onclick="return confirm('Yakin ingin menghapus kegiatan ini?')">🗑 Hapus</a>
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
