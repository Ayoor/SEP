<?php
	session_start();
    include "connection.php";
	if(!isset($_SESSION["user"])){
		header("location:index.php");
	}
    $equipment_id = $_REQUEST["equipment_id"];
    $prodQ = "select * from equipments where id = '$equipment_id'";
    $resprod = mysqli_query($conn, $prodQ) or die(mysqli_error($conn));
    $product_name = '';
    while($rowProd = mysqli_fetch_array($resprod)){
        $product_name = $rowProd["equipment_name"];
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
    <title>Shelton Tool | Add Review</title>

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
        .fa-solid{
            color: gold;
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
            <center>
                <h2> Order Review </h2>
            </center>
            <br>
            <div clas="row">
                <form action="backend/add_review.php" method="post" id="myform">
                        <?php if(isset($_REQUEST["review-added"])){ ?>
                                <div class="mb-3 alert alert-primary" role="alert">
                                    <center> <font color="black"> Thanks for your Feedback. Review Has Been Submitted Successfully </font></center>
                                </div>
                        <?php } ?>

                    <div class="mb-3">
                        <strong> Item Name:  </strong> &nbsp;&nbsp;&nbsp; <?php echo $product_name; ?><br>
                    </div>
                    <?php
                        //checking if user is already reviewd same product or not before that we will initialize some
                        // dummy data variables 
                        $review = '';
                        $product_name = '';
                        $user = $_SESSION["user"];
                        $q = "select * from review where product = '$equipment_id' and user = '$user'";
                        $res = mysqli_query($conn, $q) or die(mysqli_error($conn));
                        $review_added = false;
                        if(mysqli_num_rows($res)>0){
                            while($row = mysqli_fetch_array($res)){
                                $review = $row["review"];
                            }
                            $review_added = true;
                        }
                    ?>
                    <div class="mb-3">
                        <label for="" class="form-label">Add Your Review</label>
                        <textarea class="form-control" rows="3" name="review"><?php echo $review; ?></textarea>
                    </div>
                    <input type="hidden" name="product_id" value="<?php echo $equipment_id; ?>">
                    <input type="hidden" name="review_added" value="<?php echo $review_added; ?>">

                    <div class="mb-3">
                        <label for="" class="form-label">Choose a Rating</label>
                        <div class="stars-container">
                        <i class="fa fa-regular fa-star fa-lg star-rate star-1" data-id="1"></i>
                        <i class="fa fa-regular fa-star fa-lg star-rate star-2" data-id="2"></i>
                        <i class="fa fa-regular fa-star fa-lg star-rate star-3" data-id="3"></i>
                        <i class="fa fa-regular fa-star fa-lg star-rate star-4" data-id="4"></i>
                        <i class="fa fa-regular fa-star fa-lg star-rate star-5" data-id="5"></i>
                        </div>
                        <input type="hidden" class="trash">
                        <input type="hidden" class="rating" name="rating"> <br>
                    </div>
                    <div class="row">
                        <div class="col-lg-5">
                            <input type="submit" class="btn btn-danger" value="Review Now"> 
                        </div>
                    </div>
                </form>
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
<script>
    const trash = document.querySelector(".trash")
    const rating = document.querySelector(".rating")
    const form = document.querySelector("#myform")
    const star_rates = document.querySelectorAll(".star-rate")
    const stars_container = document.querySelector(".stars-container")
    star_rates.forEach(star => {
        star.addEventListener("mouseover", function(e){
            fill_hover_stars(e.target.getAttribute("data-id"))
            trash.value = "non"
        })
        star.addEventListener("click", function(e){
            fill_hover_stars(e.target.getAttribute("data-id"))
            trash.value = "filled"
        })
    });

    function fill_hover_stars(data_id){
        make_stars_regular();
        data_id = parseInt(data_id)
        for( first_star = 1 ; first_star<= data_id ; first_star++){
            star_class = ".star-"+first_star;
            star = document.querySelector(star_class);
            star.classList.remove("fa-regular")
            star.classList.add("fa-solid")
        }
    }

    function make_stars_regular(){
        star_rates.forEach(star => {
        star.classList.remove("fa-solid")
        star.classList.add("fa-regular")
    });
    }

    if(trash.value == "non"){
        stars_container.addEventListener("mouseleave", function(e) {
        make_stars_regular()
    });
    }

    form.addEventListener("submit", function(e){
        e.preventDefault();
        stars = 0;
        star_rates.forEach((star) => {
            if (star.classList.contains("fa-solid")) {
                stars += 1;
            }
        });
        rating.value= stars
        form.submit();
    })
</script>
</html>