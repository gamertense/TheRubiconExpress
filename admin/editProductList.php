<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../vendor/css/product.css">
    <link rel="stylesheet" type="text/css" href="../vendor/css/menu.css">
    <style>
        .col-item .options-cart-round {
            position: absolute;
            left: 40%;
            top: 17%;
            display: none;
        }
    </style>
    <script>
        var products_JSON = [];
    </script>
</head>
<body>
<?php
require_once('navbar.php');
include_once '../dbconfig.php';

$query = "SELECT * FROM product ORDER BY product_id";
$result = mysqli_query($connect, $query);
if (mysqli_num_rows($result) > 0):
    while ($row = mysqli_fetch_array($result)): ?>
        <script>products_JSON.push("<?php echo $row["name"]; ?>");</script>
        <?php
    endwhile;
endif;
?>

<div class="container">
    <form role="search" style="width:50%;" class="col-xs-offset-2 col-md-offset-3">
        <div class="input-group">
            <input class="form-control" placeholder="Search" id="productSearch" data-provide="autocomplete"
                   autocomplete="off">
            <div class="input-group-btn">
                <button id="searchButton" class="btn btn-default"><i
                            class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
    </form>

    <h2 align="center">Select product to edit/remove</h2><br>
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
                                <button name="editButton" class="btn btn-primary" title="Edit"
                                        data-toggle="tooltip" value="<?php echo $row["product_id"]; ?>">
                                    <span class="fa fa-pencil-square-o"></span>
                                </button>
                            </div>
                            <img src="../<?php echo $row["image"]; ?>" class="img-responsive"
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
</body>
</html>

<script src="../vendor/js/jquery.autocomplete.min.js"></script>
<script>
    $('button[name="editButton"]').click(function (e) {
        var productID = $(this).val();
        window.location.href = "edit-product.php?id=" + productID;
    });

    $(document).ready(function () {
        $("#productsForm").submit(function (event) {
            // Stop form from submitting normally
            event.preventDefault();
        });

        initialLoad();
    });

    function initialLoad() {
        $('#menu3').addClass('active');
        $(".col-sm-4").fadeIn("slow");
        $('[data-toggle="tooltip"]').tooltip();

        var productSearchSelector = $("#productSearch");
        productSearchSelector.autocomplete({lookup: products_JSON});

        // After user clicks the suggested one and hit 'enter' or 'search button'.
        var inputVal = productSearchSelector.val();
        $("#searchButton").click(function (e) {
            e.preventDefault();
            inputVal = productSearchSelector.val();
            window.location.href = "editProductList.php?s=" + inputVal;
        });

        // When user types in the search box and hits the enter key.
        productSearchSelector.keypress(function (event) {
            if (event.which == 13) {
                inputVal = productSearchSelector.val();
                window.location.href = "editProductList.php?s=" + inputVal;
            }
        });
    }
</script>
