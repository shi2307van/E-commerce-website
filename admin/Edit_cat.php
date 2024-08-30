            <?php
                include('../admin/includes/connect.php');
                if(isset($_REQUEST['edit_cat'])){
                    $edit_cat=$_REQUEST['edit_cat'];
                    $get_cat="select * from tblcategories where categories_id=$edit_cat";
                    $res_cat=mysqli_query($con,$get_cat);
                    $row=mysqli_fetch_array($res_cat);
                    $cat_titl=$row['categories_title'];
                }
                if(isset($_REQUEST['Update_cat'])){
                    $cat_tile=$_REQUEST['cat_tit'];
                    
                    $update="update tblcategories set categories_title='$cat_tile' where categories_id=$edit_cat";
                    $res_cat=mysqli_query($con,$update);
                    if($res_cat){
                    echo"<script>alert('Category is been Updated Successfully ')</script>";
                    echo"<script>window.open('Navbar.php','_self')</script>";
                    }
                }
            ?>
            
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap-4.3.1-dist/css/bootstrap.min.css"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Admin|Categories</title>
   
    <style>
        .headC{
            margin-left:450px;
            margin-top: 50px;
            padding-bottom: 30px;
            font-weight: bold;
            color: darkblue;
        }
        .box{
            margin-left:90px;
        }
    </style>
</head>
<body>
    <h1 class="headC">Edit Category</h1>
    <form action="" method="post" class="text-center">
        <div class="row">
            <div class="col-md-12">
                <label for="cat_tit">Category Title</label>
                <input type="text" value="<?php echo $cat_titl;?>" name="cat_tit" class="form-control w-50 m-auto" require>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-5">
                <input type="submit" name="Update_cat" class="btn btn-info btn-block w-50 m-auto" require>
            </div>
        </div>
    </form>
   
          
          

</body>
</html>