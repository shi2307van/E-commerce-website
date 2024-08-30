<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/vproducts.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Admin|Categories</title>
    <style>
        .buy{
    margin-left: 100px;
    font-size: 22px;
    color: white;
    font-weight: 500;
}
.lab{
    font-size: 20px;
    margin-top: 10px;
    font-weight: 600;
    margin-left:90px;
}
.int{
    margin-left: 50px;
}
.head{
    margin-left:450px;
    margin-top: 50px;
    padding-bottom: 30px;
    font-weight: bold;
    color: darkblue;
}

img{
    width: 100px;
    height: 100px;
    object-fit: contain;
}

    </style>
</head>
<body>
   
    <?php include_once "Navbar.php";?>
    <h1 class="head">All Products</h1>
    
        <table class="table text-center table-bordered ml-5 mt-5">
            <thead class="bg-primary text-light">
                <th>Product id</th>
                <th>Product title</th>
                <th>Product price</th>
                <th>Product image</th>
                <th>Total sold</th>
                <th>Status </th>
                <th>Edit</th>
                <th>Delete</th>
            </thead>
            <tbody class="bg-secondary text-light">
            <?php
                 include('../admin/includes/connect.php');
                $get_pro="select * from tblproducts";
                $rel_pro=mysqli_query($con,$get_pro);
                while($row_pro=mysqli_fetch_array($rel_pro)){
                    $pro_id=$row_pro['product_id'];
                    $pro_tit=$row_pro['product_title'];
                    $pro_img=$row_pro['prod_img1'];
                    $pro_price=$row_pro['product_price'];
                    $status=$row_pro['status'];
                    $get_count="select * from order_pending where product_id=$pro_id";
                    $rel_cont=mysqli_query($con,$get_count);
                    $rows_count=mysqli_num_rows($rel_cont);
                    echo"
                    <tr>
                        <td>$pro_id</td>
                        <td>$pro_tit</td>
                        <td><img src='./product_img/$pro_img'></td>
                        <td>$pro_price/-</td>
                        <td>$rows_count</td>
                        <td>$status</td>
                        <td><a class='text-light' href='Navbar.php?edit_pro=$pro_id'><i class='fa-solid fa-pen-to-square'></i></a></td>
                        <td><a class='text-light' href='Navbar.php?delete_pro=$pro_id'><i class='fa-solid fa-trash'></i></a></td>
                    </tr>
                    ";
                }
            ?>
                
            </tbody>
        </table>
    
</body>
</html>