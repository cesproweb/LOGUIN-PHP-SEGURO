<?php
require_once 'includes/functions.php';

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

$user = getUserByUsername($username);

if (!$user) {
    $_SESSION['error'] = "Usuario o contraseña incorrectos.";
    header("Location: login.php");
    exit;
}

if ($user['locked']) {
    $_SESSION['error'] = "Cuenta bloqueada.";
    header("Location: login.php");
    exit;
}

if (password_verify($password, $user['password'])) {
    resetAttempts($username);
    $_SESSION['user'] = $user['username'];
    header("Location: dashboard.php");
} else {
    incrementAttempts($username);
    $attempts = $user['attempts'] + 1;

    if ($attempts >= 5) {
        lockAccount($username);
        $_SESSION['error'] = "Cuenta bloqueada.";
    } elseif ($attempts == 4) {
        $_SESSION['error'] = "Atención: Último intento antes del bloqueo.";
    } else {
        $_SESSION['error'] = "Contraseña incorrecta.";
    }

    header("Location: login.php");
}
?>