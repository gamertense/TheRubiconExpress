<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>The Rubicon Express</title>
    <link rel="stylesheet" type="text/css" href="vendor/css/product.css">
</head>
<body>
<?php
require_once('menu.php');

if (isset($_POST['Register'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $query = "INSERT INTO customer (email, password, name) VALUES('$email', '$password', '$name')";
    $connect->query($query);
//    if ($connect->query($query) === TRUE)
//        echo "success";
}
?>

<div class="container">
    <h2 align="center">Select Products</h2><br>
    <?php
    if (!isset($_GET['s']))
        $query = "SELECT * FROM product ORDER BY product_id";
    else {
        $product_name = $_GET['s'];
        $query = "SELECT * FROM product WHERE name LIKE '%$product_name%'";
    }

    $result = mysqli_query($connect, $query); ?>
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
                                    <span class="price-new text-danger">฿<?php echo $row["price"]; ?></span>
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

<footer>
    <div class="footer" id="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                    <h3> Lorem Ipsum </h3>
                    <ul>
                        <li><a href="#"> Lorem Ipsum </a></li>
                        <li><a href="#"> Lorem Ipsum </a></li>
                        <li><a href="#"> Lorem Ipsum </a></li>
                        <li><a href="#"> Lorem Ipsum </a></li>
                    </ul>
                </div>
                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                    <h3> Lorem Ipsum </h3>
                    <ul>
                        <li><a href="#"> Lorem Ipsum </a></li>
                        <li><a href="#"> Lorem Ipsum </a></li>
                        <li><a href="#"> Lorem Ipsum </a></li>
                        <li><a href="#"> Lorem Ipsum </a></li>
                    </ul>
                </div>
                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                    <h3> Lorem Ipsum </h3>
                    <ul>
                        <li><a href="#"> Lorem Ipsum </a></li>
                        <li><a href="#"> Lorem Ipsum </a></li>
                        <li><a href="#"> Lorem Ipsum </a></li>
                        <li><a href="#"> Lorem Ipsum </a></li>
                    </ul>
                </div>
                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                    <h3> Lorem Ipsum </h3>
                    <ul>
                        <li><a href="#"> Lorem Ipsum </a></li>
                        <li><a href="#"> Lorem Ipsum </a></li>
                        <li><a href="#"> Lorem Ipsum </a></li>
                        <li><a href="#"> Lorem Ipsum </a></li>
                    </ul>
                </div>
                <div class="col-lg-3  col-md-3 col-sm-6 col-xs-12 ">
                    <h3> Lorem Ipsum </h3>
                    <ul>
                        <li>

                            <input type="text" class="full text-center form-control" placeholder="Email ">
                            <button class="btn btn-success btn-block" type="button"> Lorem ipsum <i
                                        class="fa fa-long-arrow-right"> </i></button>
                        </li>
                    </ul>

                    <div class="row">
                        <a href="#"><img
                                    src="http://th-live-03.slatic.net/layout/build/components/74ace6f971be60ab5892661b2af3191c.svg"></a>
                        <a href="#"><img
                                    src="http://th-live-03.slatic.net/layout/build/components/fd3bc53e70ef2728639cb81b1b1f3801.svg"></a>
                        <a href="#"><img
                                    src="http://th-live-03.slatic.net/layout/build/components/16f48950dfd55bbf99a23f226a71c855.svg"></a>
                        <a href="#"><img
                                    src="http://th-live-03.slatic.net/layout/build/components/d7a8ea4c011448077ddafab5f7196fee.svg"></a>
                        <a href="#"><img
                                    src="http://th-live-03.slatic.net/layout/build/components/d1165e8d5c7c2a8b98b78d278fdd437f.svg"></a>
                        <a href="#"><img
                                    src="http://th-live-03.slatic.net/layout/build/components/2d068c182611d697a5ca56be906ef76b.svg"></a>
                        <a href="#"><img
                                    src="http://th-live-03.slatic.net/layout/build/components/aab8f84c33b570189151768a8d389f0b.svg"></a>
                        <a href="#"><img
                                    src="http://th-live-03.slatic.net/layout/build/components/1611b4567278576343a376198f06127d.svg"></a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="col-md-6">
                <h5>Payment method</h5>
                <img src="https://cdn-p.weloveshopping.com/themes/titan/assets/images/footer/chpay_logo.png"><br> <span
                        class="ft-copy-right">Copyright © 2017 Food Delivery Commerce Co., Ltd. All Rights Reserved.</span>
            </div>
            <div class="col-md-3 col-md-offset-3">
                <div class="ft-title"><h5>Verified by</h5></div>
                <img src="https://cdn-p.weloveshopping.com/themes/titan/assets/images/footer/ssl_dbd_logo.png">
            </div>
        </div>
    </div>
    <!--/.footer-bottom-->
</footer>
</body>
</html>

<script>
    var productID, btnString = 'cart';

    $(document).ready(function () {
        $(".col-sm-4").fadeIn("slow");
        initialLoad();
    });

    function initialLoad() {
        $('#menu1').addClass('active');
        $('[data-toggle="tooltip"]').tooltip();

        $('button[name="addButton"]').click(function () {
            btnString = 'cart';
            productID = $(this).val();
        });
        $('button[name="wishButton"]').click(function () {
            productID = $(this).val();
            btnString = 'wish';
        });
        $('button[name="infoButton"]').click(function () {
            productID = $(this).val();
            btnString = 'info';
        });

        // Attach a submit handler to the form
        $("#productsForm").submit(function (event) {
            // Stop form from submitting normally
            event.preventDefault();
            if (!isLogin && btnString !== 'info') {
                swal(
                    'Please login first!',
                    '',
                    'error'
                );
                return;
            }
            // Send the data using post
            var posting;
            if (btnString === 'cart')
                posting = $.post("php-action/add-cart.php", {hidden_id: productID});
            else if (btnString === 'info')
                window.location = "product-info.php?pid=" + productID;
            else
                posting = $.post("php-action/add-wishlist.php", {hidden_id: productID});
            // Put the results in a div
            posting.done(function (data) {
                switch (data) {
                    case "success-cart":
                        swal(
                            'Added!',
                            'Your selected product has been added to cart',
                            'success'
                        ).then(function () {
                            location.reload();
                        });
                        break;
                    case "success-wishlist":
                        swal(
                            'Added!',
                            'Your selected product has been added to wishlist',
                            'success'
                        );
                        break;
                    case "already added to wishlist":
                        swal(
                            'product exists!',
                            'This product is ' + data,
                            'warning'
                        );
                        break;
                    default:
                        alert(data);
                }
            });
        });
    }
</script>
