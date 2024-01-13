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
    <title>Shelton Tool | Cart</title>

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
            <?php
                if(isset($_REQUEST["deleted"])){
                    ?>
                    <div class="alert alert-success">
                        Success! equipment has been removed from cart
                    </div>
                    <?php
                } else if(isset($_REQUEST["updated"])){
                    ?>
                    <div class="alert alert-success">
                        Success! equipment quantity has been updated successfully
                    </div>
                    <?php
                }else if(isset($_REQUEST["quantity_difference"])){
                    ?>
                    <div class="alert alert-danger">
                        Sorry! Selected Quantity is not available for this product
                    </div>
                    <?php
                }else if(isset($_REQUEST["order_placed"])){
                    ?>
                    <div class="alert alert-success">
                        Congratulations! Your order has been placed successfully. you can check it in your profile
                    </div>
                    <?php
                }
            ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Days</th>
                                    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $user = $_SESSION["user"];
                                $qCart = "select * from cart where user = '$user'";
                                $resCart = mysqli_query($conn, $qCart);
                                $total = 0;
                                if(mysqli_num_rows($resCart)>0){
                                    while($rowCart = mysqli_fetch_array($resCart)){
                                        $product = $rowCart["product"];

                                        $qProduct = "select * from equipments where id = '$product'";
                                        $resProduct = mysqli_query($conn, $qProduct);
                                        while($rowProduct = mysqli_fetch_array($resProduct)){
                                            $name = $rowProduct["equipment_name"];
                                            $imageSrc = 'data:image/' . 'jpg' . ';base64,' . base64_encode($rowProduct['equipmentImg']);
                                ?>
                                        <tr>
                                            <td class="cart__product__item">
                                                <img src="<?php echo $imageSrc; ?>" alt="" height="100px">
                                                <div class="cart__product__item__title">
                                                    <h6><?php echo $name; ?></h6>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <?php
                                                $startDate = $rowCart["start_date"];
                                                $endDate = $rowCart["end_date"];
                                                $startDateTime = new DateTime($startDate);
                                                $endDateTime = new DateTime($endDate);

                                                // Calculate the difference between dates
                                                $interval = $startDateTime->diff($endDateTime);

                                                // Get the difference in days
                                                $daysDifference = $interval->days;
                                                echo $daysDifference." days";
                                                ?>
                                            </td>
                                            <td class="cart__price" style="padding-left:30px">$ <?php echo $rowProduct['price']; ?></td>
                                            <form action="backend/update_cart_qty.php" method="post">
                                            <td class="cart__quantity d-flex justify-content-center align-items-center mt-4">
                                                    <div class="pro-qty">
                                                        <input type="number" name="qty" max="<?php echo $rowProduct["Stock_Balance"] ?>" value="<?php echo $rowCart['qty'] ?>" required>
                                                    </div>
                                                    <input type="hidden" name="id" value="<?php echo $product; ?>">
                                                    <button class="btn-danger" type="submit">
                                                        <i class="fa fa-solid fa-check "></i>
                                                    </button>
                                                </td>
                                            </form>
                                           <?php
                                           $subtaotal = $daysDifference * $rowProduct["price"] * $rowCart["qty"];
                                           $total += $subtaotal;
                                           ?>
                                            <td class="cart__total">$ <?php echo $subtaotal ?></td>
                                            <td class="cart__close">
                                                <a href="backend/remove_from_cart.php?id=<?php echo $rowCart['id'] ?>"><span class="icon_close"></span></a>
                                            </td>
                                        </tr>
                                <?php
                                        }
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn">
                        <a href="shop.php">Continue Shopping</a>
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-lg-6">
                </div>
                <div class="col-lg-4 offset-lg-2">
                    <div class="cart__total__procced">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Subtotal <span>$ <?php echo $total; ?></span></li>
                            <li>Total <span>$ <?php echo $total; ?></span></li>
                        </ul>
                        <a href="checkout.php" class="primary-btn">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Cart Section End -->

    <!-- Instagram Begin -->
    <div class="instagram">
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
    </div>
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