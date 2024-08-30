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
    <h1 class="headC">All Orders</h1>
    <table class="box table table-bordered mt-5">
    <thead class='text-center bg-primary text-light'>
            <?php
                
              include('../admin/includes/connect.php');
                $selet_ord="select * from tblorder";
                $result=mysqli_query($con,$selet_ord);
                $row_cont=mysqli_num_rows($result);
                   
                   

                    if($row_cont==0){
                        echo"<h1 class='text-danger text-center mt-5 '>No Order Yet</h1>";
                    }
                    else{
                        $num=1;
                        echo"
                        <tr>
                        <th>SLNO</th>
                        <th>Total Amount</th>
                        <th>Invoice Number</th>
                        <th>Total Products</th>
                        <th>Order Date</th>
                        <th>Order Status</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    
                    <tbody class='bg-secondary text-center text-light'> 
                        ";
                        while($row=mysqli_fetch_array($result)){
                            $ord_id=$row['order_id'];
                            $amt=$row['amount'];
                            $invno=$row['invoice_no'];
                            $totl_prd=$row['total_product'];
                            $ord_date=$row['order_date'];
                            $ord_sts=$row['order_status'];
                            echo"
                           
                            <tr>
                            <td>$num</td>
                            <td>$amt</td>
                            <td>$invno</td>
                            <td>$totl_prd</td>
                            <td>$ord_date</td>
                            <td>$ord_sts</td>
                            <td><a class='text-light' href='Navbar.php?del_ord=$ord_id'><i class='fa-solid fa-trash'></i></a></td>
                        </tr>
                            ";
                            $num++;
                        }
                    }
                
                
            ?>
                
                </tbody>
       
    </table>
</body>
</html>