<?php
    session_start();
    $id = $_REQUEST["id"];
    include "./../connection.php";

    $q = "delete from cart where id = '$id'";
    mysqli_query($conn, $q);
    header("location:./../cart.php?deleted");
?>