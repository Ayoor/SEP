<?php
    session_start();
    include "connection.php";
    if(!isset($_REQUEST["product"])){
        header("location:./shop.php");
        exit();
    }
    $product_id = $_REQUEST["product"];

    function count_rating($product_id) {
        global $conn;
        $q = "SELECT * FROM review WHERE product = '$product_id'";
        $res = mysqli_query($conn, $q);
        return mysqli_num_rows($res);
     }
     function calculate_rating($product_id) {
        global $conn;
        $rating = null;
        $q = "SELECT * FROM review WHERE product = '$product_id'";
        $res = mysqli_query($conn, $q);
    
        if (mysqli_num_rows($res) == 0) {
            $rating = 0;
        } else {
            $ratings = [];
            while ($row = mysqli_fetch_assoc($res)) {
                $ratings[] = (int)$row['rating'];
            }
            $rating = array_sum($ratings) / count($ratings);
        }
    
        $rating = sprintf("%.1f", $rating);
    
        return $rating;
    }
    
    function count_custom_Rating($product_id, $rating){
        global $conn;
        $q = "SELECT * FROM review WHERE product = '$product_id' and rating = '$rating'";
        $res = mysqli_query($conn, $q);
        return mysqli_num_rows($res);
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
    <title>Shelton Tool | Product Details</title>

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
        .prod_img{
            max-width: 300px;
            max-height: 400px;
        }
        .item_qty_value{
            padding-left: 20px;
            height:37px;
        }
        .btn_qty_change{
            background-color: rgb(238, 236, 236);
            width:40px;
            border:none;
        }
        .btn_qty_change:hover{
            background-color: rgb(223, 223, 223);
        }
        .item_qty_value:focus{
            outline:none;
            border:none;
        }
        .shell{
            width: 200px;
            height: 15px;
            border: 1px solid gold;
            margin-left: 20px;
            margin-right: 20px;
        }
        .filler{
            height: 100%;
            background-color: gold;
        }
        .rating-count-details{
            font-size: 19px;
            margin-top: -8px;
        }
        .review-container{
            background-color: rgb(240, 238, 236);
            padding: 5px;
            padding-left: 20px;
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
        }
        .review-img-container{
            border-radius: 50%;
        }
        .fa-solid{
            color:gold;
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
                        <a href="shop.php">Shop </a>
                        <span>Essential structured blazer</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <?php
                $q = "select * from equipments where id = '$product_id'";
                $res = mysqli_query($conn, $q) or die(mysqli_error($conn));
                while($row = mysqli_fetch_array($res)){
                    $equipmentId = $row["id"];
                    $equipment_name = $row["equipment_name"];
                    $description = $row["description"];
                    $Stock_Balance = $row["Stock_Balance"];
                    $availability = $row["availability"];
                    $imageSrc = 'data:image/' . 'jpg' . ';base64,' . base64_encode($row['equipmentImg']);
                    $price = $row["price"];
                }
                ?>
                <div class="col-lg-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__left product__thumb nice-scroll">
                            <?php
                            for ($i=0; $i < 4; $i++) {
                                ?>
                                <a class="pt active" href="#product-1">
                                    <img src="<?php echo $imageSrc ?>" alt="">
                                </a>
                                <?php
                            }
                            ?>

                        </div>
                        <div class="product__details__slider__content">
                            <div class="product__details__pic__slider owl-carousel">
                                <?php
                                for ($i=1; $i < 5; $i++) {
                                ?>
                                <img data-hash="product-<?php echo $i ?>" class="product__big__img" src="<?php echo $imageSrc ?>" alt="">
                                <?php
                                }
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product__details__text">
                        <h3><?php echo $equipment_name ?> </h3>
                        <?php
                            $ratings = calculate_rating($product_id);
                            $ratings = (int)$ratings;
                            $empty = 5 - $ratings;
                            for ($i = 0; $i < $ratings; $i++) {
                                echo '<i class="fa fa-solid fa-star fa-lg" style="color: gold"></i>';
                            }

                            for ($i = 0; $i < $empty; $i++) {
                                echo '<i class="fa fa-solid fa-star fa-lg" style="color:#e8e8e8"></i>';
                            }

                            echo ' (' . count_rating($product_id) . ')';
                            ?>
                            <br><br>
                        <div class="product__details__price">£ <?php echo $price ?></div>
                        <p><?php echo $description ?></p>
                        <form action="backend/add_to_cart.php" method="post">
                        <div class="product__details__button">
                            <div class="quantity">
                                <span>Quantity:</span>
                                <div class="pro-qty" >
                                    <input type="number" name="qty" value="1" min="1" max="<?php echo $Stock_Balance ?>">
                                </div>
                            </div>
                        </div>
                        <p class="text-danger">You will be charged &nbsp; &nbsp;&nbsp; £ <?php echo $price ?> per day</p>
                        <input type="hidden" name="id" value="<?php echo $equipmentId ?>">
                        <strong>Rent Period</strong>
                        <?php
                            if(isset($_REQUEST["wrong_date"])){
                                echo '<p class="text-danger">Start Date Should be less than End Date</p>';
                            }
                        ?>
                        <?php
                            if($availability == "available"){
                        ?>
                        <div class="product__details__button">
                           <div class="d-flex align-items-center" style="gap:10px">
                                Rent Start Date
                                <input type="date" name="startDate" class="form-control" style="width:150px" required>
                           </div>
                        </div>
                        <div class="product__details__button">
                           <div class="d-flex align-items-center" style="gap:10px">
                                Rent End Date
                                <input type="date" name="endDate" class="form-control" style="width:150px" required>
                           </div>
                        </div>
                        <div class="product__details__button">
                           <div class="d-flex align-items-center" style="gap:10px">
                                <button type="submit" class="cart-btn" style="margin:0px"><span class="icon_bag_alt"></span> Add to cart</button>
                           </div>
                        </div>
                        <?php } ?>
                        </form>
                        <div class="product__details__widget">
                            <ul>
                                <li>
                                    <span>Availability:</span>
                                    <div class="stock__checkbox">
                                        <label for="stockin">
                                            <?php
                                            if($availability == "available"){
                                                echo 'In Stock';
                                            }else{
                                                echo "<p class='text-danger'> Out of Stock </p>";
                                            }
                                            ?>
                                        </label>
                                    </div>
                                </li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Reviews</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <h6>Description</h6>
                                <p><?php echo $description; ?></p>
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <h6>Reviews</h6>
                                <!-- ////////////////// -->
                                    <div class="row justify-content-center mb-5 mt-5" style="width:80%;margin:0 auto">
                                        <?php
                                            $reviewq = "SELECT * from review where product = '$product_id'";
                                            $resreview = mysqli_query($conn, $reviewq);
                                            while($rowReview = mysqli_fetch_array($resreview)) {
                                                $posted_on = $rowReview["posted_on"];
                                                $timestamp = strtotime($posted_on);
                                                $readableDate = date("F j, Y", $timestamp);
                                                $rating_filled = $rowReview["rating"];
                                                $rating_empty = 5 - $rating_filled;

                                                $revUser = $rowReview["user"];
                                                $qUser = "select * from users where id = '$revUser'";
                                                $resuSER = mysqli_query($conn, $qUser);

                                                $user_fname = "";
                                                while($rowUser = mysqli_fetch_array($resuSER)){
                                                    $user_fname = $rowUser["firstname"];
                                                }
                                            ?>
                                            <div class="col-lg-10 mt-5">
                                                <div class="row">
                                                    <div class="col-lg-3 text-light review-img-container">
                                                    <center>
                                                        <div class="img-div">
                                                            <img src="img/user.png" alt="" style="height:80px">
                                                        </div>
                                                    </center>
                                                </div>
                                                <div class="col-lg-7 review-container">
                                                    <div class="d-flex" style="justify-content:space-between;border-bottom:1px solid black;padding-bottom:5px; margin-bottom:5px">
                                                        <div>
                                                            <strong> <?php echo $user_fname ?></strong>
                                                            &nbsp;&nbsp; <font class="date_review"> Posted: <?php echo $readableDate; ?></font>
                                                                <?php for($i = 0; $i< $rating_filled; $i++){ ?>
                                                                    <i class="fa fa-solid fa-star"></i>
                                                                <?php } ?>
                                                                <?php for($i = 0; $i< $rating_empty; $i++){ ?>
                                                                    <i class="fa fa-regular fa-star"></i>
                                                                <?php } ?>
                                                        </div>
                                                        
                                                    </div>
                                                    <?php echo $rowReview["review"] ?>
                                                </div>
                                            </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <hr>
                                <!-- ///////////////// -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="related__title">
                        <h5>RELATED PRODUCTS</h5>
                    </div>
                </div>
                <?php
                $q = "select * from equipments order by rand() limit 4";
                $res = mysqli_query($conn, $q);
                while($ROW = mysqli_fetch_array($res)){
                    $relImg = 'data:image/' . 'jpg' . ';base64,' . base64_encode($ROW['equipmentImg']);
                ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="<?php echo $relImg ?>">
                            <ul class="product__hover">
                                <li><a href="<?php echo $relImg ?>" class="image-popup"><span class="arrow_expand"></span></a></li>
                                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="product-details.php?product=<?php echo $ROW['id'] ?>"><?php echo $ROW['equipment_name'] ?></a></h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">£<?php echo $ROW['price'] ?></div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Instagram Begin -->
    <!-- <div class="instagram">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="img/instagram/insta-1.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ ashion_shop</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="img/instagram/insta-2.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ ashion_shop</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="img/instagram/insta-3.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ ashion_shop</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="img/instagram/insta-4.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ ashion_shop</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="img/instagram/insta-5.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ ashion_shop</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="img/instagram/insta-6.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ ashion_shop</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Instagram End -->

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