<?php
    include('./includes/connect.php');
    if(isset($_REQUEST['Ins_Pro'])){
        $proTit=$_REQUEST['Pro_title'];
        $proDesc=$_REQUEST['Description'];
        $key=$_REQUEST['Keywords'];
        $price=$_REQUEST['Pro_price'];
        $cat=$_REQUEST['Pro_cat'];
        $status ='true';
        //access img 
        $img1=$_FILES['Pro_img1']['name'];

        $timg1=$_FILES['Pro_img1']['tmp_name'];
       

        if($proTit=='' or $proDesc=='' or $key=='' or $price=='' or $cat=='' or $img1==''){
            echo "<script>alert('Please enter the value of all fields')</script>";
            exit();
        }
        else{
            move_uploaded_file($timg1,"./product_img/$img1");
           

            // insert query
            $strIns = "insert into tblproducts ( product_title, product_desc, product_keyword, categories_id, prod_img1, product_price, status) values ('$proTit',' $proDesc','$key',$cat,'$img1','$price','$status')";
            $res = mysqli_query($con,$strIns);
            echo "<script>alert('sucessfully inserted the product')</script>";
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
    <link rel="stylesheet" href="./css/IProduct.css">
    <title>Admin|Product Insert</title>
    <style>
        .pcon{
            margin-left: 400px;
        }
        .mt-5{
            color: rgb(21, 21, 149);
        }
        label{
            font-size: 20px;
            font-weight: 600;
        }
        input:hover{
        border:1px solid black;
        }
    </style>
</head>
<body class="bg-light">
    <?php
    include_once "Navbar.php";
    ?> 
  
        <h1 class="mt-5 mb-5">Insert Product</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row m-auto form-group">
                <div class="col-md-6">
                    <label for="Pro_title" class="form-lable">Product Title</label>
                    <input type="text" placeholder="Enter Product Description" name="Pro_title" id="Pro_title" class="form-control" required>
                </div>
                <div class="col-md-6 ">
                    <label for="Description" class="form-lable">Product Description</label>
                    <input type="text" placeholder="Enter Product Title" name="Description" id="Description" class="form-control" required>
                </div>
            </div>
            <br>
            <div class="row m-auto form-group">
                <div class="col-md-6">
                    <label for="Keywords" class="form-lable">Product Keywords</label>
                    <input type="text" placeholder="Enter Product Keywords" name="Keywords" id="Keywords" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="Pro_price" class="form-lable">Product Price</label>
                    <input type="text" placeholder="Enter Product Price" name="Pro_price" id="Pro_price" class="form-control" required>
                </div>
            </div>
            <br>
            <div class="row m-auto">
                <div class="col-md-12">
                    <label for="Pro_img1" class="form-lable">Product image1</label>
                    <input type="file" name="Pro_img1" id="Pro_img1" class="form-control" required>
                </div>
            </div>
            <br>
           
            <br>
            <div class="row m-auto">
                <div class="col-md-12">
                <label for="Pro_cat" class="form-lable">Product Categories</label>
                    <select name="Pro_cat" id="Pro_cat" class="form-control">
                        <option value="">Select Categories</option>
                        <?php
                            $strCat = "select * from tblcategories";
                            $resCat = mysqli_query($con,$strCat);
                            while($rec = mysqli_fetch_array($resCat)){
                                $cattit=$rec['categories_title'];
                                $catid=$rec['categories_id'];
                                echo "<option value='$catid'>$cattit</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>
            <br>
            <div class="row btn2 m-auto">
                <div class="col-md-6">
                    <input type="submit" name="Ins_Pro" class="btn btn-success btn-block" value="Insert Products" required>
                </div>
                <div class="col-md-6">
                    <button type="reset" class="btn btn-danger btn-block">Reset</button>
                </div>
            </div>
        </form>
    
</body>
</html>