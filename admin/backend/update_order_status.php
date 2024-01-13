<?php
    include "./../connection.php";
    $order_id = $_POST["order_id"];
    $status = $_POST["status"];
    
    $q = "update orders set status = '$status' where id = '$order_id'";
    mysqli_query($conn, $q);

    echo json_encode(1);
?>