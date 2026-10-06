<?php
require 'db.php';

$username = trim($_POST['username'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

$hashed_pass = password_hash($password, PASSWORD_DEFAULT);

$sql = 'insert into users (username, email, password) values (?,?,?)';

$stmt = $conn->prepare($sql);

$stmt->bind_param('sss', $username, $email, $hashed_pass);

if ($stmt->execute()) {
    header('Location:index.php');
    exit();
} else {
    echo 'Error occurred while signing up.';
    $stmt->error;
    exit();
}
