<?php
include('connection.php');

if(isset($_POST['save_data'])){

    $category = $_POST['categoryName'];
    $description = $_POST['description'];

    $query = "INSERT INTO `categories`(`Name`, `Description`) VALUES ('$category', '$description')";
    
    $queryRun = mysqli_query($conn, $query);

    if($queryRun){
        // $_SESSION["status"] = "Data Inserted Successfully";
        header("location: category-add.php");
    }
    else{
       // $_SESSION["status"] = "Data Not Inserted";
        header("location: category-add.php");
    }
} 
?>