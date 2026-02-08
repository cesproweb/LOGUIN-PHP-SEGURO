<?php
session_start();
require_once 'includes/functions.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'];
$msg = "";

// Crear usuario
if (isset($_POST['accion']) && $_POST['accion'] === 'crear') {
    $msg = createUser($_POST['nuevo_usuario'], $_POST['nuevo_password'], $_POST['nuevo_role']);
}

// Cambiar contraseña
if (isset($_POST['accion']) && $_POST['accion'] === 'cambiar_pass') {
    changePassword($_POST['user_id'], $_POST['new_pass']);
    $msg = "Contraseña cambiada correctamente.";
}

// Forzar logout
if (isset($_POST['accion']) && $_POST['accion'] === 'logout') {
    forceLogout($_POST['logout_id']);
    $msg = "Usuario desconectado.";
}

// Desbloquear usuario
if (isset($_POST['unlock_id'])) {
    unlockUser($_POST['unlock_id']);
    $msg = "Usuario desbloqueado correctamente.";
}

global $pdo;
$lockedUsers = getLockedUsers();
$onlineUsers = $pdo->query("SELECT id, username FROM users WHERE logged_in = 1")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administración</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <nav class="navbar">
        <div class="logo">LoginSeguro</div>
        <ul class="menu">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="admin.php">Admin</a></li>
            <li><a href="logout.php">Cerrar sesión</a></li>
        </ul>
    </nav>

    <div class="admin-container">
        <h2>Panel de Administración</h2>
        <p class="admin-user">Conectado como <strong><?= htmlspecialchars($username) ?></strong> (admin)</p>

        <?php if (!empty($msg)): ?>
            <p class="success"><?= htmlspecialchars($msg) ?></p>
        <?php endif; ?>

        <div class="admin-grid">

            <section class="admin-card">
                <h3>Crear nuevo usuario</h3>
                <form method="POST">
                    <input type="hidden" name="accion" value="crear">
                    <input type="text" name="nuevo_usuario" placeholder="Usuario" required>
                    <input type="password" name="nuevo_password" placeholder="Contraseña" required>

                    <select name="nuevo_role" required>
                        <option value="user">Usuario</option>
                        <option value="admin">Administrador</option>
                    </select>

                    <button type="submit">Crear usuario</button>
                </form>
            </section>

            <section class="admin-card">
                <h3>Cambiar contraseña</h3>
                <form method="POST">
                    <input type="hidden" name="accion" value="cambiar_pass">
                    <input type="number" name="user_id" placeholder="ID del usuario" required>
                    <input type="password" name="new_pass" placeholder="Nueva contraseña" required>
                    <button type="submit">Cambiar contraseña</button>
                </form>
            </section>

            <section class="admin-card">
                <h3>Usuarios bloqueados</h3>
                <?php if (empty($lockedUsers)): ?>
                    <p>No hay usuarios bloqueados.</p>
                <?php else: ?>
                    <table class="admin-table">
                        <tr>
                            <th>Usuario</th>
                            <th>Intentos</th>
                            <th>Acción</th>
                        </tr>
                        <?php foreach ($lockedUsers as $u): ?>
                        <tr>
                            <td><?= htmlspecialchars($u['username']) ?></td>
                            <td><?= (int)$u['attempts'] ?></td>
                            <td>
                                <form method="POST">
                                    <input type="hidden" name="unlock_id" value="<?= (int)$u['id'] ?>">
                                    <button type="submit">Desbloquear</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                <?php endif; ?>
            </section>

            <section class="admin-card">
                <h3>Usuarios conectados</h3>
                <?php if (empty($onlineUsers)): ?>
                    <p>No hay usuarios conectados.</p>
                <?php else: ?>
                    <table class="admin-table">
                        <tr>
                            <th>Usuario</th>
                            <th>Acción</th>
                        </tr>
                        <?php foreach ($onlineUsers as $u): ?>
                        <tr>
                            <td><?= htmlspecialchars($u['username']) ?></td>
                            <td>
                                <form method="POST">
                                    <input type="hidden" name="accion" value="logout">
                                    <input type="hidden" name="logout_id" value="<?= (int)$u['id'] ?>">
                                    <button type="submit">Forzar logout</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                <?php endif; ?>
            </section>

        </div>
    </div>
</body>
</html>
