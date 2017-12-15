<?php
include_once '../../dbconfig.php';

$id = $_POST['productID'];
$productPrice = $_POST['productPrice'];
$catID = $_POST['category'];
$specArray = $_POST['spec'];
array_pop($specArray);
$spec = implode("|", $specArray);

try {
    $stmt = $connect->prepare("UPDATE product SET category_id = $catID, price = $productPrice, specification = '$spec' WHERE product_id = $id");

    if ($stmt->execute()) {
        echo "Successfully updated!";
        header( "location: ../editProductList.php" );
    } else {
        echo "Query Problem";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}