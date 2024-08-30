<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
      
    </style>
</head>
<body>
    <h3 class="text-danger text-center mb-4 mt-5">Delete Account</h3>
    <form action="" method="post" class="mt-5">
        <div class="form-outline mb-4">
            <input type="submit"  class="form-control w-50 m-auto" name="delete" value="Delete Account">
        </div>
        <div class="form-outline mb-4">
            <input type="submit"  class="form-control w-50 m-auto" name="dntdelete" value="Don't Delete Account">
        </div>
    </form>
    <?php
    $username_session=$_SESSION['username'];
    if(isset($_REQUEST['delete'])){
        $delete_query="delete from tbluser where username='$username_session'";
        $res=mysqli_query($con,$delete_query);
        if($res){
            session_destroy();
            echo"<script>alert('Account Deleted Successfully')</script>";
            echo"<script>window.open('./home.php','_self')</script>";
        }
    }
    if(isset($_REQUEST['dntdelete'])){
        echo"<script>window.open('./profile.php','_self')</script>";
    }
    ?>
</body>
</html>