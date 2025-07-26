<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/style.css">
  <title>Dashboard</title>
</head>
<body>
  <nav class="navbar">
    <div class="menu">
      <span class="user">👤 <?= $_SESSION['user'] ?></span>
      <a href="logout.php" class="logout">🔓 Cerrar sesión</a>
    </div>
  </nav>
  <div class="content">
    <h1>Bienvenido, <?= $_SESSION['user'] ?>!</h1>
  </div>
</body>
</html>