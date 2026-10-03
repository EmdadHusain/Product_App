<?php
require 'db.php';
$sql = "SELECT * FROM products ORDER BY id DESC";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Product Management</title>
</head>

<body>

    <h1>Product Management</h1>

    <h2>Add New Product</h2>
    <form action="create_product.php" method="POST">
    <label for="name">Product Name:</label>
    <input type="text" id="name" name="name" required>

    <br><br>


        <label for="price"></label>
        <input type="number" id="price" name="price" step="0.01" required>
        <br><br>

        <label for="quantity">Quantity</label>
        <input type="number" id="quantity" name="quantity" min="0" required >

        <br><br>
        <label for="category">Category:</label>

        <select
            id="category"
            name="category"
            required
        >

            <option value="">Select Category</option>

            <option value="Mobile">
                Mobile
            </option>

            <option value="Laptop">
                Laptop
            </option>

            <option value="Accessories">
                Accessories
            </option>

        </select>

        <br><br>
         <button type="submit">
            Add Product
        </button>

    </form>
     <button type="submit">
            Add Product
        </button>
<hr>


    <h2>Products</h2>


    <table border="1" cellpadding="10">

        <thead>

            <tr>

                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Category</th>
                <th>Action</th>

            </tr>

        </thead>


        <tbody>

            <?php while( $product = $result -> fetch_assoc()): ?>

                <tr>

                    <td>
                        <?= $product['id'] ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($product['name']) ?>
                    </td>

                    <td>
                        <?= $product['price'] ?>
                    </td>

                    <td>
                        <?= $product['quantity'] ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($product['category']) ?>
                    </td>

                    <td>

                        <a href="edit_product.php?id=<?= $product['id'] ?>">
                            Edit
                        </a>

                        |

                        <a href="delete_product.php?id=<?= $product['id'] ?>"
                           onclick="return confirm('Are you sure you want to delete this product?');">

                            Delete

                        </a>

                    </td>

                </tr>

            <?php endwhile; ?>

        </tbody>

    </table>

</body>

</html>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Product</title>
</head>

<body>

    <h1>Add Product</h1>

    <form action="save_product.php" method="POST">

        <label for="name">Product Name:</label>
        <input
            type="text"
            id="name"
            name="name"
            required
        >

        <br><br>

        <label for="price">Price:</label>
        <input
            type="number"
            id="price"
            name="price"
            step="0.01"
            required
        >

        <br><br>

        <label for="quantity">Quantity:</label>
        <input
            type="number"
            id="quantity"
            name="quantity"
            required
        >

        <br><br>

        <label for="category">Category:</label>

        <select id="category" name="category" required>
            <option value="">Select Category</option>
            <option value="Mobile">Mobile</option>
            <option value="Laptop">Laptop</option>
            <option value="Accessories">Accessories</option>
        </select>

        <br><br>

        <button type="submit">
            Save Product
        </button>

    </form>

</body>
</html> -->