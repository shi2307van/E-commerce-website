<?php
 include('../admin/includes/connect.php');
 session_start();
 if(isset($_REQUEST['btnadmin'])){
            $username=$_REQUEST['username'];
            $password=$_REQUEST['password'];
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password ;
     $select="select * from tbladmin where admin_name='$username' and password='$password'";
     $result=mysqli_query($con,$select);
     $row_count=mysqli_num_rows($result);
     if($row_count>0){
        $_SESSION['username'] = $username;
         echo"<script>alert('Login successfully')</script>";
         echo"<script>window.open('Navbar.php?view_pro','_self')</script>";
     }
     else{
        $_SESSION['username'] = $username;
         echo"<script>alert('invalid username password')</script>";
         echo"<script>window.open('index.php','_self')</script>";
     }
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <style>
        .container{
            width: 600px;
            margin-top: 150px;
            box-shadow: 5px 3px 4px rgb(11, 0, 0);
        }
        h1{
            text-shadow: 1px 3px 4px rgb(11, 0, 0);
            font-size: 50px;
        }
    </style>
    <title>Login</title>
</head>
<body class="bg-dark">
    <div class="container bg-light p-5 ">
        <h1 class="mb-5">Login Form</h1>
      <hr>
        <form action="" method="post">
            <div class="row form-group">
                <div class="col-md-12  m-auto">
                    <label for="uname">Username</label>
                    <input type="text" class="form-control " name="username" id="" required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-12">
                    <label for="pass m-auto">Password</label>
                    <input type="password" class="form-control " name="password" id="" required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-12">
                    <input type="submit" class="btn btn-dark btn-block mt-5" name="btnadmin" id="">
                </div>
            </div>
            <p class="text-center mt-3">Don't have an account? <a href="Registration.php"> Sign up </a></p>
        </form>
    </div>
</body>
</html>