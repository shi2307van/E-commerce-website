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
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Home | Product</title>
    <style>
      .he{
      margin-left:150px;
      margin-top:100px;
      }
      i{
        margin-top:35px;
      }
    </style>
</head>
<body>
      <!-- <div class="navbar">
            <?php include_once "navbar.php";?>
        </div> -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
 
  <img src="https://i.pinimg.com/550x/d8/9f/9c/d89f9c1e19bb01a129b1f3f67925a745.jpg" width="100px" height="100px" alt="">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span ><i id="bar" class="fas fa-bars"></i></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-3">
      
      <li class="nav-item">
        <a class="nav-link" href="./home.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./profile.php">Account</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./product.php">Product</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./contactus.php">Contact us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./Registration.php">Registration</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Total Price :100/-</a>
      </li>
      <li class="nav-item">
        <i class="fa-solid fa-cart-shopping "><sup>1</sup></i>
      </li>
      <form class="form-inline" method="get">
        <input class="form-control mr-sm-2 " type="search" placeholder="Search" aria-label="Search" name="search_data">
        <input name="btnSer" value="Search" class="btn btn-outline-info my-2 my-sm-0" type="submit"></input>
      </form>
     
      <?php
    
     if(!isset($_SESSION['username'])){
      echo" <li class='nav-item log'>
      <a class='nav-link  ml-5 mb-4' href='./user_login.php'>Login</a>
    </li>";
     }
     else{
      echo" <li class='nav-item log'>
      <a class='nav-link ml-5' href='./user_logout.php'>Logout</a>
    </li>";
     }
     if(!isset($_SESSION['username'])){
      echo"  <p class='pin ml-5 mt-5' >Welcome Guest</p>";
     }
     else{
      echo" <p class='pin ml-5 mt-3'> Welcome </br>".$_SESSION['username']."</p>";
     }
     ?>
      
    </ul>
  
  </div>
</nav>
       <table>
        <tr>
        <div class="container">
            <div class="row imge">
                <img class="side" src="./img/Computer-Accessories-PNG-Photos.png" alt="">
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
                              <a href='#' class='btn btn-info'>Add to cart</a>
                              <a href='#' class='btn btn-secondary'>View More</a>
                            </div>
                       </div>
                    </div>";
                      }
                    }
                   
                    //search products
                    if(isset($_REQUEST['btnSer'])){
                    $search_data_v = $_REQUEST['search_data'];
                    $select_quy = "select * from tblproducts where product_keyword like '%$search_data_v%'";
                    $res = mysqli_query($con,$select_quy);
                    $numOfr = mysqli_num_rows($res);
                    if($numOfr==0){
                      echo "<h2 class='he text-center text-danger '> No Result Match Not Products Found!!!</h2>";
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
                            <a href='#' class='btn btn-info'>Add to cart</a>
                            <a href='#' class='btn btn-secondary'>View More</a>
                          </div>
                     </div>
                  </div>";
                    }
                  }
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



