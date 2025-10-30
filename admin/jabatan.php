<?php
session_start();
include "../config/koneksi.php";
if ($_SESSION['level'] != 'admin') header("location:../login.php");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Jabatan - Karang Taruna</title>
  <link rel="stylesheet" href="../style.css">
</head>
<body>

<header>
  <h1>Data Jabatan Karang Taruna</h1>
</header>

<div class="container">
  <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap;">
    <h2>Daftar Jabatan</h2>
    <div>
      <a href="dashboard.php" class="btn">🏠 Kembali</a>
      <a href="jabatan_tambah.php" class="btn" style="background:var(--oranye)">➕ Tambah Jabatan</a>
    </div>
  </div>
  <hr>

  <table class="table">
    <tr>
      <th>No</th>
      <th>Nama Jabatan</th>
      <th>Deskripsi</th>
      <th>Aksi</th>
    </tr>
    <?php
    $no = 1;
    $q = mysqli_query($koneksi, "SELECT * FROM jabatan ORDER BY nama_jabatan ASC");
    while ($d = mysqli_fetch_array($q)):
    ?>
    <tr>
      <td><?= $no++; ?></td>
      <td><?= $d['nama_jabatan']; ?></td>
      <td><?= $d['deskripsi']; ?></td>
      <td>
        <a href="jabatan_edit.php?id=<?= $d['id']; ?>">✏️ Edit</a> |
        <a href="jabatan_hapus.php?id=<?= $d['id']; ?>" onclick="return confirm('Yakin ingin menghapus jabatan ini?')">🗑 Hapus</a>
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
