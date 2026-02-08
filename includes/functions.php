<?php
require_once __DIR__ . '/db.php';

function getUserByUsername($username) {
    global $pdo;
    $stmt = $pdo->prepare("
        SELECT id, username, password, role, attempts, locked, logged_in
        FROM users
        WHERE username = ?
    ");
    $stmt->execute([$username]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function resetAttempts($username) {
    global $pdo;
    $pdo->prepare("UPDATE users SET attempts = 0 WHERE username = ?")->execute([$username]);
}

function incrementAttempts($username) {
    global $pdo;
    $pdo->prepare("UPDATE users SET attempts = attempts + 1 WHERE username = ?")->execute([$username]);
}

function lockAccount($username) {
    global $pdo;
    $pdo->prepare("UPDATE users SET locked = 1 WHERE username = ?")->execute([$username]);
}

function getLockedUsers() {
    global $pdo;
    $stmt = $pdo->query("SELECT id, username, attempts FROM users WHERE locked = 1");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function unlockUser($id) {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE users SET locked = 0, attempts = 0 WHERE id = ?");
    $stmt->execute([$id]);
}

function createUser($username, $password, $role) {
    global $pdo;

    $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->execute([$username]);

    if ($stmt->fetch()) {
        return "El usuario ya existe.";
    }

    $hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
    $stmt->execute([$username, $hash, $role]);

    return "Usuario creado correctamente.";
}

function changePassword($id, $newPassword) {
    global $pdo;
    $hash = password_hash($newPassword, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("UPDATE users SET password = ? WHERE id = ?");
    $stmt->execute([$hash, $id]);
}

function forceLogout($id) {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE users SET logged_in = 0 WHERE id = ?");
    $stmt->execute([$id]);
}
