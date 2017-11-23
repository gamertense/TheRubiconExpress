<!doctype html>
<html>
<head>

</head>

<body>
<?php
require_once('navbar.php');
require_once('../dbconfig.php');

if (isset($_POST['isDelivered'])) {
    $id = $_POST['isDelivered'];
    $sql = "UPDATE orders SET isDelivered = 1 WHERE order_id = $id";

    if ($connect->query($sql) === FALSE)
        echo "Error updating record: " . $connect->error;
}
?>
<link rel="stylesheet" type="text/css" href="../vendor/css/dataTables.bootstrap.min.css">
<script src="../vendor/js/jquery.dataTables.min.js"></script>
<script src="../vendor/js/dataTables.bootstrap.min.js"></script>
<br>
<form method="post" id="deliveryForm">
    <div class="container">
        <div class="table-responsive">
            <table class="table table-hover" id="deliveryTable">
                <thead>
                <tr>
                    
                    <th> Name</th>
                    <th> Email</th>
                    
                </tr>
                </thead>
                <tbody>

                <?php
                $query = "SELECT * FROM customer;
                $result = mysqli_query($connect, $query);
                if (mysqli_num_rows($result) > 0):
                    ?>
                    <input type="hidden" value="<?= $row['cu_id'] ?>">
                    <?php
                    while ($row = mysqli_fetch_array($result)):
                        if ($row['isDelivered'] == 1)
                            $isDelivered = true;
                        else
                            $isDelivered = false;
                        ?>
                        <tr>
                            <td><?= $row['name'] ?></td>
                            <td><?= $row['email'] ?></td>
                            
                           
                            <td>
                                <button name="isapproved" value="<?= $row['order_id'] ?>" class="
                            <?php if ($isapproved) echo "btn btn-success";
                                else echo "btn btn-danger"; ?>"
                                    <?php if ($isapproved) echo "disabled" ?>>
                                <?php if ($isapproved) echo "Approved";
                                else echo "Not approved"; ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php endif; ?>

                </tbody>
            </table>
        </div>
    </div>
</form>
</body>
</html>

<script>
    $('#menu1').addClass('active');
    $('#deliveryTable').DataTable();
</script>
