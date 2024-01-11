<?php
include('connection.php');
session_start();
if (!$_SESSION["username"]) {
    header('Location: signin.php');
}


// retrieve equipment data   
$equipment = $_GET['equipmentname'];
if (!$equipment) {
    header('Location:index.php');
} else {
    $query = "SELECT equipment_name, price, description, Stock_Balance balance, `availability`, equipmentImg FROM `equipments` WHERE equipment_name = '$equipment'";
    // echo $query;
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    if ($result) {

        $oldequipmentName = htmlspecialchars($row['equipment_name']);
        $oldcurrentPrice = htmlspecialchars($row['price']);
        $olddescription = htmlspecialchars($row['description']);
        $oldbalance = htmlspecialchars($row['balance']);
        $imageSrc = 'data:image/' . 'jpg' . ';base64,' . base64_encode($row['equipmentImg']);
    }
}

// update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Extract form data
    $equipmentName = mysqli_real_escape_string($conn, $_POST['equipment']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $categoryName = mysqli_real_escape_string($conn, $_POST['categories']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $balance = mysqli_real_escape_string($conn, $_POST['balance']);
    $availability = "unavailable";
    // Get the categoryID based on the category name
    $categoryID = getCategoryID($categoryName);

    // check if an image file was uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $name = $_FILES['image']['name'];
        $type = $_FILES['image']['type'];
        $data = file_get_contents($_FILES['image']['tmp_name']);
        // connect to the database
        // insert the image data into the database
        $pdo = new PDO('mysql:host=localhost;dbname=main-db', 'root', '');
        $stmt = $pdo->prepare("UPDATE `equipments` SET  description = ?, categoryID = ?, equipmentImg = ?, price = ?, Stock_Balance = ?, availability = ? WHERE equipment_name = ?");
        $stmt->bindParam(1, $description);
        $stmt->bindParam(2, $categoryID);
        $stmt->bindParam(3, $data);
        $stmt->bindParam(4, $price);
        $stmt->bindParam(5, $balance);
        $stmt->bindParam(6, $availability);
        $stmt->bindParam(7, $equipmentName); // Change this to $equipmentName
        $stmt->execute();

        if ($stmt) {
            // Display success message and redirect after 3 seconds
            echo '<div class="alert alert-success" role="alert">
            Equipment Successfully updated.
        </div>';

        echo '<script>
        setTimeout(function(){
            window.location.href = "viewequipments.php?category=' . urlencode($categoryName) . '";
        }, 1500);
    </script>';
        }
    }
}

// Function to get categoryID based on category name
function getCategoryID($categoryName)
{
    global $conn;

    $sql = "SELECT id FROM `categories` WHERE Name = ?";
    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "s", $categoryName);

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_bind_result($stmt, $categoryID);
        mysqli_stmt_fetch($stmt);

        // Close the statement
        mysqli_stmt_close($stmt);

        return $categoryID;
    } else {
        echo "Error executing the query: " . mysqli_stmt_error($stmt);
        return null;
    }
}

?>
<!-- $sql = "INSERT INTO `equipments` (equipment_name, description, categoryID, equipmentImg) VALUES (?, ?, ?, ?)"; -->





<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from 111.68.112.228:443/public/form-controls.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Nov 2023 00:42:47 GMT -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Equipment</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <meta name="description" content="Elephant is an admin template that helps you build modern Admin Applications, professionally fast! Built on top of Bootstrap, it includes a large collection of HTML, CSS and JS components that are simple to use and easy to customize.">
    <meta property="og:url" content="http://demo.madebytilde.com/elephant">
    <meta property="og:type" content="website">
    <meta property="og:title" content="The fastest way to build Modern Admin APPS for any platform, browser, or device.">
    <meta property="og:description" content="Elephant is an admin template that helps you build modern Admin Applications, professionally fast! Built on top of Bootstrap, it includes a large collection of HTML, CSS and JS components that are simple to use and easy to customize.">
    <meta property="og:image" content="../../demo.madebytilde.com/elephant.html">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@madebytilde">
    <meta name="twitter:creator" content="@madebytilde">
    <meta name="twitter:title" content="The fastest way to build Modern Admin APPS for any platform, browser, or device.">
    <meta name="twitter:description" content="Elephant is an admin template that helps you build modern Admin Applications, professionally fast! Built on top of Bootstrap, it includes a large collection of HTML, CSS and JS components that are simple to use and easy to customize.">
    <meta name="twitter:image" content="../../demo.madebytilde.com/elephant.html">
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="manifest.json">
    <link rel="mask-icon" href="safari-pinned-tab.svg" color="#d9230f">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,700">
    <link rel="stylesheet" href="css/vendor.min.css">
    <link rel="stylesheet" href="css/elephant.min.css">
    <link rel="stylesheet" href="css/application.min.css">
    <link rel="stylesheet" href="css/demo.min.css">
</head>

<body class="layout layout-header-fixed">
    <?php include "topnav.php"; ?>
    <div class="layout-main">



        <div class="layout-content">
            <div class="layout-content-body">
                <div class="title-bar">
                    <h1 class="title-bar-title">
                        <span class="d-ib">Edit Equipment</span>

                    </h1>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="demo-form-wrapper">
                            <form class="form form-horizontal" action="" method="POST" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="form-control-1">Equipment Name</label>
                                    <div class="col-sm-9">
                                        <input id="form-control-1" value="<?php echo $equipment ?>" disabled required class="form-control" type="text">
                                        <input type="hidden" value="<?php echo $equipment ?>" name="equipment" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="form-control-8">Equipment Description</label>
                                    <div class="col-sm-9">
                                        <textarea id="form-control-8" value="<?php echo $olddescription ?>" required class="form-control" rows="3" name="description"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="form-control-8">Equipment Category</label>
                                    <div class="col-sm-9">
                                        <?php


                                        $query = "SELECT Name FROM `categories`";
                                        $result = mysqli_query($conn, $query);

                                        if ($result) {
                                            echo '<select required   name="categories" class="form-control"  >';

                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $categoryName = htmlspecialchars($row['Name']);
                                                echo '<option value="' . $categoryName . '">' . $categoryName . '</option>';
                                            }

                                            echo '</select>';
                                        } else {
                                            echo "Error executing the query: " . mysqli_error($conn);
                                        }

                                        // Close the database connection
                                        mysqli_close($conn);
                                        ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="price">Price</label>
                                    <div class="col-sm-3">
                                        <input id="price" class="form-control" value="<?php echo $oldcurrentPrice ?>" type="number" maxlength="8" required name="price">
                                    </div>

                                    <label class="col-sm-2 control-label" for="price">Stock Balance</label>
                                    <div class="col-sm-3">
                                        <input id="balance" class="form-control" value="<?php echo $oldbalance ?>" type="number" maxlength="8" required name="balance">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="form-control-8">Equipment Image</label>
                                    <div class="col-sm-9">
                                        <label class="col-sm-3 control-label" for="image">Upload Image</label>
                                        <input type="file" name="image" id="image" accept="image/*" required>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="form-control-8"></label>
                                    <div class="col-sm-9">
                                        <button type="submit" name="save_data" class="btn btn-primary btn-block">Submit</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</body>

<!-- Mirrored from 111.68.112.228:443/public/form-controls.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Nov 2023 00:42:47 GMT -->

</html>