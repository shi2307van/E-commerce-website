<?php
  include('../admin/includes/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/product_detl.css">
    <link rel="stylesheet" href="./bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>View More</title>
</head>
<body>

                        <?php    
                          if (isset($_REQUEST['product_id'])){
                            $Prodcut_id = $_REQUEST['product_id'];
                            $select_pro = "select * from tblproducts where product_id=$Prodcut_id";
                            $res = mysqli_query($con,$select_pro);
                            while($rec=mysqli_fetch_array($res)){
                                $proid= $rec['product_id'];
                                $proTit=$rec['product_title'];
                                $proDesc=$rec['product_desc'];
                                $price=$rec['product_price'];
                                $img=$rec['prod_img1'];
                                echo " <div class='small-container single-product'>
                                            <div class='row'>
                                                    <div class='col-6'>
                                                            <img src='../admin/product_img/$img' width='100%' height='400px' id='productImg'>
                                                    </div>

                                                    <div class='col-6 mt-5'>
                                                             <h4>Home/Product Page</h4>
                                                             <h2>$proTit</h2>
                                                             <div class='star mt-0'>
                                                                <i class='fas fa-star'></i>
                                                                <i class='fas fa-star'></i>
                                                                <i class='fas fa-star'></i>
                                                                <i class='fas fa-star'></i>
                                                                <i class='fas fa-star'></i>
                                                             </div>
                                                                <h3 class='h32'>$ $price</h3>
                                                                <h3>Product details</h3>
                                                                <p>$proDesc</p>
                                                                <span>Qunatity :-</span><input type='number' value='1'> <br> <br>
                                                                <a href='' class='btn btn-danger pr-5 pl-5'>Add to Cart</a>
                                                                <br><br>
                                                
                                                     </div>
                                             </div>
                                     </div> " ;
                              }
                            } 
                         
                        ?>
</body>
</html>
   