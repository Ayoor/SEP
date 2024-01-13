<?php
    include "./../connection.php";
    function check_availablity($product_id, $qty){
        global $conn;
        $q = "select * from equipments where id = '$product_id'";
        $res = mysqli_query($conn, $q);
        if(mysqli_num_rows($res)>0){
            while($row = mysqli_fetch_array($res)){
                $stock = $row["Stock_Balance"];
                if($stock >= $qty){
                    return true;
                } else {
                    return false;
                }
            }
        }
    }

    function check_in_cart($product_id){
        global $conn;
        $user = $_SESSION["user"];
        $q = "select * from cart where product = '$product_id' and user = '$user'";
        $res = mysqli_query($conn, $q);
        if(mysqli_num_rows($res)>0){
            return true;
        }else{
            return false;
        }
    }


    function return_cart_qty($product_id){
        global $conn;
        $user = $_SESSION["user"];
        $q = "select * from cart where product = '$product_id' and user = '$user'";
        $res = mysqli_query($conn, $q);
        while($row = mysqli_fetch_array($res)){
            return $row["qty"];
        }
    }

    function get_stock($product_id){
        global $conn;
        $user = $_SESSION["user"];
        $q = "select * from equipments where id = '$product_id'";
        $res = mysqli_query($conn, $q);
        while($row = mysqli_fetch_array($res)){
            return $row["Stock_Balance"];
        }
    }

?>