
<?php include('connection.php'); 
session_start();
if(!$_SESSION["username"]){
  header('Location: signin.php');
}
// = "Ayodele"
$equipment = $_GET['equipmentname'];
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from 111.68.112.228:443/public/store.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Nov 2023 00:43:16 GMT -->

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $equipment ?></title>
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
  <link rel="stylesheet" href="css/store.min.css">
</head>

<body class="layout layout-header-fixed">
  <?php
  include 'topnav.php';
  ?>
  <div class="layout-main">
    <?php
    include 'sidebar.php';
    ?>
    <div class="layout-content">
      <div class="layout-content-body">
        <div class="title-bar">
          <div class="title-bar-actions">
            <div class="btn-group">
              <button class="btn btn-default btn-sm hidden-md hidden-lg" data-toggle="modal" data-target="#filters" type="button">
                <span class="icon icon-filter icon-lg icon-fw"></span>
                Filter
              </button>
            </div>
          </div>
          <h1 class="title-bar-title">
            <span class="d-ib"><?php echo $_GET['equipmentname'] ?></span>

          </h1>
        </div>
        <div class="store">
          <div class="store-sidebar">

          </div>


          <?php
          
          $equipment = $_GET['equipmentname'];
          $query = "SELECT equipment_name, price, Stock_Balance balance, `availability`, equipmentImg FROM `equipments` WHERE equipment_name = '$equipment'";
          // echo $query;
          $result = mysqli_query($conn, $query);

          if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
              $equipmentName = htmlspecialchars($row['equipment_name']);
              $currentPrice = htmlspecialchars($row['price']);
              $availability = htmlspecialchars($row['availability']);
              $balance = htmlspecialchars($row['balance']);
              $imageSrc = 'data:image/' . 'jpg' . ';base64,' . base64_encode($row['equipmentImg'])
          ?>
             
                <div class="row">
                  <div class="col-xs-12">
                    <ul class="products">
                      <li class="product">
                        <div class="product-image">
                          <a class="overlay" href="#">
                            <div class="overlay-image">
                              <img class="img-responsive" src="<?php echo $imageSrc; ?>" alt="<?php echo $equipmentName; ?>">
                               </div>
                            <div class="overlay-content overlay-top">
                              <span class="label label-success pull-right"><?php echo $balance ."pcs left" ?></span>
                            </div>
                          </a>
                        </div>
                        <div class="product-details">
                          <h5 class="product-name">
                            <a class="link-muted" href="#"><?php echo $equipmentName; ?></a>
                          </h5>
                          <span class="product-rating">
                            <!-- Your rating HTML goes here -->
                          </span>
                          <span class="product-price">
                            <span class="product-price-current">£<?php echo $currentPrice; ?> / Day</span>
                          </span>
                          <br>
                          <span class="divider">
                            <span><button class="btn-outline-primary" onclick="window.location.href='deleteequipment.php?equipmentname=<?php echo $equipmentName ?>';">Delete</button></span>
                            <span><button class="btn-outline-warning" onclick="window.location.href='editequipment.php?equipmentname=<?php echo $equipmentName ?>';">Edit</button></span>
                            <!-- Add your other buttons here -->
                          </span>
                        </div>
                      </li>
                    </ul>
                  </div>
              
              </div>
          <?php
            }
          } else {
            echo "Error executing the query: " . mysqli_error($conn);
          }

          // Close the database connection
          mysqli_close($conn);
          ?>



        </div>
      </div>
    </div>
    <?php
    include "footer.php";
    ?>
  </div>
  <script src="js/vendor.min.js"></script>
  <script src="js/elephant.min.js"></script>
  <script src="js/application.min.js"></script>

</body>

<!-- Mirrored from 111.68.112.228:443/public/store.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Nov 2023 00:43:56 GMT -->

</html>