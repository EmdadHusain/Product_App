<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Please submit the signup form.');
}

$username = trim($_POST['username'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

if ($username === '' || $email === '' || $password === '') {
    http_response_code(400);
    exit('Username, email, and password are required.');
}

$hashed_pass = password_hash($password, PASSWORD_DEFAULT);

$sql = 'insert into users (username, email, password) values (?,?,?)';

$stmt = $conn->prepare($sql);
if (!$stmt) {
    error_log('Signup statement preparation failed: ' . $conn->error);
    http_response_code(500);
    exit('Unable to create the account. Please try again.');
}

$stmt->bind_param('sss', $username, $email, $hashed_pass);

if ($stmt->execute()) {
    header('Location:users.php');
    exit();
} else {
    error_log('Signup insert failed: ' . $stmt->error);
    http_response_code(500);
    exit('Unable to create the account. Please try again.');
}
