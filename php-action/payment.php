<?php
include_once '../dbconfig.php';
session_start();
$cu_id = $_SESSION["cu_id"];

if(isset($_POST['remem'])) {
	$address = $_POST['address'];
	$query = "UPDATE customer SET address='$address' WHERE cu_id = $cu_id";

	if ($connect->query($query) === FALSE)
	    echo "Error updating record: " . $connect->error;
}

$query = "SELECT * FROM cart WHERE cu_id = $cu_id";
$result = mysqli_query($connect, $query);

while ($row = mysqli_fetch_array($result)) {
    $product_id = $row['product_id'];
    $qty = $row['quantity'];
    $query = "INSERT INTO orders(cu_id, product_id, orderDate, quantity) 
                VALUES ($cu_id, $product_id, now(), $qty)";

    if ($connect->query($query) === FALSE)
        echo "failed!";
}

$query = "DELETE FROM cart WHERE cu_id = $cu_id";
if ($connect->query($query) === FALSE)
    echo "failed!";

$connect->close();
header('Location: '. "../product.php");