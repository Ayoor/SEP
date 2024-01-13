<?php
    session_start();
    include "./../connection.php";
    include "functions.php";
    $user = $_SESSION["user"];
    $mobile = "";
    $address = "";
    $qUser = "select * from users where id = '$user'";
    $resUser = mysqli_query($conn,$qUser);
    while($rowUser = mysqli_fetch_array($resUser)){
        $mobile = $rowUser["phone"];
        $address = $rowUser["address"];
    }

    $tracking_number = generateTracknigId();
    // Inserting into Order table
    $orderQ = "insert into orders (id, user,mobile, address, status) values ('$tracking_number','$user','$mobile','$address', 'pending')";
    mysqli_query($conn, $orderQ);

    // Fetching all Items from cart
    $cartQ = "select * from cart where user = '$user'";
    $resCart = mysqli_query($conn, $cartQ) or die(mysqli_error($conn));
    while ($rowCart = mysqli_fetch_array($resCart)) {
        $product = $rowCart["product"];
        $qty = $rowCart["qty"];
        $start_date = $rowCart["start_date"];
        $end_date = $rowCart["end_date"];
        //checking if the item is available or not (qty)
        $availablity = check_availablity($product, $qty);
        $update_Product_Q = "";
        if($availablity){
            $stock = get_stock($product);
            $orderItemQ = "insert into order_items (order_id, product, quantity, start_date, end_date) values('$tracking_number', '$product', '$qty', '$start_date', '$end_date')";
            mysqli_query($conn, $orderItemQ);
            $delq = "delete from cart where product = '$product' and user = '$user'";
            mysqli_query($conn, $delq);
            
            $availability = "available";
            $remaining_qty = $stock - $qty;
            if($remaining_qty == 0){
                $availability = "unavailable";
            }
            $update_Product_Q = "update equipments set Stock_Balance = '$remaining_qty' , availability = '$availability' where id = '$product' ";
            mysqli_query($conn, $update_Product_Q);
        }else{
            $stock = get_stock($product);
            if($stock>0){
                $qty = $stock;
                $orderItemQ = "insert into order_items (order_id, product, quantity, start_date, end_date) values('$tracking_number', '$product', '$qty', '$start_date', '$end_date')";
                mysqli_query($conn, $orderItemQ);
                $delq = "delete from cart where product = '$product' and user = '$user'";
                mysqli_query($conn, $delq);

                $availability = "available";
                $remaining_qty = $stock - $qty;
                if($remaining_qty == 0){
                    $availability = "unavailable";
                }
                $update_Product_Q = "update equipments set Stock_Balance = '$remaining_qty' , availability = '$availability' where id = '$product' ";
                mysqli_query($conn, $update_Product_Q);
            }
        }
    }

    header("location:./../cart.php?order_placed");
    function generateTracknigId(){
        return rand(1000000000, 9999999999);
    }
?>