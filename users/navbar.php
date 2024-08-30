<?php
  include('../admin/includes/connect.php');
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="">
    <style>
      .log{
        margin-left: 50px;
      }
      .pin{
        margin-top:30px;
        margin-left:50px;
      }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
 
  <img class="ml-5"  src="https://i.pinimg.com/550x/d8/9f/9c/d89f9c1e19bb01a129b1f3f67925a745.jpg" width="100px" height="100px" alt="">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span ><i id="bar" class="fas fa-bars"></i></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-3">
      
      <li class="nav-item">
        <a class="nav-link" href="./home.php">Home</a>
      </li>
    
      <li class="nav-item">
        <a class="nav-link" href="./product.php">Product</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./contactus.php">Contact us</a>
      </li>
      <?php
        if(!isset($_SESSION['username'])){
          echo"
          <li class='nav-item'>
          <a class='nav-link' href='./Registration.php'>Registration</a>
        </li>";
        }
        else{
          echo"  
          <li class='nav-item'>
          <a class='nav-link' href='./profile.php'>Account</a>
        </li>";
        }
      ?>
     
      <li class="nav-item">
        <a class="nav-link" href="">Total Price :<?php
           function getIPAddress() {  
            //whether ip is from the share internet  
            if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                        $ip = $_SERVER['HTTP_CLIENT_IP'];  
                }  
            //whether ip is from the proxy  
            elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
            }  
        //whether ip is from the remote address  
            else{  
                    $ip = $_SERVER['REMOTE_ADDR'];  
            }  
            return $ip; 
          }
          $get_ip_add = getIPAddress();
          $total=0;
          $cart_query = "select * from tblcart where ip_address='$get_ip_add'";
          $result_cat=mysqli_query($con,$cart_query);
          while($row = mysqli_fetch_array($result_cat)){
            $pro_id=$row['product_id'];
            $selectPro="select * from tblproducts where product_id='$pro_id'";
            $result_pro=mysqli_query($con,$selectPro);
            while($row_pro_pr=mysqli_fetch_array($result_pro)){
                $pro_price=array($row_pro_pr['product_price']);
                $pro_value=array_sum($pro_price);
                $total+=$pro_value;
            }
          }
          echo $total;
        ?>/-</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cart.php"> 
        <i class="fa-solid fa-cart-shopping"></i><sup><?php 
         if(isset($_REQUEST['add_to_cart'])){
          global $con;
          $get_ip_add = getIPAddress(); 
          $selctCart = "select * from tblcart where ip_address='$get_ip_add' ";
          $result_cat=mysqli_query($con,$selctCart);
          $count_item = mysqli_num_rows( $result_cat);
        }
          else{
            global $con;
          $get_ip_add = getIPAddress(); 
          $selctCart = "select * from tblcart where ip_address='$get_ip_add' ";
          $result_cat=mysqli_query($con,$selctCart);
          $count_item = mysqli_num_rows( $result_cat);
          }
         echo  $count_item;
        ;?></sup></a>
      </li>
      <form class="form-inline" action="search.php" method="get">
        <input class="form-control ml-0" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <input name="btnSer" value="Search" class="btn btn-outline-info " type="submit"></input>
      </form>
     <?php
    
     if(!isset($_SESSION['username'])){
      echo" <li class='nav-item log'>
      <a class='nav-link ml-0' href='./user_login.php'>Login</a>
    </li>";
     }
     else{
      echo" <li class='nav-item log'>
      <a class='nav-link ml-0' href='./logout.php'>Logout</a>
    </li>";
  
     }
     if(!isset($_SESSION['username'])){
      echo"  <p class='pin'>Welcome Guest</p>";
     }
     else{
      echo" <p class='pin'> Welcome </br>".$_SESSION['username']."</p>";
     }
     ?>
     
    </ul>
  
  </div>
</nav>
</body>
</html>