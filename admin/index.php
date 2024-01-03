<?php include('connection.php'); 
session_start();
if(!$_SESSION["username"]){
  header('Location: signin.php');
}
// = "Ayodele"
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


<section id="pagebody" style="border: 1px solid red; height: 85vh; display: flex; align-items: center; justify-content: center;">

<div class="jumbotron text-center">
    <h1 class="display-2" style="font-weight: 500;">Shelton Tool-Hire</h1><br>
    <p id="welcometext">Empowering Your Projects, One Tool at a Time.</p>
    
</div>

</section>

     
   <?php include "footer.php" ?>
  </div>
  <script src="js/vendor.min.js"></script>
  <script src="js/elephant.min.js"></script>
  <script src="js/application.min.js"></script>

</body>

<!-- Mirrored from 111.68.112.228:443/public/store.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Nov 2023 00:43:56 GMT -->

</html>