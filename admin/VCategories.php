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
    <h1 class="headC">All Categories</h1>
    <table class="box table table-bordered mt-5">
        <thead class="text-center bg-warning">
            <tr>
                <th>SLNO</th>
                <th>Categories Title</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-center text-light">
            <?php
              include('../admin/includes/connect.php');
                $selet_cat="select * from tblcategories ";
                $result=mysqli_query($con,$selet_cat);
                $num=0;
                while($row=mysqli_fetch_array($result)){
                    $cate_id=$row['categories_id'];
                    $cat_title=$row['categories_title'];
                    $num++;
                    echo"
                    <tr>
                    <td>$num</td>
                    <td>$cat_title</td>
                    <td><a class='text-light' href='Navbar.php?edit_cat=$cate_id'><i class='fa-solid fa-pen-to-square'></i></a></td>
                    <td><a class='text-light' href='Navbar.php?delet_cat=$cate_id'><i class='fa-solid fa-trash'></i></a></td>
                </tr>
                    ";
                }
            ?>
          
        </tbody>
    </table>
</body>
</html>