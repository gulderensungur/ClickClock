<?php

$db = mysqli_connect("localhost","root","","costumer");

function getPro(){

    global $db;

    $get_products = "select * from product order by 1 DESC LIMIT 0,6";

    $run_products = mysqli_query($db,$get_products);

    while($row_products=mysqli_fetch_array($run_products)){

        $pro_id = $row_products['product_id'];

        $pro_title = $row_products['product_title'];

        $pro_price = $row_products['product_price'];

        $pro_img1 = $row_products['product_img'];

        echo "
        
        <div class='col-md-4 col-sm-6 single'>
        
            <div class='product'>
            
                <a href='view_detail.php?pro_id=$pro_id'>
                
                    <img class='img-responsive' src='images/$pro_img1'>
                
                </a>
                
                <div class='text'>                
                    <h3>           
                        <a href='view_detail.php?pro_id=$pro_id'>
                            $pro_title
                        </a>
                    </h3>
                    
                    <p class='price'>
                        $ $pro_price
                    </p>
                 
                                            
                    <p class='button'>
                        <a class='btn btn-primary' href='basket.html?pro_id=$pro_id'>
                            Add to Basket
                        </a>
                    </p>
                
                </div>
            
            </div>
        
        </div>
        
        ";

    }

}

?>