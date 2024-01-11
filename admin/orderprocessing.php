<?php include('connection.php');
session_start();
if (!$_SESSION["username"]) {
    header('Location: signin.php');
}
// Assuming you have a database connection established

// Your query to retrieve data
$orderid = $_GET['id'];
$query = "SELECT transanctions.*, equipments.equipment_name,equipments.price, equipments.equipmentImg, equipments.Stock_Balance, CONCAT(users.firstname, ' ', users.lastname) AS full_name
FROM `transanctions` 
LEFT JOIN `equipments` ON transanctions.equipmentID = equipments.id
LEFT JOIN `users` ON transanctions.Userid = users.id
WHERE transanctions.`status` = 'pending'
AND transanctions.orderID = $orderid;";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    // Assign relevant values to variables
    $equipment = $row['equipment_name'];
    $availableUnits = $row['Stock_Balance']; // Update with the actual column name
    $price = $row['price'];
    $quantity = $row['Quantity'];
    $totalPrice = $row['orderPrice']; // Update with the actual column name
    $customerName = $row['full_name']; // Update with the actual column name
    $returnDate = $row['ReturnDate']; // Update with the actual column name
    $duration = $row['ReturnDuration(Days)']; // Update with the actual column name
    $imageSrc = 'data:image/' . 'jpg' . ';base64,' . base64_encode($row['equipmentImg']);
    // $imageSrc = $row['equipmentImg'];

    // Use these variables to populate the form fields
}

?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from 111.68.112.228:443/public/store.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Nov 2023 00:43:16 GMT -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Store &middot; Elephant Template &middot; The fastest way to build Modern Admin APPS for any platform, browser, or device.</title>
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
    <!-- <link rel="manifest" href="manifest.json"> -->
    <link rel="mask-icon" href="safari-pinned-tab.svg" color="#d9230f">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,700">
    <link rel="stylesheet" href="css/vendor.min.css">
    <link rel="stylesheet" href="css/elephant.min.css">
    <link rel="stylesheet" href="css/application.min.css">
    <link rel="stylesheet" href="css/store.min.css">
</head>

<body class="layout layout-header-fixed">
    <!-- topnav -->
    <?php
    include 'topnav.php';
    ?>


    <!-- sidebar -->

    <?php
    include 'sidebar.php';
    ?>


    <section id="pagebody" style="border: 1px solid red; height: 90vh; display: flex; align-items: center; justify-content: center;">

        <div class="layout-main">



            <div class="layout-content">
                <div class="layout-content-body">
                    <div class="title-bar">
                        <h1 class="title-bar-title">
                            <span class="d-ib">Confirm Order</span>
                        </h1>
                    </div>


                  

<div class="row">
    <div class="col-md-8">
        <div class="demo-form-wrapper">
            <form class="form form-horizontal" action="confirmrequest.php" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-1">Order ID</label>
                    <div class="col-sm-4">
                        <input id="form-control-1" value="<?php echo $orderid ?>" disabled required class="form-control" type="text" name="transid">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-1">Equipment Name</label>
                    <div class="col-sm-9">
                        <input id="form-control-1" value="<?php echo $equipment?>" disabled required class="form-control" type="text" name="equipmentName">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="price">Requested Units</label>
                    <div class="col-sm-3">
                        <input id="price" class="form-control" value="<?php echo $quantity ?>" type="text" required disabled name="price">
                    </div>

                    <label class="col-sm-2 control-label" for="price">Available units</label>
                    <div class="col-sm-3">
                        <input id="balance" class="form-control" value="<?php echo $availableUnits ?>" type="text" disabled name="totalPrice">
                    </div>
                </div>

               
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="price">Price</label>
                    <div class="col-sm-3">
                        <input id="price" class="form-control" value="<?php echo $price ?>" type="text" required disabled name="price">
                    </div>

                    <label class="col-sm-2 control-label" for="price">Total</label>
                    <div class="col-sm-3">
                        <input id="balance" class="form-control" value="<?php echo $totalPrice ?>" type="text" disabled name="totalPrice">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-1">Customer Name</label>
                    <div class="col-sm-9">
                        <input id="form-control-1" value="<?php echo $customerName ?>" disabled required class="form-control" type="text" name="customerName">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="price">Return Date</label>
                    <div class="col-sm-4">
                        <input id="price" class="form-control" value="<?php echo $returnDate ?>" type="text" required disabled name="returnDate">
                    </div>

                    <label class="col-sm-2 control-label" for="price">Duration</label>
                    <div class="col-sm-3">
                        <input id="balance" class="form-control" value="<?php echo $duration ?>" type="text" disabled name="duration">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-1">Rejection Reason</label>
                    <div class="col-sm-8">
                        <input style="border: 1px solid black;" id="reject" class="form-control" type="text" name="rejection">
                        <input style="border: 1px solid black;" id="orderid" value="<?php echo $orderid ?>" class="form-control"  type="hidden" name="orderid">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-8">Equipment Image</label>
                    <div class="col-sm-9">
                        <div class="overlay-image">
                            <img class="img-responsive" style="height: 200px; width:200px" src="<?php echo $imageSrc; ?>" alt="<?php echo $equipmentName; ?>">
                        </div>
                    </div>
                </div>

                

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-8"></label>
                    <div class="col-sm-4">
                    <button id="rejectbtn" type="submit" name="reject" class="btn btn-primary btn-block" >Reject</button>
                    </div>
                    <div class="col-sm-4">
                        <button type="submit" name="approve" class="btn btn-success btn-block">Approve</button>
                    </div>
                </div>

            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </section>

    <!-- <script>
        // Function to confirm rejection and redirect to confirmrequest.php
        function confirmReject() {
            var rejectionReason = document.getElementById("rejectbtn").value;
            // Show confirmation dialog
            var isConfirmed = confirm("Are you sure you want to reject this order?");
            if (isConfirmed) {
                // If user confirms, redirect to confirmrequest.php
                // window.location.href = "ladders.php";
                // window.location.href = "confirmrequest.php?reason=" + encodeURIComponent(rejectionReason)&id="";
            }
        }
    </script> -->


    <?php include "footer.php" ?>
    </div>
    <script src="js/vendor.min.js"></script>
    <script src="js/elephant.min.js"></script>
    <script src="js/application.min.js"></script>

    

</body>

<!-- Mirrored from 111.68.112.228:443/public/store.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Nov 2023 00:43:56 GMT -->

</html>