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
    <link rel="stylesheet" href="./css/product.css">
    <link rel="stylesheet" href="./bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Home | Product</title>
    <style>
    
    </style>
</head>
<body>
      <div class="navbar">
            <?php include_once "navbar.php";?>
        </div>
     
      
        <h3 class="text-center he"> Hidden Store </h3>
        <p class="text-center"> Communications is at the heart of e-commerce and community.</p>
        <div class="row ">
            <div class="col-md-3 p-0">
                   <ul  class=" under">
                    <hr class="chr">
                    <li>
                        <a href="#" class="nav-link"><h2 class="cat text-center ">Your Profile</h2></a>
                    </li>
                    <hr class="phr">
                   
                    <li class='me-auto text-center'>
                        <a href='profile.php' class='nav-link nl'> Pending Order </a>
                    </li >
                    
                    <li class='me-auto text-center'>
                        <a href='profile.php?my_orders' class='nav-link nl'> My Orders </a>
                    </li >
                    
                    <li class='me-auto text-center'>
                        <a href='profile.php?edit_account' class='nav-link nl'> Edit Account </a>
                    </li >
                    
                    <li class='me-auto text-center'>
                        <a href='profile.php?delete_account' class='nav-link nl'> Delete Account </a>
                    </li >
                    
                    <li class='me-auto text-center'>
                        <a href='logout.php' class='nav-link nl'>Logout</a>
                    </li >
                    <hr class="chr">
                   </ul>
            </div>
            <div class="col-md-9">
               
            <?php
                    //get user order details
                    $username=$_SESSION['username'];
                    $get_details = "select * from tbluser where username='$username'";
                    $result= mysqli_query($con,$get_details);
                    while($row_query=mysqli_fetch_array($result)){
                        $uesr_id = $row_query['user_id'];
                        if(!isset($_REQUEST['edit_account'])){
                            if(!isset($_REQUEST['my_orders'])){
                                if(!isset($_REQUEST['delete_account'])){
                                    $get_orders="select * from tblorder where user_id=$uesr_id and order_status='pending'";
                                    $resultord= mysqli_query($con,$get_orders);
                                    $row_ocunt=mysqli_num_rows($resultord);
                                    if($row_ocunt>0){
                                        echo "<h3 class='text-center mr-5 text-success mt-5 '>You have <span class='text-danger'> $row_ocunt</span> pending orders</h3>
                                        <p class='text-center text-success pord'><a class='text-dark ' href='profile.php?my_orders'>Orders Details</a></p>";
                                    }
                                    else{
                                        echo "<h3 class='text-center mr-5 text-success mt-5'>You have  Zero pending orders</h3>
                                        <p class='text-center mr-5 text-success mt-5'><a class='text-dark' href='./home.php'>Explore Products</a></p>";
                                    }
                                }
                            }
                        }
                    }
                    if(isset($_REQUEST['edit_account'])){
                        include('edit_account.php');
                    }
                    if(isset($_REQUEST['my_orders'])){
                         include('users_order.php');
                    }
                     if(isset($_REQUEST['delete_account'])){
                         include('delete_account.php');
                    }
            ?>
            </div>
            <!-- close col-md-9 -->
        </div>
        <!-- close row -->
         
        <table>
        
        <tr>
             
    <div class="footer">
            <?php include_once "footer.html";?>
     </div>  
        </tr>
    </table>
  
</body>
</html>



