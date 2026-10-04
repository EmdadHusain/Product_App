<?php
require 'db.php';

$name = $_POST['name'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$category = $_POST['category'];

$sql = "INSERT INTO products
        (name, price, quantity, category)
        VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

$stmt->bind_param('sdis', $name, $price, $quantity, $category);

$stmt->execute();

header('Location: index.php');

exit();
