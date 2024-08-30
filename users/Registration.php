<?php
  include('../admin/includes/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/regi.css">
    <link rel="stylesheet" href="./bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <title>Home|Registration</title>
</head>
<body id="regi">
    <?php
        if(isset($_REQUEST['submit'])){
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
              $uname=$_REQUEST['uname'];
              $email=$_REQUEST['email'];
              $password=$_REQUEST['pass'];
              $cpassword=$_REQUEST['cpass'];
              $user_ip=getIPAddress();
              $add = $_REQUEST['add'];
              $cno = $_REQUEST['cno'];

              $select_quy = "select * from tbluser where username='$uname'";
              $select_res = mysqli_query($con,$select_quy);
              $rows_cot = mysqli_num_rows($select_res);
              if($rows_cot>0){
                echo"<script>alert('username already exist')</script>";
              }
              elseif($password!=$cpassword){
                echo"<script>alert('password not match')</script>";
              }
              else{
              $ist_query = "insert into tbluser values (Null,'$uname','$email','$password','$user_ip','$add','$cno')";
              $rsql = mysqli_query($con,$ist_query);
              if($rsql){
                echo"<script>alert('inserted successfully')</script>";
              }
            }

            //select cart items
            $selCartItem ="select * from tblcart where ip_address='$user_ip'";
            $reslcart =mysqli_query($con,$selCartItem);
            $rows_count = mysqli_num_rows($reslcart);
            if($rows_count>0){
                $_SESSION['username']=$uname;
                echo"<script>alert('You have items in cart')</script>";
                echo"<script>window.open('checkout.php','_self')</script>";
                //echo"<script>window.open(cart.php','_self')</script>";
            }
            else{
                echo"<script>window.open('./product.php','_self')</script>";
            }
        }
    ?>
    <div class="container">
        <form class="form-singup" method="post">
            <div class="row">
                <div class="col-sm-12">
                    <h1> <span> Registration </span></h1>
                </div>
            </div>
        <br>
        <div class="row ">
            <div class="col-sm-12">
                <label for="uname">UserName</label>
                <input type="text" name="uname" id="fname" placeholder="shivani" class="form-control">
            </div>
        </div>
        <div class="row">
        <div class="col-sm-12">
                <label for="cno">Contact No</label>
                <input type="text" name="cno" id="cno" placeholder="000-0000-000" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="xyz@gmail.com" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <label for="pass">Password</label>
                <input type="password" name="pass" id="pass" placeholder="*******" class="form-control">
            </div>
            <div class="col-sm-6">
                <label for="cpass">Confirm Password</label>
                <input type="password" name="cpass" id="cpass" placeholder="******" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <label for="add"> Address </label>
                <textarea name="add" placeholder="Enter Address" id="add" cols="10" rows="4" class="form-control"></textarea>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-12">
                <label>
                    <input type="checkbox"> I accept the <a href=""> Terms Of Use </a> & <a href=""> Privacy Policy </a>
                </label>
            </div>
        </div>
        <input type="submit" value="submit" class="btn btn-success btn-block" name="submit">
        <br>
        <p> have already an account? <a href="./user_login.php"> Sign In </a></p>
    </form>
    </div>
</body>
</html>