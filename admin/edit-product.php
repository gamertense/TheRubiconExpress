<html lang="en">
<body>
<?php
require_once('navbar.php');
include_once '../dbconfig.php';

$productID = $_GET['id'];
$query = "SELECT * FROM product where product_id = $productID";
$result = mysqli_query($connect, $query);

if (mysqli_num_rows($result) > 0)
    $row = $result->fetch_array();
?>

<div class="container">
    <form id="uploadimage" action="php-action/editProductSQL.php" method="post" class="form-horizontal" role="form">
        <div class="form-group">
            <label class="col-sm-3 control-label">Product Name</label>
            <div class="col-sm-9">
                <input value="<?= $row['name'] ?>" name="productName" placeholder="Product Name" class="form-control" autofocus disabled>
                <span class="help-block">For example, iPhone X</span>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Price</label>
            <div class="col-sm-9">
                <input value="<?= $row['price'] ?>" name="productPrice" placeholder="Price" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Image File</label>
            <div class="col-sm-9 col-sm-offset-3">
                <div id="image_preview"><img height="250" id="previewing" src="<?= '../' . $row['image'] ?>"></div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-9 col-sm-offset-3">
                <button type="submit" class="btn btn-primary btn-block">Edit Product</button>
            </div>
        </div>
        <input type="hidden" name="productID" value="<?= $row['product_id'] ?>">
    </form> <!-- /form -->
</div> <!-- ./container -->

</body>
</html>