<?php
$con = mysqli_connect("localhost","root","","costumer");

include("db.php");

?>

<DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewpoint" content="width=device-width,initial-scal=1.0">
        <title>Insert Product </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</head>
    <body>

    <div class="row">

        <div class="col-lg-12">

            <ol class="breadcrumb">

                <li class="active">

                    <i class="fa fa-dashboard"></i> Dashboard / Insert Products
                    <a href="logout.php">Log out</a>

                </li>

            </ol>

        </div>

    </div>

    <div class="row">

        <div class="col-lg-12">

            <div class="panel panel-default">

                <div class="panel-heading">

                    <h3 class="panel-title">

                        <i class="fa fa-money fa-fw"></i> Insert Product

                    </h3>

                </div>

                <div class="panel-body">

                    <form method="post" class="form-horizontal" enctype="multipart/form-data">

                        <div class="form-group">

                            <label class="col-md-3 control-label"> Product Title </label>

                            <div class="col-md-6">

                                <input name="product_title" type="text" class="form-control" required>

                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-md-3 control-label"> Category </label>

                            <div class="col-md-6">

                                <select name="category" class="form-control">

                                    <option> Select a Category </option>

                                    <?php

                                    $get_cat = "select * from category";
                                    $run_cat = mysqli_query($con,$get_cat);

                                    while ($row_cat=mysqli_fetch_array($run_cat)){

                                        $cat_id = $row_cat['cat_id'];
                                        $cat_title = $row_cat['cat_title'];

                                        echo "
                                  
                                  <option value='$cat_id'> $cat_title </option>
                                  
                                  ";

                                    }

                                    ?>

                                </select>

                            </div>

                        </div>

                        <!-- ++++++++++++++++++++++++++++++++++++++++++++++++++ -->
                        <div class="form-group">

                            <label class="col-md-3 control-label"> Product Image </label>

                            <div class="col-md-6">

                                <input name="product_img" type="file" class="form-control" required>

                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-md-3 control-label"> Product Price </label>

                            <div class="col-md-6">

                                <input name="product_price" type="text" class="form-control" required>

                            </div>

                        </div>


                        <div class="form-group">

                            <label class="col-md-3 control-label"> Product Description </label>

                            <div class="col-md-6">

                                <textarea name="product_desc" cols="30" rows="4" class="form-control"></textarea>
                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-md-3 control-label"></label>

                            <div class="col-md-6">

                                <input name="submit" value="Insert Product" type="submit" class="btn btn-primary form-control">






                                <!-- ++++++++++++++++++++++++++++++++++++++++++++++++++ -->
                       </form>
                    </div>
                 </div>
             </div>
        </div>



    </body>
    </html>

<?php

if(isset($_POST['submit'])){

    $product_title = $_POST['product_title'];
    $cat = $_POST['cat'];
    $product_price = $_POST['product_price'];
    $product_desc = $_POST['product_desc'];

    $product_img = $_FILES['product_img']['name'];
    $temp_name1 = $_FILES['product_img']['tmp_name'];
    move_uploaded_file($temp_name1,"images/$product_img");
    $insert_product = "insert into product (cat_id,date,product_title,product_img,product_price,product_desc) values ('$cat', NOW(), '$product_title', '$product_img', '$product_price', '$product_desc')";

    $run_product = mysqli_query($con,$insert_product);

    if($run_product){

        echo "<script>alert('Product has been inserted sucessfully')</script>";
        echo "<script>window.open('insert_product.php','_self')</script>";

    }
}

?>




