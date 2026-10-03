<?php
require 'db.php';

$name = $_POST['name'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$category = $_POST['category'];

$sql = "insert into products 
        (name,price,quantity, category) 
        Values (?,?,?,?)";

    $stmt = $conn -> prepare($sql);
    $stmt -> bind_param("sdis", $name, $price, $quantity, $category);

    

     if($stmt -> execute()){
        echo "product saved succesfully , test";
     } else {
        echo"Error". $stmt->error;
     }
// if($conn -> query($sql) === true){
//     echo "product saved succesfully";
// }else{
//     echo "Error :" . $conn->error;
// }

