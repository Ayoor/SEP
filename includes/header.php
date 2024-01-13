<header class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-lg-2">
                <div class="header__logo">
                    <a href="./index.php"><img src="img/logo-2.png" alt=""></a>
                </div>
            </div>
            <div class="col-xl-6 col-lg-7">
                <nav class="header__menu">
                    <ul>
                        
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__right">
                    <?php
                    if(!isset($_SESSION['user'])){
                    ?>
                    <div class="header__right__auth">
                        <a href="login.php">Login</a>
                        <a href="register.php">Register</a>
                    </div>
                    <?php } ?>
                    <ul class="header__right__widget">
                        <li><span class="icon_search search-switch"></span></li>
                        <?php
                        $cart_qty = 0;
                        if(isset($_SESSION["user"])){
                            $user = $_SESSION["user"];
                            $q = "select * from cart where user = '$user'";
                            $res = mysqli_query($conn, $q);
                            $cart_qty = mysqli_num_rows($res);
                        }
                        ?>
                        <li><a href="cart.php"><span class="icon_bag_alt"></span>
                            <div class="tip"><?php echo $cart_qty ?></div>
                        </a></li>
                        <?php
                        if(isset($_SESSION['user'])){
                        ?>
                        <li><a href="profile.php">
                            <i class="fa fa-user fa-lg"></i>
                        </a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="canvas__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>