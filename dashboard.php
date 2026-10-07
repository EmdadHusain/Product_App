<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location:login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Dashboard</title>

</head>

<body>

    <h1>Welcome!</h1>
    <p>Username: <?= htmlspecialchars($_SESSION['username'] ?? '') ?></p>

    <p>Email: <?= htmlspecialchars($_SESSION['email'] ?? '') ?></p>

    <a href="users.php">View Users</a>
    <br><br>

    <a href="logout.php">Logout</a>

    <body>
</html>


