<?php
session_start();
include "connection.php";
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shelton Tool | Browse Marketplace</title>

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
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="shop__sidebar">
                        <div class="sidebar__categories">
                            <div class="section-title">
                                <h4>Categories</h4>
                            </div>
                            <div class="categories__accordion">
                                <div class="accordion" id="accordionExample">
                                    <?php
                                    $qCatSide = "select * from categories";
                                    $resCatSide = mysqli_query($conn, $qCatSide);
                                    while($rowCatSide = mysqli_fetch_array($resCatSide)){
                                    ?>
                                    <div class="card">
                                        <div class="card-heading">
                                            <a data-toggle="collapse" data-target="#collapse-<?php echo $rowCatSide['id'] ?>"><?php echo $rowCatSide["Name"] ?></a>
                                        </div>
                                        <div id="collapse-<?php echo $rowCatSide['id'] ?>" class="collapse" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <ul>
                                                    <?php
                                                    $category = $rowCatSide["id"];
                                                    $qEquipment = "select * from equipments where categoryID='$category'";
                                                    $resEquipment = mysqli_query($conn, $qEquipment);
                                                    while($rowEquipment = mysqli_fetch_array($resEquipment)){
                                                        echo '<li><a href="product-details.php?product='.$rowEquipment['id'].'">'.$rowEquipment["equipment_name"].'</a></li>';
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar__filter">
                            <div class="section-title">
                                <h4>Shop by price</h4>
                            </div>
                            <div class="filter-range-wrap">
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                data-min="33" data-max="99"></div>
                                <div class="range-slider">
                                    <form action="shop.php" method="get">
                                        <div class="price-input">
                                            <p>Price:</p>
                                            <input type="hidden" name="priceFilter" value="true">
                                            <input type="text" id="minamount" name="minPrice">
                                            <input type="text" id="maxamount" name="maxPrice">
                                        </div>
                                        <button type="submit" class="mt-2 btn btn-outline-primary d-flex flex-row align-items-center" style="column-gap:6px">
                                            <i class="fa fa-filter"></i>
                                            Filter
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <?php
                        if(isset($_REQUEST["category"])){
                            $category = $_REQUEST['category'];
                            $qCat = "select * from categories where id = '$category'";
                            $resCat = mysqli_query($conn, $qCat);
                            while($rowCat = mysqli_fetch_array($resCat)){
                                echo '<h2 class="mb-5">'.$rowCat['Name'].'</h2><hr>';
                            }
                        } else if(isset($_REQUEST["keyword"])){
                            $keyword = $_REQUEST["keyword"];
                            echo '<h2 class="mb-5">Showing Search Results for "'.$keyword.'"</h2><hr>';
                        } else if(isset($_REQUEST["priceFilter"])){
                            $minPrice = trim($_REQUEST["minPrice"]);
                            $maxPrice = trim($_REQUEST["maxPrice"]);
                            echo '<h2 class="mb-5">Showing Price Range Results between "'.$minPrice.'" and "'.$maxPrice.'"</h2><hr>';
                        }
                    ?>
                    
                    
                    <div class="row">
                        <?php
                        $q = '';
                        if(isset($_REQUEST["category"])){
                            $category = $_REQUEST['category'];
                            $q = "select * from equipments where categoryID = '$category'";
                        }else if(isset($_REQUEST["keyword"])){
                            $keyword = $_REQUEST["keyword"];
                            $q = "select * from equipments where equipment_name like '%$keyword%'";
                        }else if(isset($_REQUEST["priceFilter"])){
                            $minPrice =  intval(str_replace('$', '', trim($_REQUEST["minPrice"])));
                            $maxPrice = intval(str_replace('$', '', trim($_REQUEST["maxPrice"])));
                            $q = "SELECT * FROM equipments WHERE price BETWEEN '$minPrice' AND '$maxPrice';";
                        }
                        else{
                            $q = "select * from equipments";
                        }
                        $res = mysqli_query($conn, $q);
                        while($row = mysqli_fetch_array($res)){
                        $imageSrc = 'data:image/' . 'jpg' . ';base64,' . base64_encode($row['equipmentImg'])
                        ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="product__item shadow" >
                                <div class="product__item__pic set-bg" data-setbg="<?php echo $imageSrc; ?>">
                                    <ul class="product__hover">
                                        <li><a href="<?php echo $imageSrc; ?>" class="image-popup"><span class="arrow_expand"></span></a></li>
                                        <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                        <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="product-details.php?product=<?php echo $row['id'] ?>"><?php echo $row["equipment_name"]; ?></a></h6>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="product__price">£ <?php echo $row["price"]; ?></div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->

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