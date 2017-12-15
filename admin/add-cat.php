<html lang="en">
<body>

<?php
require_once('navbar.php');
include_once '../dbconfig.php';

if (isset($_POST['addCat'])) {
    $cat_name = $_POST['catName'];
    $sql = "INSERT INTO category (category_name) VALUES ('$cat_name')";

    if ($connect->query($sql) === TRUE) {

    } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }
}
?>

<div class="container">
    <form method="post" class="form-horizontal" role="form">
        <div class="form-group">
            <label class="col-sm-3 control-label">Existing Category</label>
            <div class="col-sm-9">
                <ul class="list-group">
                    <?php
                    $query = "SELECT * FROM category";
                    $result = mysqli_query($connect, $query);
                    while ($row = mysqli_fetch_array($result)):
                        ?>
                        <li class="list-group-item"><?= $row['category_name'] ?></li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Add Category</label>
            <div class="col-sm-9">
                <input name="catName" placeholder="Category Name" class="form-control" autofocus>
                <span class="help-block">For example, laptop</span>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-9 col-sm-offset-3">
                <input type="submit" class="btn btn-primary btn-block" name="addCat" value="Add Category">
            </div>
        </div>
        <div id="message"></div>
    </form> <!-- /form -->
</div> <!-- ./container -->

</body>
</html>

<script>
    $('#menu13').addClass('active');
</script>