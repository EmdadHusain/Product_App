<?php
session_start();
require_once 'db.php';

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

$sql = 'select id, username, email , password from users where email = ?';

$stmt = $conn->prepare($sql);

$stmt->bind_param('s', $email);

$stmt->execute();

$result = $stmt->get_result();

$user = $result->fetch_assoc();

if ($user && password_verify($password, $user['password'])) {
    session_regenerate_id(true);
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['email'] = $user['email'];
    header('Location: dashboard.php');
    exit();
} else {
    echo ' invalid email or password';
}
