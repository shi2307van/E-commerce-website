<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/Categories.css">
    <title>Admin|Categories</title>
</head>
<body>
    <?php
        include('./includes/connect.php');
        if(isset($_REQUEST['insert_cat'])){
            $category_title = $_REQUEST['cat_title'];
            //select data from database
            $select_cat="select * from `tblcategories` where categories_title='$category_title'";
            $result_sel=mysqli_query($con,$select_cat);
            $num=mysqli_num_rows($result_sel);
            if($num>0){
                echo "<script>alert('This category is present inside the database')</script>";
            }
        
            else{
                $insert_cat = "insert into `tblcategories` (categories_title) values ('$category_title')";
                $result = mysqli_query($con,$insert_cat);
                if($result){
                    echo "<script>alert('Category has been inserted successfully')</script>";
                }
            }
        }
    ?>
    <?php include_once "Navbar.php";?>
  
    <h1 class="head">Insert Catagories</h1>
        <form action="" method="post" class="mb-2">
            <div class="row mt-5 ">
                <div class="col-md-6 form-group">
                    <label class="lab mb-4" for="">Enter Catagories :-</label>
                    <input type="text" class="int form-control" name="cat_title" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6  border-0">
                    <input type="submit" class="buy form-control bg-success" name="insert_cat" value="Insert">
                </div>
            </div>
        </form>
   
</body>
</html>