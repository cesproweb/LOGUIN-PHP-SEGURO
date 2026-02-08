<?php
session_start();
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

    global $pdo;
    $pdo->prepare("UPDATE users SET logged_in = 1 WHERE username = ?")->execute([$username]);

    $_SESSION['user_id']  = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['role']     = $user['role'];

    header("Location: dashboard.php");
    exit;

} else {

    incrementAttempts($username);
    $attempts = $user['attempts'] + 1;

    if ($attempts >= 5) {
        lockAccount($username);
        $_SESSION['error'] = "Cuenta bloqueada.";
    } elseif ($attempts == 4) {
        $_SESSION['error'] = "Atención: último intento antes del bloqueo.";
    } else {
        $_SESSION['error'] = "Contraseña incorrecta.";
    }

    header("Location: login.php");
    exit;
}
