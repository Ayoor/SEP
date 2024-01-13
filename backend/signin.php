<?php
    session_start();
    include "./../connection.php";
    $email = $_POST["email"];
    $password = $_POST["password"];
    $q = "select * from users where email = '$email'";
    $res = mysqli_query($conn, $q) or die(mysqli_error($conn));
    if(mysqli_num_rows($res) > 0) {
        while($row = mysqli_fetch_assoc($res)) {
            $id = $row["id"];
            $hased_password = $row["password"];
            if (password_verify($password, $hased_password)) {
                $_SESSION["user"] = $id;
                header("location:./../index.php");
            } else {
                header("location:./../login.php?invalid_credentials");
            }
        }
    }else {
        header("location:./../login.php?invalid_credentials");
    }
?>