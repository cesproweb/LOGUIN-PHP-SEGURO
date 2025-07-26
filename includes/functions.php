<?php
session_start();
require_once 'db.php';

function getUserByUsername($username) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
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
?>