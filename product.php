<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>The Rubicon Express</title>
</head>
<body>
<?php
require_once('menu.php');

if (isset($_POST['Register'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $query = "INSERT INTO customer (email, password, name,usertype) VALUES('$email', '$password', '$name','User')";
    $connect->query($query);
//    if ($connect->query($query) === TRUE)
//        echo "success";
}
?>
<script src="vendor/js/product.js"></script>
<div class="container" style="padding-bottom: 30px">
<?php
    if (isset($_GET['catID'])) {
        $categoryID = $_GET['catID'];
        $query = "SELECT * FROM product WHERE category_id = $categoryID";
        $query2 = "SELECT * FROM category WHERE category_id = $categoryID";
        $result = mysqli_query($connect, $query2);
        $row = $result->fetch_array();
        $slideShowOn = false;
    } else if (!isset($_GET['s'])) {
        $query = "SELECT * FROM product ORDER BY product_id";
        $slideShowOn = true;
    } else {
        $product_name = $_GET['s'];
        $query = "SELECT * FROM product WHERE name LIKE '%$product_name%'";
        $slideShowOn = true;
    }

    $result = mysqli_query($connect, $query);
    if ($slideShowOn) { ?>
        <script src="vendor/js/jquery.slides.min.js"></script>
        <div class="container">
            <div id="slides">
                <img src="images/promo1.jpg">
                <img src="images/promo2.png">
                <img src="images/promo3.png">
            </div>
        </div>
        <script>slideShow()</script>
    <?php } ?>
    <h2 align="center">Select product
        <?php if (isset($query2))
            echo "(" . $row['category_name'] . ")" ?></h2><br>
    <form method="post" id="productsForm">
        <?php
        if (mysqli_num_rows($result) > 0):
            while ($row = mysqli_fetch_array($result)):
                ?>
                <div class="col-md-3 col-sm-4 col-xs-6 col-xss-12 product-col">
                    <article class="col-item">
                        <div class="photo">
                            <div class="options-cart-round">
                                <button name="addButton" class="btn btn-success" title="Add to cart"
                                        data-toggle="tooltip" value="<?php echo $row["product_id"]; ?>">
                                    <span class="fa fa-shopping-cart"></span>
                                </button>
                            </div>
                            <div class="options-wishlist-round">
                                <button name="wishButton" class="btn btn-danger" title="Add to wishlist"
                                        data-toggle="tooltip" value="<?php echo $row["product_id"]; ?>">
                                    <span class="fa fa-heart"></span>
                                </button>
                            </div>
                            <div class="options-info-round">
                                <button name="infoButton" class="btn btn-primary" title="More info"
                                        data-toggle="tooltip" value="<?php echo $row["product_id"]; ?>">
                                    <span class="fa fa-search"></span>
                                </button>
                            </div>
                            <img src="<?php echo $row["image"]; ?>" class="img-responsive"
                                 alt="Product Image"/>
                        </div>
                        <div class="info">
                            <div class="row">
                                <div class="price-details col-md-6">
                                    <!--                                    <p class="details"> Lorem ipsum dolor sit amet, consectetur.. </p>-->
                                    <h1><?php echo $row["name"]; ?></h1>
                                    <br>
                                    <span class="price-new text-danger">฿<?php
                                        $discount = $row["discount"];
                                        $p_new = $row["price"] - ($row['price'] * ($discount / 100));
                                        echo $p_new . '.00'; ?></span>
                                </div>
                                <div class="out-stock">
                                    <?php if ($row["in_stock"] == 0): ?>
                                        <span class="stock text-danger">Out of Stock</span>
                                    <?php elseif($row["discount"] != 0):
                                        ?>
                                        <span class="price-old">฿<?= $row["price"] ?></span>
                                        <br>
                                        <span class="discount">Discount <?= $discount ?>%</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                <?php
            endwhile;
        endif;
        ?>
    </form>
</div>
<?php require_once('footer.php') ?>
</body>
</html>