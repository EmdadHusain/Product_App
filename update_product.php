<?php
require 'db.php';

$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$category = $_POST['category'];

$sql = 'update products set name = ? , price = ?, quantity = ?, category= ? where id = ? ';

$stmt = $conn->prepare($sql);
$stmt->bind_param('sdisi', $name, $price, $quantity, $category, $id);

if ($stmt->execute()) {
    header('Location:index.php');
    exit();
}
error_log('product update failed : ' . $stmt->error);
http_response_code(500);
echo 'Product update failed. Please try again later.';
