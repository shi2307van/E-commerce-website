<?php
  include('../admin/includes/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <title>Home|Login</title>
</head>
<body>
   
    <section>
        <div class="imgBx">
            <img src="./img/shutterstock_693701887.jpg" alt="">
        </div>
        <div class="contentBx">
            <div class="formBx">
                <h2>Login</h2>
                <form>
                    <div class="inputBx">
                        <span>Username</span>
                        <input type="text" name="username">
                    </div>
                    <div class="inputBx">
                        <span>Password</span>
                        <input type="password" name="password">
                    </div>
                    <div class="rem">
                        <label for=""> <input type="checkbox" name=""> Remeber Me </label>
                    </div>
                    <div class="inputBx">
                        <input type="submit" value="Login" name="Login" id="btn">
                    </div>
                    <div class="inputBx">
                       <p>Don't have an account? <a href="Registration.php"> Sign up </a></p>
                    </div>
                </form>
                <h3>Login with social media</h3>
                <ul class="sci">
                    <li><img src="./img/facebook.png" alt="" width="50px" height="50px"></li>
                    <li><img src="./img/instragram.png" alt="" width="50px" height="50px"></li>
                    <li><img src="./img/twitter.png" alt="" width="50px" height="50px"></li>
                </ul>
            </div>
        </div>
    </section>
</body>
</html>
<?php
        if(isset($_REQUEST['Login'])){
            $username=$_REQUEST['username'];
            $password=$_REQUEST['password'];
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password ;
            $select="select * from tbluser where username='$username' and user_password='$password'";
            $result=mysqli_query($con,$select);
            $row_count=mysqli_num_rows($result);
         

            // cart items
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
            $userip=getIPAddress();
            $selectCart="select * from tblcart where ip_address='$userip'";
            $resultCart=mysqli_query($con,$selectCart);
            $rowContCart=mysqli_num_rows($resultCart);
        
            if($row_count>0){
                echo"<script>alert('Login successfully')</script>";
                echo"<script>window.open('./payment.php','_self')</script>";
            }
            else{
                echo"<script>alert('invalid username password')</script>";
                echo"<script>window.open('./product.php','_self')</script>";
            }
        }
    ?>