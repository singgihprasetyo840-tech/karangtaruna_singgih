<?php
session_start();
include "config/koneksi.php";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $q = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
    $d = mysqli_fetch_array($q);

    if ($d) {
        $_SESSION['username'] = $d['username'];
        $_SESSION['nama'] = $d['nama'];
        $_SESSION['level'] = $d['level'];
        header("location:" . ($d['level'] == 'admin' ? "admin/dashboard.php" : "anggota/dashboard.php"));
    } else {
        echo "<script>alert('Username atau Password salah!');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login Karang Taruna</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
  <h1>Login Sistem Karang Taruna</h1>
</header>

<div class="container" style="max-width:400px;">
  <h2 align="center">Masuk Akun</h2>
  <form method="POST">
    <label>Username</label>
    <input type="text" name="username" required>

    <label>Password</label>
    <input type="password" name="password" required>

    <button type="submit" name="login">Login</button>
  </form>
  <p align="center">Belum punya akun? <a href="register.php">Daftar di sini</a></p>
</div>

<div class="footer">
  <p>&copy; 2025 Karang Taruna</p>
</div>
</body>
</html>
