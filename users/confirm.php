<?php
  include('../admin/includes/connect.php');
    session_start();
    if(isset($_GET['order_id'])){
        $order_id=$_GET['order_id'];
        // echo $order_id;
        $select_data="select * from tblorder where order_id=$order_id";
        $res=mysqli_query($con,$select_data);
        $row_fetch=mysqli_fetch_array($res);
        $inv_no=$row_fetch['invoice_no'];
        $total_amt=$row_fetch['amount'];
    }
    if(isset($_REQUEST['confirm_payment'])){
        $inv_no=$_REQUEST['invoice_no'];
        $amt_pay=$_REQUEST['Amount'];
        $paymet_mod=$_REQUEST['paymnet_mode'];
        $insert_qury="insert into tblpayment (`pay_id`, `invoice_no`, `order_id`, `amount`, `pay_mode`, `date`) values(NULL,$inv_no,$order_id,$amt_pay,'$paymet_mod',NOW())";
        $res_pay=mysqli_query($con,$insert_qury);
        if($res_pay){
            echo "<script>alert('Payment Completed Successfully !!')</script>";
            echo "<script>window.open('profile.php?my_orders','_self')</script>";
        }
        $update_order="update tblorder set order_status='Complete' where order_id=$order_id" ;
        $res_upd=mysqli_query($con,$update_order);
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
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-5">Confirm Payment</h1>
        <form action="" method="post">
            <div class="form-outline mb-4 " >
              
                <input type="text" placeholder="invoiceNo:-" value="<?php echo $inv_no;?>" class="form-control w-50  m-auto" name="invoice_no"> 
            </div>
            <div class="form-outline mb-4 " >
                <input type="text" placeholder="total 2300/-" value="<?php echo $total_amt;?>" class="form-control w-50  m-auto" name="Amount"> 
            </div>
            <div class="form-outline mb-4 " >
                <select name="paymnet_mode" id="" class="form-control w-50 m-auto" >
                    <option value="">--select Payment Mode--</option>
                    <option value="UPI">UPI</option>
                    <option value="Net Banking">Net Banking</option>
                    <option value="Paypal">Paypal</option>
                    <option value="Cash On Delivery">Cash On Delivery</option>
                    <option value="Pay Offline">Pay Offline</option>
                </select>
            </div>
            <div class="form-outline mb-4 " >
                <input type="submit" class="btn btn-success btn-block w-50 m-auto" value="confirm" name="confirm_payment"> 
            </div>
        </form>
    </div>
</body>
</html>

