<?php
require_once('../dbconfig.php');

for ($i = 1; $i <= 10; $i++) {
    if ($i <= 9)
        $m = '0' . $i;
    else
        $m = $i;

    $date = '2017-' . $m . '-22';

    $r_times = rand(1, 5);
    for ($j = 1; $j <= $r_times; $j++) {
        $r_cu = rand(1, 3);
        $pid = getFid($connect);
        $r_qty = rand(1, 3);
        $sql = "INSERT INTO orders (cu_id, product_id, orderDate, quantity) VALUES ('$r_cu', $pid, '$date', '$r_qty')";

        if ($connect->query($sql) === TRUE) {
            // echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $connect->error;
        }
    }
}

function getFid($connect)
{
    $pid = rand(2, 13);
    $sql = "SELECT product_id FROM product WHERE product_id = $pid";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        return $pid;
    } else {
        getFid($connect);
    }
}