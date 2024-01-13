<?php
    session_start();
    include "./../connection.php";
    include "functions.php";
    if(!isset($_SESSION["user"])){
        header("location:./../login.php");
        exit();
    }


    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        header("location:./../shop.php");
        exit();
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $product_id = $_REQUEST["id"];
        $qty = $_REQUEST["qty"];
        $startDate = $_REQUEST["startDate"];
        $endDate = $_REQUEST["endDate"];

        if (strtotime($endDate) <= strtotime($startDate)) {
            header("location:./../product-details.php?product=".$product_id."&wrong_date");
            exit();
        }
        $availablity = check_availablity($product_id, $qty);
        if($availablity){
            //checking if the product is already in user's cart or not
            $already_in_cart = check_in_cart($product_id);
            $q = '';
            $user = $_SESSION["user"];
            if($already_in_cart){
                $new_qty = intval(return_cart_qty($product_id)) + $qty;
               $q = "update cart set qty = '$new_qty' where product = '$product_id' and user = '$user'";
            } else {
                $q = "insert into cart(product, qty, user, start_date, end_date) values('$product_id', '$qty', '$user', '$startDate', '$endDate')";
            }
            mysqli_query($conn, $q);
            header("location:./../cart.php");
           } else{
            echo "Item not available";
           }
    }



?>