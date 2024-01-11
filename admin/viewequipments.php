<?php include('connection.php');
session_start();
if (!$_SESSION["username"]) {
    header('Location: signin.php');
}
$category= $_GET['category'];
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from 111.68.112.228:443/public/store.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Nov 2023 00:43:16 GMT -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Dashboard</title>
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
    <!-- <link rel="stylesheet" href="css/vendor.min.css"> -->
    <link rel="stylesheet" href="css/elephant.min.css">
    <link rel="stylesheet" href="css/application.min.css">
    <link rel="stylesheet" href="css/store.min.css">
    <link rel="stylesheet" href="/styles/viewequipments.css">

    <style>
        .card img{
            width:90% ;
            max-height: 250px;
        }
        #pagebody{
            overflow-y: scroll;
            min-height: 90vh;
            /* background-color: red; */
            overflow-x: hidden;
        }
        .layout-footer{
            position: relative;
            /* bottom: -30px; */
        }
        .col-sm-3{
            margin-top: 15px;
            height: 350px;

            
        }
        .col-sm-3 img{
            min-height: 25  0px;
        }
        
    </style>

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


    <section id="pagebody" >
<h2 style="margin-left: 50px;"><?php echo $category ?></h2>
    <div class="row" style="padding: 20px;">

    <?php


$query = "SELECT * from equipments where equipments.categoryID =(SELECT categories.id FROM categories where categories.Name ='$category');";
$result = mysqli_query($conn, $query);

if ($result) {
    
    while ($row = mysqli_fetch_assoc($result)) {
        $equipment = htmlspecialchars($row['equipment_name']);
        $description = htmlspecialchars($row['description']);
        $imageSrc = 'data:image/' . 'jpg' . ';base64,' . base64_encode($row['equipmentImg']);
        $equipmentPageLink = strtolower(str_replace(' ', '', $equipment)) . '.php?'.'equipmentname='.$equipment ;
        echo '<div class="col-sm-3 text-center">
        <div class="card">
            <img src="'.$imageSrc.'" class="card-img-top" alt="'.$equipment.'">
          <div class="card-body">
            <h5 class="card-title">'. $equipment .'</h5>
            <a href="'.$equipmentPageLink.'" class="btn btn-primary">View</a>
          </div>
        </div>
      </div>';
    }

   
} else {
    echo "No Equipment found in this Category";
}

// Close the database connection
mysqli_close($conn);
?>

  

   
</div>
    </section>


    <?php include "footer.php" ?>
    <script src="js/vendor.min.js"></script>
    <script src="js/elephant.min.js"></script>
    <script src="js/application.min.js"></script>

</body>

<!-- Mirrored from 111.68.112.228:443/public/store.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Nov 2023 00:43:56 GMT -->

</html>