<?php
$host = "localhost";
$user = 'root';
$password = "";
$database = "shop_db";

$conn = new mysqli( $host, $user, $password, $database, 3307);

if($conn->connect_error){
    die("database connection filed".$conn->connect_error);
    
}
