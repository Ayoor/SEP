<?php
	session_start();
    include "connection.php";
	if(!isset($_SESSION["user"])){
		header("location:index.php");
	}
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shelton Tool | Profile</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <style>
        .logout_link{
            font-size: 17px;
            column-gap: 10px;
        }
        .card{
            width: 100%;
            border: 2px solid black;
            margin-top: 50px;
        }
        .card-heading{
            background-color: #d9d9d9;
            display: flex;
            flex-direction: row;
            justify-content: space-evenly;
            font-size: 20px;
            padding-top: 20px;
            padding-bottom: 20px;
        }
        .card-body{
            display: flex;
            flex-direction: column;
            padding: 20px;
        }
        .order-item{
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            border-bottom: 2px dotted black;
            padding: 10px;
        }
        .img-section{
            width: 20%;
            border: 2px solid grey;
            display: flex;
            flex-direction: row;
            justify-content: center;
            border-radius: 10px
        }
        .img-section img{
            height: 150px;
            width: 150px;
            max-width: 150px;
            max-height: 150px;
        }
        .desc-section{
            width: 70%;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            row-gap: 50px;
            padding-left: 30px;
        }
        .desc-section .desc{
            font-size: 20px;
            width: 50%;
        }
        .profile-spacer{
            display: flex;
            flex-direction: row;
            column-gap: 30px;
        }
    </style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__close">+</div>
        <ul class="offcanvas__widget">
            <li><span class="icon_search search-switch"></span></li>
            <li><a href="#"><span class="icon_heart_alt"></span>
                <div class="tip">2</div>
            </a></li>
            <li><a href="#"><span class="icon_bag_alt"></span>
                <div class="tip">2</div>
            </a></li>
        </ul>
        <div class="offcanvas__logo">
            <a href="./index.html"><img src="img/logo.png" alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__auth">
            <a href="#">Login</a>
            <a href="#">Register</a>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <?php
        include "includes/header.php";
    ?>
    <!-- Header Section End -->

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                        <span>Shopping cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Cart Section Begin -->
    <section class="shop-cart spad">
        <div class="container">
            <div class="profile-spacer">
                <a href="logout.php" class="logout_link">
                    <i class="fa fa-lock"></i>
                    <span>Logout</span>
                </a>
                <a href="profile.php" class="logout_link">
                    <i class="fa fa-shopping-cart"></i>
                    <span>My Orders</span>
                </a>
            </div> <br><br>
            <center><h2>My Orders</h2></center>
            <div class="row" data-container="container">
                <?php
                $user = $_SESSION["user"];
                $q = "select * from orders where user='$user' order by created_at desc";
                $res = mysqli_query($conn, $q);
                if(mysqli_num_rows($res)>0){
                while ($row = mysqli_fetch_array($res)) {
                    $timestamp = $row["created_at"];
                    $readable_date = date("F j, Y", strtotime($timestamp));
                    ?>
                    <div class="card">
                        <div class="card-heading">
                            <div class="order_meta_container">
                                <span><strong>Order ID: </strong><?php echo $row["id"] ?></span>
                            </div>
                            <div class="order_meta_container">
                                <span><strong>Order Date: </strong><?php echo $readable_date ?></span>
                            </div>
                            <div class="order_meta_container">
                                <span><strong>Order Status: </strong><?php echo $row["status"] ?></span>
                            </div>
                            <div class="order_meta_container">
                                <?php
                                $order_id = $row["id"];
                                $total = 0;
                                $user = $_SESSION["user"];
                                $q_items = "select * from order_items where order_id = '$order_id'";
                                $res_items = mysqli_query($conn, $q_items);
                                while ($row_items = mysqli_fetch_array($res_items)) {
                                    $product_id = $row_items["product"];
                                    $qty = $row_items["quantity"];

                                    $startDate = $row_items["start_date"];
                                    $endDate = $row_items["end_date"];
                                    $startDateTime = new DateTime($startDate);
                                    $endDateTime = new DateTime($endDate);

                                    // Calculate the difference between dates
                                    $interval = $startDateTime->diff($endDateTime);

                                    // Get the difference in days
                                    $daysDifference = $interval->days;

                                    $qProduct = "select * from equipments where id = '$product_id'";
                                    $resProduct = mysqli_query($conn, $qProduct);
                                    while ($rowProduct = mysqli_fetch_array($resProduct)) {
                                        $total += ($rowProduct["price"] * $qty * $daysDifference);
                                    }
                                }
                                ?>
                                <span><strong>Total: </strong> $<?php echo $total; ?></span>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php
                            $qOrdItem = "select * from order_items where order_id = '$order_id'";
                            $resOrdItem = mysqli_query($conn, $qOrdItem);
                            while ($rowOrdItem = mysqli_fetch_array($resOrdItem)) {
                                $product_id = $rowOrdItem["product"];

                                $startDate = $rowOrdItem["start_date"];
                                $endDate = $rowOrdItem["end_date"];
                                $startDateTime = new DateTime($startDate);
                                $endDateTime = new DateTime($endDate);

                                // Calculate the difference between dates
                                $interval = $startDateTime->diff($endDateTime);

                                // Get the difference in days
                                $daysDifference = $interval->days;

                                $qProduct = "select * from equipments where id = '$product_id'";
                                $resProduct = mysqli_query($conn, $qProduct);
                                while ($rowProduct = mysqli_fetch_array($resProduct)) {
                                    $imageSrc = 'data:image/' . 'jpg' . ';base64,' . base64_encode($rowProduct['equipmentImg']);

                                    ?>
                                    <div class="order-item">
                                        <div class="img-section">
                                            <img src="<?php echo $imageSrc ?>" alt="">
                                        </div>
                                        <div class="desc-section">
                                            <div class="desc">
                                                <span><strong>Item Name: </strong><?php echo $rowProduct['equipment_name'] ?></span>
                                            </div>
                                            <div class="desc">
                                                <span><strong>Item Price: </strong>$<?php echo $rowProduct['price'] ?></span>
                                            </div>
                                            <div class="desc">
                                                <span><strong>Item Qty: </strong><?php echo $rowOrdItem['quantity'] ?></span>
                                            </div>
                                            <div class="desc">
                                                <span><strong>Subtotal: </strong>$<?php echo ($rowProduct['price'] * $rowOrdItem["quantity"] * $daysDifference) ?></span>
                                            </div>
                                            <div class="desc">
                                                <span><strong>Rent Duration: </strong><?php echo $daysDifference ?> days</span>
                                            </div>
                                            <div class="desc">
                                                <a href="review.php?equipment_id=<?php echo $rowProduct['id'] ?>" class="btn btn-outline-primary">Add Review</a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                }}else{
                    echo '<center><h2>No Orders To Show</h2></center>';
                }
                ?>
            </div>
        </div>
    </section>
    <!-- Shop Cart Section End -->


    <!-- Footer Section Begin -->
    <?php
        include "includes/footer.php";
    ?>
    <!-- Footer Section End -->

    <!-- Search Begin -->
    <?php
        include "includes/search_modal.php";
    ?>
    <!-- Search End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>