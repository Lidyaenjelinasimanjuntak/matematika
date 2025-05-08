<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$role = $_SESSION['user']['role'];
$username = $_SESSION['user']['username'];
?>

<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Dashboard</h1>
  <p>Halo, <?= $username ?>! Anda login sebagai <strong><?= $role ?></strong>.</p>

  <h3>Profil Diri</h3>
  <textarea rows="5" cols="60">Nama: Rahmat Prasetya
Hobi: Coding, Fotografi, Menulis
Cita-cita: Pengembang Web Profesional</textarea>

  <?php if ($role === 'admin' || $role === 'superclass'): ?>
    <h3>Catatan Publik</h3>
    <textarea rows="3" cols="60">Ini adalah catatan yang dapat diedit oleh admin dan superclass.</textarea>
  <?php endif; ?>

  <?php if ($role === 'superclass'): ?>
    <h3>Konten Eksklusif</h3>
    <textarea rows="3" cols="60">Konten ini hanya dapat diedit oleh Superclass.</textarea>
  <?php endif; ?>

  <br><br>
  <a href="logout.php">Logout</a>
</body>
</html>
