<?php
require 'db.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1],
]);

if ($id === false || $id === null) {
    http_response_code(400);
    exit('Invalid product ID.');
}

$sql = 'DELETE FROM products WHERE id = ?';
$stmt = $conn->prepare($sql);

if (!$stmt) {
    error_log('Failed to prepare product deletion: ' . $conn->error);
    http_response_code(500);
    exit('Could not delete the product. Please try again later.');
}

if (!$stmt->bind_param('i', $id)) {
    error_log('Failed to bind product ID for deletion: ' . $stmt->error);
    http_response_code(500);
    exit('Could not delete the product. Please try again later.');
}

if (!$stmt->execute()) {
    error_log('Failed to delete product: ' . $stmt->error);
    http_response_code(500);
    exit('Could not delete the product. Please try again later.');
}

if ($stmt->affected_rows === 0) {
    http_response_code(404);
    exit('Product not found. It may have already been deleted.');
}

header('Location: index.php');
exit();
