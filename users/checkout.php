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
    <link rel="stylesheet" href="./bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Home | Product</title>
    <style>
      .he{
      margin-left:150px;
      margin-top:100px;
      }
      .box{
        margin-top:20px;
      }
    </style>
</head>
<body>
 
      
                          <?php
                          if(!isset($_SESSION['username'])){
                            include('user_login.php');
                          }
                          else{
                            include('payment.php');
                          }
                          ?>
                    
        
</body>
</html>



