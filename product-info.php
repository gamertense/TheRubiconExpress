<!-- <?php

// if (isset($_GET['fid']))
//     echo $_GET['fid'];
?>
 -->
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>The Rubicon Express</title>
    <link rel="stylesheet" type="text/css" href="vendor/css/product.css">
    <link rel="stylesheet" type="text/css" href="vendor/css/comment.css">
</head>
<body>
    <?php
require_once('menu.php');

    $editid = $_GET['pid'];
    $q = "SELECT * FROM product WHERE product_id = '$editid'";
    $result = $connect->query($q);
    if(!$result){
        echo "Cannot get current record<br>".$q;
        exit();
    }
    $row = mysqli_fetch_array($result);
?>



<div class="container" style="width:60%;">

    <h1><?php echo $row["name"]; ?>
    <span class="price-new text-danger">฿<?php echo $row["price"]; ?></span>
    </h1>
    <br>


<div class="container" style="padding-bottom: 30px">

   
    <form method="post" id="productsForm">
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
                       
                            <img src="<?php echo $row["image"]; ?>" class="img-responsive"
                                 alt="Product Image"/>
                        </div>
                        <div class="info">
                            <div class="row">
                                <div class="price-details col-md-6">
                                    <!--                                    <p class="details"> Lorem ipsum dolor sit amet, consectetur.. </p>-->
                                    
                                   
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
    </form>
</div>
</body>
</html>
<!-- specification -->
    <div class="spec">
            <h4>Specification</h4>
            <ul>
                <?php
                $ing = $row["specification"];
                $pieces = explode("|", $ing);
                for ($i = 0; $i < count($pieces); $i++) { ?>
                    <li><?= $pieces[$i] ?></li>
                <?php } ?>

            </ul>
        </div>
        <br>
        <br>
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
<!-- comment -->    
<?php 
require_once('comment.php')
 ?>


</div>




</body>
</html>


