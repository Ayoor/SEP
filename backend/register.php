<?php
include "./../connection.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect user input from the form
    $fname = trim($_POST["fname"]);
    $lname = trim($_POST["lname"]);
    $phone = trim($_POST["phone"]);
    $email = trim($_POST["email"]);
    $dob = $_POST["dob"];
    $postal = trim($_POST["postal"]);
    $address = trim($_POST["address"]);
    $gender = $_POST["gender"];
    $password = trim($_POST["password"]);

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $q = "select * from users where email = '$email';";
    $res = mysqli_query($conn, $q);
    if(mysqli_num_rows($res)>0){
        header("location:./../register.php?email_already_exist");
        exit();
    }

    // Insert user data into the 'user' table
    $sql = "INSERT INTO users (firstname, lastname, phone, email, DOB, postcode, address, gender, password)
            VALUES ('$fname', '$lname', '$phone', '$email', '$dob', '$postal', '$address', '$gender', '$hashedPassword')";

    if ($conn->query($sql) === TRUE) {
       header("location:./../register.php?saved");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // Handle the case where the form was not submitted properly
    echo "Invalid form submission";
}
?>
