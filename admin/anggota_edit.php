<?php
session_start();
include "../config/koneksi.php";
if ($_SESSION['level'] != 'admin') header("location:../login.php");

$id = $_GET['id'];
$q = mysqli_query($koneksi, "SELECT * FROM anggota WHERE id='$id'");
$d = mysqli_fetch_array($q);

if(isset($_POST['update'])){
    mysqli_query($koneksi,"UPDATE anggota SET 
        nik='$_POST[nik]',
        nama='$_POST[nama]',
        tempat_lahir='$_POST[tempat]',
        tanggal_lahir='$_POST[tgl]',
        jenis_kelamin='$_POST[jk]',
        alamat='$_POST[alamat]',
        no_hp='$_POST[hp]',
        jabatan_id='$_POST[jabatan]'
        WHERE id='$id'");
    header("location:anggota.php");
}
?>

<html><body>
<h2>Edit Anggota</h2>
<form method="POST">
    NIK:<br><input type="text" name="nik" value="<?= $d['nik']; ?>"><br>
    Nama:<br><input type="text" name="nama" value="<?= $d['nama']; ?>"><br>
    Tempat Lahir:<br><input type="text" name="tempat" value="<?= $d['tempat_lahir']; ?>"><br>
    Tanggal Lahir:<br><input type="date" name="tgl" value="<?= $d['tanggal_lahir']; ?>"><br>
    Jenis Kelamin:<br>
    <select name="jk">
        <option value="L" <?= $d['jenis_kelamin']=='L'?'selected':''; ?>>Laki-laki</option>
        <option value="P" <?= $d['jenis_kelamin']=='P'?'selected':''; ?>>Perempuan</option>
    </select><br>
    Alamat:<br><textarea name="alamat"><?= $d['alamat']; ?></textarea><br>
    No HP:<br><input type="text" name="hp" value="<?= $d['no_hp']; ?>"><br>
    Jabatan:<br>
    <select name="jabatan">
        <?php
        $q2 = mysqli_query($koneksi, "SELECT * FROM jabatan");
        while($j = mysqli_fetch_array($q2)){
            $sel = $j['id']==$d['jabatan_id'] ? 'selected' : '';
            echo "<option value='$j[id]' $sel>$j[nama_jabatan]</option>";
        }
        ?>
    </select><br><br>
    <input type="submit" name="update" value="Update">
</form>
<a href="anggota.php">Kembali</a>
</body></html>
