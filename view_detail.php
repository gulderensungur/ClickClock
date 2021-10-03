<DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewpoint" content="width=device-width,initial-scal=1.0">
        <title>View Details </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script type="text/javascript" src="store.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
    <section id="navigationbar">
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

    </section>



        <div class="col-md-9"><!-- col-md-9 Begin -->
            <div id="productMain" class="row"><!-- row Begin -->
                <div class="col-sm-6"><!-- col-sm-6 Begin -->
                    <div id="mainImage"><!-- #mainImage Begin -->
                        <div class="item">
                            <center><img class="img-responsive" src="images/masa1.png" alt="Product 3-b"></center>
                        </div>

                    </div><!-- mainImage Finish -->
                </div><!-- col-sm-6 Finish -->


                <div class="col-sm-6"><!-- col-sm-6 Begin -->
                    <div class="box"><!-- box Begin -->
                        <label for="" class="col-md-5 control-label"><big><b>World Sphere Desk Clock</b></big></label>


                        <form action="view_detail.php" class="form-horizontal" method="post"><!-- form-horizontal Begin -->
                            <div class="form-group"><!-- form-group Begin -->
                                <label for="" class="col-md-5 control-label">Products Quantity</label>

                                <div class="col-md-7"><!-- col-md-7 Begin -->
                                    <select name="product_qty" id="" class="form-control"><!-- select Begin -->
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select><!-- select Finish -->

                                </div><!-- col-md-7 Finish -->

                            </div><!-- form-group Finish -->


                            <p class="price">$50</p>
                        </form><!-- form-horizontal Finish -->
                        <form class="add-to-basket" action="basket.html" method="post">

                        <p><input type="submit" value="Add to basket" class="btn" /></p>
                        </form>

                    </div><!-- box Finish -->

                </div><!-- col-sm-6 Finish -->
            </div>



            <div class="box" id="details"><!-- box Begin -->
                <br>
                <br>

               <label for="" class="col-md-7 control-label"><big><b>Product Description</b></big></label>

                <p>

                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione praesentium ipsum accusantium facere nulla, beatae vitae consequatur enim et nesciunt possimus doloribus omnis dolorum, ea quibusdam excepturi asperiores, temporibus! Consequatur?

                </p>

            </div>
            </div>



















    </body>
    </html>