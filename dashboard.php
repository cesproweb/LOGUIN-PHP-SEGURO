<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$username = trim($_SESSION['username']);
$role     = trim($_SESSION['role'] ?? '');
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
    <div class="logo">LoginSeguro</div>
    <ul class="menu">
      <li><a href="dashboard.php">Inicio</a></li>
      <?php if ($role === 'admin'): ?>
        <li><a href="admin.php">Panel admin</a></li>
      <?php endif; ?>
      <li><a href="logout.php">Cerrar sesión</a></li>
    </ul>
  </nav>

  <div class="content">
    <h1>Bienvenido, <?= htmlspecialchars($username) ?>!</h1>

    <?php if ($role === 'admin'): ?>
      <p>Tienes rol <strong>administrador</strong>. Puedes gestionar usuarios desde el panel de administración.</p>
    <?php else: ?>
      <p>Tienes rol <strong>usuario</strong>. No tienes acceso al panel de administración.</p>
    <?php endif; ?>
  </div>
</body>
</html>
