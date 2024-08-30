<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <title>Document</title>
    <style>
        .hwe{
            margin-top:0px;
            font-weight:bold;
        }
    </style>
</head>
<body>
    <?php
    $username=$_SESSION['username'];
    $get_user="select * from tbluser where username='$username'";
    $result=mysqli_query($con,$get_user);
    $row_ftech=mysqli_fetch_array($result);
    $user_id=$row_ftech['user_id'];
   
    ?>
    <div class="container">
    <h3 class="text-suce text-center hwe mb-5">All My Orders</h3>
        <table class="table table-bordered">
            <thead class="bg-info text-light">
                <tr>
                    <th>SL No.</th>
                    <th>Amount Due</th>
                    <th>Total Products</th>
                    <th>Invoice Number</th>
                    <th>Date</th>
                    <th>Complete /incomplete</th>
                    <th>Status</th>
                </tr>  
            </thead>
            <tbody class="bg-secondary text-light">
            <?php
             $number=1;
            $get_order_details="select * from tblorder where user_id=$user_id";
            $resultOrder=mysqli_query($con,$get_order_details);
            while($row_order=mysqli_fetch_array($resultOrder)){
                $order_id=$row_order['order_id'];
                $amt=$row_order['amount'];
                $ivn=$row_order['invoice_no'];
                $tol_pro=$row_order['total_product'];
                $ord_date=$row_order['order_date'];
                $ord_sts=$row_order['order_status'];
                if($ord_sts=='pending'){
                    $ord_sts='Incomplete';
                }
                else{
                    $ord_sts='complete';
                }
               
                echo "<tr>
                <td class='text-center'>$number</td> 
                <td class='text-center'>$amt</td>
                <td  class='text-center'>$tol_pro</td>
                <td  class='text-center'>$ivn</td>
                <td class='text-center'>$ord_date</td>
                <td class='text-center'>$ord_sts</td>";
                ?>
                <?php
                if($ord_sts=='complete'){
                    echo"<td>Paid</td>";
                }
                else{
                   echo" <td class='text-center'> <a href='confirm.php?order_id=$order_id' class='text-light'>Confirm</a></td> </tr>";
                }

            $number++;
            }
            ?>
               
            </tbody>
        </table>
    </div>
</body>
</html>