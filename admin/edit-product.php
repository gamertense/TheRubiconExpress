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
            <label class="col-sm-3 control-label">Product Category</label>
            <div class="col-sm-9">
                <select class="form-control" name="category">
                    <?php
                    $cat_id = $row['category_id'];
                    
                    $query = "SELECT * FROM category";
                    $result = mysqli_query($connect, $query);
                    while ($row2 = mysqli_fetch_array($result)):
                        ?>
                        <option value="<?= $row2['category_id'] ?>"
                            <?php if ($row2['category_id'] == $cat_id) echo "selected" ?>><?= $row2['category_name'] ?></option>
                    <?php endwhile; ?>
                </select>
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
                        <input type="text" name="spec[]" value="<?= $pieces[$i] ?>" class="form-control"
                               placeholder="spec">
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
                <input type="text" name="spec[]" class="form-control" placeholder="spec">
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
<script>
    $(document).ready(function () {
        specFields();
    });
    $("#edit-product").on('submit', (function (e) {
        e.preventDefault();
        $.ajax({
            url: "php-action/edit-productSQL.php", // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData: false,        // To send DOMDocument or non processed data file it is set to false
            success: function (data)   // A function to be called if request succeeds
            {
                swal('Updated!', data, 'success');
            }
        });
    }));
    function specFields() {
        $(".add-more").click(function () {
            var html = $(".copy-fields").html();
            $(".after-add-more").after(html);
        });
        //here it will remove the current value of the remove button which has been pressed
        $("body").on("click", ".remove", function () {
            $(this).parents(".control-group").remove();
        });
    }
</script>