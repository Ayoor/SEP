<?php
    session_start();
    include "./../connection.php";
    $review = $_REQUEST["review"];
    $rating = $_REQUEST["rating"];
    $product = $_REQUEST["product_id"];
    $user = $_SESSION["user"];
    $review_added = $_REQUEST["review_added"];
    $q = "";
    if($review_added == true) {
        $q = "update review set review = '$review', rating = '$rating' where user = '$user' and product = '$product'";
    }else {
        $q = "insert into review (product, user, rating, review) values ('$product', '$user', '$rating', '$review')";
    }
    mysqli_query($conn, $q) or die(mysqli_error($conn));
    header("location:./../review.php?equipment_id=".$product."&review-added");
?>