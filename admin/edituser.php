<!doctype html>
<html>
<head>

</head>

<body>
<?php
require_once('navbar.php');
require_once('../dbconfig.php');

if (isset($_POST['isapproved'])) {
    $id = $_POST['isapproved'];

    $q="SELECT isapproved from customer WHERE cu_id = $id";
    $results = mysqli_query($connect, $q);
    $rows = mysqli_fetch_array($results);
    if($rows['isapproved']==1){
   
        $sql = "UPDATE customer SET isapproved = 0 WHERE cu_id = $id";
    }
    else{
        $sql = "UPDATE customer SET isapproved = 1 WHERE cu_id = $id";
    }
    

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
                $query = "SELECT * FROM customer";
                $result = mysqli_query($connect, $query);
                if (mysqli_num_rows($result) > 0):
                    ?>
                    <input type="hidden" value="<?= $row['cu_id'] ?>">
                    <?php
                    while ($row = mysqli_fetch_array($result)):
                        if ($row['isapproved'] == 1)
                            $isapproved = true;
                        else
                            $isapproved = false;

                        ?>
                        <tr>
                            <td><?= $row['name'] ?></td>
                            <td><?= $row['email'] ?></td>
                            
                           
                            <td>
                                <button name="isapproved" value="<?= $row['cu_id'] ?>" class="
                            <?php if ($isapproved) echo "btn btn-success";
                                else echo "btn btn-danger"; ?>"
                                    <?php if ($isapproved) echo "" ?>>
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
    $('#menu5').addClass('active');
    $('#deliveryTable').DataTable();
</script>
