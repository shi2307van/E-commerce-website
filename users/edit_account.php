<?php
  include('../admin/includes/connect.php');
   if(isset($_REQUEST['edit_account'])){
        $username=$_SESSION['username'];
        $select_query="select * from tbluser where username='$username'";
        $result_edit=mysqli_query($con,$select_query);
        $row_fetch=mysqli_fetch_array($result_edit);
        $u_id=$row_fetch['user_id'];
        $uname=$row_fetch['username'];
        $uemail=$row_fetch['user_email'];
        $uadd=$row_fetch['user_address'];
        $umob=$row_fetch['user_mobile'];
    }
    if(isset($_REQUEST['btnupdate'])){
        $update_id=$u_id;
        $uname=$_REQUEST['username'];
        $uemail=$_REQUEST['email'];
        $uadd=$_REQUEST['address'];
        $umob=$_REQUEST['mobileNo'];
         

        $update="update tbluser set username='$uname',user_email='$uemail',user_address='$uadd',user_mobile='$umob' where user_id=$update_id";
        $res=mysqli_query($con,$update);
        if($res){
            echo"<script>alert('Data updated successfully')</script>";
            echo"<script>window.open('logout.php','_self')</script>";
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
    <title>Document</title>
     <style>
        .byn{
            margin-left:270px;
        }
     </style>
</head>
<body>
   <h3 class="text-center text-success mt-5 mb-5"> Edit Account</h3>
   <form action="" method="post" >
    <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto" value="<?php echo $username;?>" name="username">
    </div>
    <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto" value="<?php echo $uemail;?>" name="email">
    </div>
    <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto" value="<?php echo $uadd;?>" name="address">
    </div>
    <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto" value="<?php echo $umob;?>" name="mobileNo">
    </div>
    <div class="form-outline  mb-4">
        <input type="submit" class="btn btn-success w-50 byn" name="btnupdate">
    </div>
   </form>
  
  
</body>
</html>