<?php
include("db.php");
include("functions.php");
?>

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



            <div id="box">
                <input type="text" id="search" placeholder="Look at..">
                <i class="fa fa-search"></i>
            </div>


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

    <div class="slider">
        <div class="sliderLocation">
            <div class="slider">
                <a class="img-bir" href="images/11.png">
                    <img src="images/11.png" alt="resim">
                </a>
                <a class="img-iki" href="images/11.png">
                    <img src="images/masa1.png" alt="masa saati">
                </a>
                <a class="img-uc" href="images/11.png">
                    <img src="images/duvar2.png" alt="duvar saati">
                </a>
            </div>
        </div>
    </div>

    <br>


    <section class="featured-categories">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <img src="images/smallwall.png" alt="wall clock">
                </div>
                <div class="col-md-3">
                    <img src="images/smallwall2.png" alt="clock">
                </div>
                <div class="col-md-3">
                    <img src="images/smalldesk.png" alt="desk clock">
                </div>
                <div class="col-md-3">
                    <img src="images/smalldesk2.png" alt="desk clock">
                </div>
            </div>
        </div>
    </section>
    <br>



    <!-- ******************************************************* -->


    <section class="wall-clocks">
        <div id="site">
            <div class="container">
                <div class="title-box">
                    <h2 style="color: black">Wall Clocks</h2>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="product-top">
                            <img src="images/deskclock.png" alt="desk clock">
                            <div class="overlay-right">
                            </div>
                        </div>


                        <div class="product-bottom text-center">
                            <h3>Kids Alarm Clock Digital</h3>
                            <div class="product-description" data-name="Kids Alarm Clock Digital" data-price="12">

                                <p class="product-price">&dollar; 12</p>
                                <form class="add-to-basket" action="basket.html" method="post">
                                    <div>
                                        <label for="qty-2">Quantity</label>
                                        <input type="text" name="qty-2" id="qty-2" class="qty" value="1" />
                                    </div>
                                    <p><input type="submit" value="Add to basket" class="btn" /></p>
                                </form>

                            </div>
                        </div>
                    </div>



                    <div class="col-md-3">
                        <div class="product-top">
                            <img src="images/deskclock2.png">
                            <div class="overlay-right">
                            </div>
                        </div>


                        <div class="product-bottom text-center">
                            <h3>Fiolom Desk Clocks Pink</h3>
                            <div class="product-description" data-name="Fiolom Desk Clocks Pink" data-price="34">

                                <p class="product-price">&dollar; 34</p>
                                <form class="add-to-basket" action="basket.html" method="post">
                                    <div>
                                        <label for="qty-2">Quantity</label>
                                        <input type="text" name="qty-2" id="qty-2" class="qty" value="1" />
                                    </div>
                                    <p><input type="submit" value="Add to basket" class="btn" /></p>
                                </form>

                            </div>
                        </div>
                    </div>



                    <div class="col-md-3">
                        <div class="product-top">
                            <img src="images/deskclock3.png">
                            <div class="overlay-right">
                                </button>
                            </div>
                        </div>


                        <div class="product-bottom text-center">
                            <h3>SPACE HOTEL Clock Luxury</h3>
                            <div class="product-description" data-name="SPACE HOTEL Clock Luxury" data-price="20">
                                <p class="product-price">&dollar; 20</p>
                                <form class="add-to-basket" action="basket.html" method="post">
                                    <div>
                                        <label for="qty-2">Quantity</label>
                                        <input type="text" name="qty-2" id="qty-2" class="qty" value="1" />
                                    </div>
                                    <p><input type="submit" value="Add to basket" class="btn" /></p>
                                </form>

                            </div>
                        </div>
                    </div>



                    <div class="col-md-3">
                        <div class="product-top">
                            <img src="images/deskclock4.png">
                            <div class="overlay-right">
                                </button>
                            </div>
                        </div>


                        <div class="product-bottom text-center">
                            <h3>Bits and Pieces Clock</h3>
                            <div class="product-description" data-name="Bits and Pieces Clock" data-price="60">

                                <p class="product-price">&dollar; 60</p>
                                <form class="add-to-basket" action="basket.html" method="post">
                                    <div>
                                        <label for="qty-2">Quantity</label>
                                        <input type="text" name="qty-2" id="qty-2" class="qty" value="1" />
                                    </div>
                                    <p><input type="submit" value="Add to basket" class="btn" /></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <br>


                <h2 style="color: black">Desk Clock</h2>

                <div class="row">
                    <div class="col-md-3">
                        <div class="product-top">
                            <img src="images/deskclock.png" alt="desk clock">
                            <div class="overlay-right">
                            </div>
                        </div>


                        <div class="product-bottom text-center">
                            <h3>Kids Alarm Clock Digital</h3>
                            <div class="product-description" data-name="Kids Alarm Clock Digital" data-price="12">

                                <p class="product-price">&dollar; 12</p>
                                <form class="add-to-basket" action="basket.html" method="post">
                                    <div>
                                        <label for="qty-2">Quantity</label>
                                        <input type="text" name="qty-2" id="qty-2" class="qty" value="1" />
                                    </div>
                                    <p><input type="submit" value="Add to basket" class="btn" /></p>
                                </form>

                            </div>
                        </div>
                    </div>



                    <div class="col-md-3">
                        <div class="product-top">
                            <img src="images/deskclock2.png">
                            <div class="overlay-right">
                            </div>
                        </div>


                        <div class="product-bottom text-center">
                            <h3>Fiolom Desk Clocks Pink</h3>
                            <div class="product-description" data-name="Fiolom Desk Clocks Pink" data-price="34">

                                <p class="product-price">&dollar; 34</p>
                                <form class="add-to-basket" action="basket.html" method="post">
                                    <div>
                                        <label for="qty-2">Quantity</label>
                                        <input type="text" name="qty-2" id="qty-2" class="qty" value="1" />
                                    </div>
                                    <p><input type="submit" value="Add to basket" class="btn" /></p>
                                </form>

                            </div>
                        </div>
                    </div>
                    <br>




                    <div class="col-md-3">
                        <div class="product-top">
                            <img src="images/deskclock3.png">
                            <div class="overlay-right">
                                </button>
                            </div>
                        </div>


                        <div class="product-bottom text-center">
                            <h3>SPACE HOTEL Clock Luxury</h3>
                            <div class="product-description" data-name="SPACE HOTEL Clock Luxury" data-price="20">
                                <p class="product-price">&dollar; 20</p>
                                <form class="add-to-basket" action="basket.html" method="post">
                                    <div>
                                        <label for="qty-2">Quantity</label>
                                        <input type="text" name="qty-2" id="qty-2" class="qty" value="1" />
                                    </div>
                                    <p><input type="submit" value="Add to basket" class="btn" /></p>
                                </form>

                            </div>
                        </div>
                    </div>



                    <div class="col-md-3">
                        <div class="product-top">
                            <img src="images/deskclock4.png">
                            <div class="overlay-right">
                                </button>
                            </div>
                        </div>


                        <div class="product-bottom text-center">
                            <h3>Bits and Pieces Clock</h3>
                            <div class="product-description" data-name="Bits and Pieces Clock" data-price="60">

                                <p class="product-price">&dollar; 60</p>
                                <form class="add-to-basket" action="basket.html" method="post">
                                    <div>
                                        <label for="qty-2">Quantity</label>
                                        <input type="text" name="qty-2" id="qty-2" class="qty" value="1" />
                                    </div>
                                    <p><input type="submit" value="Add to basket" class="btn" /></p>
                                </form>
                            </div>
                        </div>
                    </div>
                    <br>

                    <?php

                    getPro();
                    ?>

                </div>
            </div>
        </div>
    </section>


    <section id="about">
        <div class="container">
            <div class="row">
                <h2>About Us</h2>
                <div class="about-content">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec volutpat, ipsum vitae pretium sodales,
                    felis libero lobortis elit, eget semper libero purus eget urna. Sed congue leo nec tempus luctus.
                    Fusce efficitur tristique mi.Proin quis consequat mauris. Cras fermentum ligula vel velit tempor laoreet.
                    Praesent sit amet velit est. Aenean porttitor fermentum rhoncus.

                </div>
                <br>

            </div>


            <section id="services">

                <div class="container">
                    <h1>Our Services</h1>
                    <div class="row services" >
                        <div class= "col-md-4 text-center">
                            <div class="icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <h3> 24/7 Support</h3>
                            <p>on order related queries</p>
                        </div>

                        <div class="col-md-4 text-center">
                            <div class="icon">
                                <i class="fa fa-shopping-basket"></i>
                            </div>
                            <h3> Return within 30 days</h3>
                            <p>of receiving your order</p>
                        </div>

                        <div class="col-md-4 text-center">
                            <div class="icon">
                                <i class="fa fa-truck"></i>
                            </div>
                            <h3>Get free delivery</h3>
                            <p>on orders above $99</p>
                        </div>
                    </div>
                </div>

            </section>





            <section id="contact">

                <div class="container">
                    <h1>Get In Touch</h1>
                    <div class="row">
                        <div class="col-md-6">
                            <form class="contact-form">
                                <div class="form-group">
                                    <label>
                                        <input type="text" class="form-control" placeholder="Name/Surname...">
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>
                                        <input type="number" class="form-control" placeholder="Phone Number...">
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>
                                        <input type="email" class="form-control" placeholder="Email...">
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>
                                        <textarea class="form-control" rows="4" placeholder="Message.."></textarea>
                                    </label>
                                </div>

                                <button type="submit" class="btn btn-primary" style="background-color: rosybrown; border: rosybrown">Submit</button>
                            </form>
                        </div>
                        <div class="col-md-6 contact-info">
                            <div class="follow"><b><i class="fa fa-map-marker"></i>  </b>Mugla Sitki Kocman University</div>
                            <div class="follow"><b><i class="fa fa-mobile"></i>  </b>(+90)75555555</div>
                            <div class="follow"><b><i class="fa fa-envelope"></i>  </b>clickclock@gmail.com</div>


                        </div>

                    </div>



                </div>

            </section>
        </div>
    </section>
</section>

</body>
</html>
