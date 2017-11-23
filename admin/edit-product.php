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
        <!--  edit spec  -->
        <?php
        $ing = $row['specification'];
        $pieces = explode("|", $ing);
        for ($i = 0; $i < count($pieces); $i++) { ?>
            <div class="form-group">
                <label class="col-sm-3 control-label">
                    <?php if ($i == 0)
                        echo "specification"; ?>
                    </label>


                <div class="col-sm-9">
                    <div class="input-group control-group after-add-more<?php if ($i != 0) echo "1" ?>">
                        <input type="text" name="ingre[]" value="<?= $pieces[$i] ?>" class="form-control"
                               placeholder="720p display">
                        <div class="input-group-btn">
                            <?php if ($i == 0) { ?>
                                <button class="btn btn-success add-more" type="button"><i
                                            class="glyphicon glyphicon-plus"></i>
                                    Add
                                </button>
                            <?php } else { ?>
                                <button class="btn btn-danger remove" type="button"><i
                                            class="glyphicon glyphicon-remove"></i>
                                    Remove
                                </button>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="copy-fields hide">
            <div class="control-group input-group" style="margin-top:10px">
                <input type="text" name="ingre[]" class="form-control" placeholder="720p display">
                <div class="input-group-btn">
                    <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i>
                        Remove
                    </button>
                </div>
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