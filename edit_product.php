<?php
require 'db.php';

$id = $_GET['id'];

$sql = 'SELECT * FROM products WHERE id=?';

$stmt = $conn->prepare($sql);

$stmt->bind_param('i', $id);

$stmt->execute();

$result = $stmt->get_result();

$product = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>Edit Product</title>

</head>

<body>

    <h1>Edit Product</h1>
    <form action="update_product.php" method="POST">

    <input type="hidden" name="id" value="<?= $product['id'] ?>">

    <label for="name"></label>
     <input
            type="text"
            id="name"
            name="name"
            value="<?= htmlspecialchars($product['name']) ?>"
            required
        >

        <br><br>

        <label for="price"></label>
        <input type="number" id="price" name="price" step="0.01" value="<?= $product['price'] ?>" required>

          <br><br>

          <label for="quantity">
            Quantity:
        </label>

        <input
            type="number"
            id="quantity"
            name="quantity"
            value="<?= $product['quantity'] ?>"
            required
        >

        <br><br>

        <label for="category">
            Category:
        </label>
    <select name="category" id="category">

    <option value="Mobile"  <?= $product['category'] === 'Mobile' ? 'selected' : '' ?>>
                Mobile
    </option>

    <option value="laptop" <?= $product['category'] === 'Laptop' ? 'selected' : '' ?> >
        Laptop
    </option>
    <option value="Accessories"
                <?= $product['category'] === 'Accessories' ? 'selected' : '' ?>>
                Accessories
            </option>

        </select>
          <br><br>


        <button type="submit">
            Update Product
        </button>

    </form>

     <br>

    <a href="index.php">
        Back to Products
    </a>


</body>

</html>
