<!DOCTYPE html>
<html lang="en">
<head>
    <!DOCTYPE html>
    <html>
    <head>
        <title>ClickClock</title>
        <meta charset="utf-8" />
        <meta name="viewpoint" content="width=device-width,initial-scal=1.0">
        <meta http-equip="X-UA-compatible" content="ie=edge">
        <link rel="stylesheet" href="style.css"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script type="text/javascript" src="store.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </head>

<body>
<nav class="navbar navbar-expand-lg navbar-light">

    <button class="navbar-toggler" type="button" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="topnav">
        <div class="topnavcol">
            <img src="images/yy.png" alt="resim" style="width: 100%">
        </div>
    </div>


    <form>
        <div id="box">
            <input type="text" id="search" placeholder="Look at..">
            <i class="fa fa-search"></i>
        </div>
    </form>

    <div class="collapse navbar-collapse" id="navbarNav">

        <ul class="navbar-nav ml-auto">

            <li class="nav-item">
                <a style="color:black;" class="nav-link" href="register.php">Register</a>
            </li>

            <li class="nav-item">
                <a style="color:black;" class="nav-link" href="my_account.php">My Account</a>
            </li>

            <li class="nav-item">
                <a style="color:black;" class="nav-link" href="homepage.php">Products</a>
            </li>

            <li class="nav-item">
                <a style="color:black;" class="nav-link" href="basket.html">Basket</a>
            </li>

            <li class="nav-item">
                <a style="color:black;" class="nav-link" href="#about">About Us</a>
            </li>

            <li class="nav-item">
                <a style="color:black;" class="nav-link" href="#contact">Contact</a>
            </li>
        </ul>
    </div>
</nav>



<div id="content"><!-- #content Begin -->
    <div class="container"><!-- container Begin -->

        <div class="col-md-3"><!-- col-md-3 Begin -->

            <?php

            include("sidebar.php");

            ?>

        </div><!-- col-md-3 Finish -->

        <div class="col-md-9"><!-- col-md-9 Begin -->

            <div class="box"><!-- box Begin -->


                <?php

                if (isset($_GET['my_orders'])){
                    include("basket.html");
                }

                ?>

                <?php

                if (isset($_GET['edit_account'])){
                    include("edit_account.php");
                }

                ?>

                <?php

                if (isset($_GET['change_pass'])){
                    include("change_pass.php");
                }

                ?>

            </div><!-- box Finish -->

        </div><!-- col-md-9 Finish -->

    </div><!-- container Finish -->
</div><!-- #content Finish -->
</body>
</html>
