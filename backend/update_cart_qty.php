<?php
session_start();
include "./../connection.php";
include "functions.php";
$product_id = $_REQUEST["id"];
$qty = $_REQUEST["qty"];
$availablity = check_availablity($product_id, $qty);
echo $qty;
if($availablity){
    $user = $_SESSION["user"];
    $q = "update cart set qty = '$qty' where product = '$product_id' and user = '$user'";
    
    mysqli_query($conn, $q);
    header("location:./../cart.php?updated");
    exit();
}else{
    header("location:./../cart.php?quantity_difference");
    exit();
}
?>