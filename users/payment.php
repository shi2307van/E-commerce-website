<?php
  include('../admin/includes/connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>payment</title>
    <style>
        .imh{
            width:500px;
            height:500px;
            margin-top:90px;
            border-radius:0px;
            margin-bottom:40px;
        }
        .text-info{
            margin-top:100px;
        }
        .btn1{
            margin-top:300px;
            margin-left:90px;
            
        }
    
    </style>
</head>
<body>
      <div class="navbar">
            <?php include_once "navbar.php";?>
        </div>
        <?php 
        $user_ip=getIPAddress();
        $getUser="select * from tbluser where user_ip='$user_ip'";
        $result_user=mysqli_query($con,$getUser);
        $run_query=mysqli_fetch_array($result_user);
        $user_id = $run_query['user_id'];
    ?>
       <table>
        <tr>
        <div class="container">
        <h2 class="text-center text-info">Payment Options</h2>
        <div class="row">
            <div class="col-md-6">
                <a href="https://www.paypal.com"><img class="imh" src="./img/payment.png" alt="" ></a>
            </div>
            <div class="col-md-6">
                <a href="./order.php?user_id=<?php echo $user_id?>" class="btn btn-dark btn1"><h3>Pay Offline</h3></a>
            </div>
            
        </div>
    </div>
        </tr>
        <tr>
             
    <div class="footer">
            <?php include_once "footer.html";?>
     </div>  
        </tr>
    </table>
  
</body>
</html>



