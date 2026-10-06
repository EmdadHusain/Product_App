<?php
require 'db.php';

$sql = 'select id, username, email from users order by id desc';

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>User List</title>
</head>
<body>

<h1>User List</h1>
    <a href="signup.php">Add New User</a>

     <br><br>


    <table border="1" cellpadding="10">

        <thead>

            <tr>

                <th>ID</th>

                <th>Username</th>

                <th>Email</th>

            </tr>

        </thead>


        <tbody>
            <?php while ($user = $result->fetch_assoc()): ?>
                 <tr>

                    <td>
                        <!-- <?= $user['id'] ?> -->
                         <?= $user['id'] ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($user['username']) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($user['email']) ?>
                    </td>

                </tr>

            <?php endwhile; ?>

        </tbody>

    </table>


    
</body>
</html>
