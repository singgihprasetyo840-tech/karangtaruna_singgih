<?php
session_start();
include "../config/koneksi.php";

// Pastikan hanya admin yang bisa mengakses
if (!isset($_SESSION['level']) || $_SESSION['level'] != 'admin') {
    header("location:../login.php");
    exit;
}

// Pastikan parameter id ada
if (!isset($_GET['id'])) {
    header("location:keuangan.php");
    exit;
}

$id = $_GET['id'];
$q = mysqli_query($koneksi, "SELECT * FROM keuangan WHERE id='$id'");
$d = mysqli_fetch_array($q);

// Jika data tidak ditemukan
if (!$d) {
    echo "<script>alert('Data tidak ditemukan!');window.location='keuangan.php';</script>";
    exit;
}

// Jika tombol update ditekan
if (isset($_POST['update'])) {
    $tgl = $_POST['tgl'];
    $jenis = $_POST['jenis'];
    $ket = $_POST['ket'];
    $jumlah = $_POST['jumlah'];

    // Update data ke database
    $update = mysqli_query($koneksi, "UPDATE keuangan SET 
        tanggal='$tgl',
        jenis='$jenis',
        keterangan='$ket',
        jumlah='$jumlah'
        WHERE id='$id'");

    if ($update) {
        echo "<script>alert('✅ Data transaksi berhasil diperbarui!');window.location='keuangan.php';</script>";
    } else {
        echo "<script>alert('❌ Gagal memperbarui data!');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Transaksi Keuangan</title>
  <link rel="stylesheet" href="../style.css">
</head>
<body>

<header>
  <h1>Edit Transaksi Keuangan</h1>
</header>

<div class="container" style="max-width:500px;">
  <form method="POST">
    <label for="tgl">Tanggal Transaksi</label>
    <input type="date" name="tgl" id="tgl" value="<?= $d['tanggal']; ?>" required>

    <label for="jenis">Jenis Transaksi</label>
    <select name="jenis" id="jenis" required>
      <option value="Masuk" <?= $d['jenis'] == 'Masuk' ? 'selected' : ''; ?>>Pemasukan</option>
      <option value="Keluar" <?= $d['jenis'] == 'Keluar' ? 'selected' : ''; ?>>Pengeluaran</option>
    </select>

    <label for="ket">Keterangan</label>
    <textarea name="ket" id="ket" rows="3" required><?= $d['keterangan']; ?></textarea>

    <label for="jumlah">Jumlah (Rp)</label>
    <input type="number" name="jumlah" id="jumlah" value="<?= $d['jumlah']; ?>" required>

    <div style="margin-top:15px; display:flex; gap:10px;">
      <button type="submit" name="update">💾 Update Data</button>
      <a href="keuangan.php" class="btn" style="background:var(--oranye)">⬅ Kembali</a>
    </div>
  </form>
</div>

<div class="footer">
  <p>&copy; 2025 Karang Taruna Desa Karangrejo</p>
</div>

</body>
</html>
