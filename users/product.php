<?php
  include('../admin/includes/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/product.css">
    <link rel="stylesheet" href="./bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Home | Product</title>
    <style>
      .he{
      margin-left:150px;
      margin-top:100px;
      }
    </style>
</head>
<body>
      <div class="navbar">
            <?php include_once "navbar.php";?>
        </div>
       <table>
        <tr>
        <div class="container">
            <div class="row imge">
                <img class="side" src="./img/Computer-Accessories-PNG-Photos.png" alt="shiavni">
            </div>
          
        <h3 class="text-center"> Hidden Store </h3>
        <p class="text-center"> Communications is at the heart of e-commerce and community.</p>
        <div class="row ">
            <div class="col-md-3">
                   <ul  class="under">
                    <hr class="chr">
                    <li>
                        <a href="#" class="nav-link"><h2 class="cat">Catagories</h2></a>
                    </li>
                    <hr class="phr">
                    <?php
                       $select_cat="select * from `tblcategories`";
                       $result_cat=mysqli_query($con,$select_cat);
                       while($row_data=mysqli_fetch_assoc($result_cat)){
                          $cat_title=$row_data['categories_title'];
                          $cat_id=$row_data['categories_id'];
                          echo "<li class='me-auto text-center'>
                                    <a href='product.php?category=$cat_id' class='nav-link nl'> $cat_title </a>
                                </li >";
                       }
                    ?>
                    <hr class="chr">
                   </ul>
            </div>
            <div class="col-md-9">
                <div class="row">
                   <!-- fetch products -->
                  <?php
                    //check to isset or not
                    if(!isset($_REQUEST['category'])){
                    $select_pro = "select * from tblproducts order by rand()";
                    $res = mysqli_query($con,$select_pro);
                    while($rec=mysqli_fetch_array($res)){
                      $proid= $rec['product_id'];
                      $proTit=$rec['product_title'];
                      $proDesc=$rec['product_desc'];
                      $key=$rec['product_keyword'];
                      $price=$rec['product_price'];
                      $cat=$rec['categories_id'];
                      $img=$rec['prod_img1'];
                      echo " <div class='col-md-4 col-md-6 col-lg-4 mt-5'>
                      <div class='card'>
                          <img class='card-img-top' src='../admin/product_img/$img' alt='$proTit'>
                          <div class='card-body'>
                            <h5 class='card-title text-center'>$proTit</h5>
                            <p class='card-text text-center mb-0'>$proDesc</p>
                            <h4 class='card-price text-center'>$ $price</h4>
                          <div class='star text-center mt-0'>
                            <i class='fas fa-star'></i>
                            <i class='fas fa-star'></i>
                            <i class='fas fa-star'></i>
                            <i class='fas fa-star'></i>
                            <i class='fas fa-star'></i>
                          </div>
                            <a href='product.php?add_to_cart=$proid' class='btn btn-info'>Add to cart</a>
                            <a href='Product_dtl.php?product_id=$proid' class='btn btn-secondary'>View More</a>
                          </div>
                     </div>
                  </div>";
                    }
                  }

                    //get unique cataegory
                    if(isset($_REQUEST['category'])){
                      $catid = $_REQUEST['category'];
                      $select_pro = "select * from tblproducts where categories_id=$catid";
                      $res = mysqli_query($con,$select_pro);
                      $numOfr = mysqli_num_rows($res);
                      if($numOfr==0){
                        echo "<h2 class='he text-center text-danger '> No Stock For This Category</h2>";
                      }
                      while($rec=mysqli_fetch_array($res)){
                        $proid= $rec['product_id'];
                        $proTit=$rec['product_title'];
                        $proDesc=$rec['product_desc'];
                        $key=$rec['product_keyword'];
                        $price=$rec['product_price'];
                        $cat=$rec['categories_id'];
                        $img=$rec['prod_img1'];
                        echo " <div class='col-md-4 col-md-6 col-lg-4'>
                        <div class='card'>
                            <img class='card-img-top' src='../admin/product_img/$img' alt='$proTit'>
                            <div class='card-body'>
                              <h5 class='card-title text-center'>$proTit</h5>
                              <p class='card-text text-center mb-0'>$proDesc</p>
                              <h4 class='card-price text-center'>$ $price</h4>
                            <div class='star text-center mt-0'>
                              <i class='fas fa-star'></i>
                              <i class='fas fa-star'></i>
                              <i class='fas fa-star'></i>
                              <i class='fas fa-star'></i>
                              <i class='fas fa-star'></i>
                            </div>
                            <a href='product.php?add_to_cart=$proid' class='btn btn-info'>Add to cart</a>
                              <a href='Product_dtl.php?product_id=$proid' class='btn btn-secondary'>View More</a>
                            </div>
                       </div>
                    </div>";
                      }
                    }
                   

                    // cart function 
                   
                    if(isset($_REQUEST['add_to_cart'])){
                      $get_ip_add = getIPAddress(); 
                      $get_pro_id = $_REQUEST['add_to_cart'];
                      $selctCart = "select * from tblcart where ip_address='$get_ip_add' and product_id=$get_pro_id";
                      $result_cat=mysqli_query($con,$selctCart);
                      $num_of_row = mysqli_num_rows( $result_cat);
                      if($num_of_row>0){
                        echo "<script>alert('This Items Already Present inside Cart')</script>";
                        echo "<script>window.open('product.php','_self')</script>";
                      }
                      else{
                        $insertCat ="insert into tblcart values ($get_pro_id,'$get_ip_add'
                        ,0)";
                        $result_cat=mysqli_query($con,$insertCat);
                        echo "<script>alert('Item is added to Cart')</script>";
                        echo "<script>window.open('product.php','_self')</script>";
                      }
                     
                    }
 
                    
                  

                      // total cart price 

                     
                  ?>
                   
                    <!-- colse col-md-4 -->
                  </div>
                  <!-- close row -->
            </div>
            <!-- close col-md-9 -->
        </div>
        <!-- close row -->
    </div>
    <!-- close container -->
        </tr>
        <tr>
             
    <div class="footer">
            <?php include_once "footer.html";?>
     </div>  
        </tr>
    </table>
  
</body>
</html>



