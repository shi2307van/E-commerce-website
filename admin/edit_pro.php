<?php
 include('./includes/connect.php');
 if(isset($_REQUEST['edit_pro'])){
    $eid=$_REQUEST['edit_pro'];
    $get_data="select * from tblproducts where product_id=$eid";
    $res=mysqli_query($con,$get_data);
    $row=mysqli_fetch_array($res);
    $pro_tit=$row['product_title'];
    $pro_desc=$row['product_desc'];
    $cat_id=$row['categories_id'];
    $pro_key=$row['product_keyword'];
    $pro_price=$row['product_price'];
    $pro_img1=$row['prod_img1'];

    //fetching cat id

    $select_cat="select * from tblcategories where categories_id=$cat_id";
    $res_cat=mysqli_query($con,$select_cat);
    $row_cat=mysqli_fetch_array($res_cat);
    $categories_title=$row_cat['categories_title'];
   
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/Edit_pro.css">
    <link rel="stylesheet" href="./bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <title>Document</title>
    <style>
        .Edith{
            margin-top: 40px;
            margin-left: 550px;
            margin-bottom: 60px;
           color: rgb(21, 21, 149); 
           font-weight: bold;
        }
        .form_edit{
            margin-left: 200px;
        }
        .pro_img{
            display: flex;
            width:150px;
            height:150px;
        }
    </style>
</head>
<body>
    <h1 class="Edith">Edit Product</h1>
    <form action="" class="form_edit" method="post" enctype="multipart/form-data">
        <div class="row mb-4">
            <div class="col-md-6 ">
                <label for="product_title" class="form-lable">Product Title</label>
                <input type="text" name="product_title" value="<?php  echo $pro_tit;?>" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label for="product_Desc" class="form-lable">Product Description</label>
                <input type="text" name="product_desc" value="<?php  echo $pro_desc;?>" class="form-control" required>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-6">
                <label for="product_key" class="form-lable">Product Keywords</label>
                <input type="text" name="product_key" value="<?php  echo $pro_key;?>" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label for="product_price" class="form-lable">Product Price</label>
                <input type="text" name="product_price" value="<?php   echo $pro_price;?>" class="form-control" required>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-12">
                <label for="product_title" class="form-lable">Product Categories</label>
                <select name="pro_cat" id="" class="form-control">
                    <option value=""><?php echo $categories_title;?></option>
                    <?php 
                        $select_cat_all="select * from tblcategories";
                        $res_cat_all=mysqli_query($con,$select_cat_all);
                        while($row_cat_all=mysqli_fetch_array($res_cat_all)){
                            $cat_title=$row_cat_all['categories_title'];
                            $cat_id=$row_cat_all['categories_id'];
                            echo"
                            <option value='$cat_id'>$cat_title</option>
                            ";
                        }
                        
                    ?>

                </select>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-10">
                <label for="product_img1" class="form-lable">Product Image1</label>
                <input type="file" name="product_img1"  class="form-control" required>
            </div>
            <div class="col-md-2">
                <img src="./product_img/<?php echo $pro_img1;?>" class="pro_img" alt="">
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-6">
                <input type="submit" name="Btnupdate" class="btn btn-success btn-block" value="Update Product">
            </div>
            <div class="col-md-6">
                <input type="reset" name="BtnReset" class="btn btn-danger btn-block" value="Reset Product">
            </div>
        </div>
    </form>
    <?php 
        if(isset($_REQUEST['Btnupdate'])){
            $pro_title=$_REQUEST['product_title'];
            $pro_desc=$_REQUEST['product_desc'];
            $pro_cat=$_REQUEST['pro_cat'];
            $pro_key=$_REQUEST['product_key'];
            $pro_price=$_REQUEST['product_price'];

            $pro_img1=$_FILES['product_img1']['name'];
            $temp_img1=$_FILES['product_img1']['tmp_name'];
            if($pro_title=='' or $pro_desc=='' or $pro_cat=='' or $pro_key=='' or $pro_price=='' or $pro_img1==''){
                echo"<script>alert('Please enter Proper Value')</script>";
            }
            else{
                move_uploaded_file($temp_img1,"./product_img/$pro_img1");
                $update_data="update tblproducts set product_title='$pro_title',product_desc='$pro_desc',product_keyword='$pro_key',categories_id=$pro_cat,prod_img1='$pro_img1',product_price='$pro_price' where product_id=$eid";
                $res_ipdate=mysqli_query($con,$update_data);
                echo"<script>alert('Product Updates Successfully')</script>";
                echo"<script>window.open('Navbar.php','_self')</script>";
            }

           
        }
    ?>
</body>
</html>