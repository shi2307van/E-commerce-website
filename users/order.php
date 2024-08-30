<?php
  include('../admin/includes/connect.php');
  if(isset($_REQUEST['user_id'])){
    $u_id=$_REQUEST['user_id'];
    
  }

  //get total price and all items
  function getIPAddress() {  
    //whether ip is from the share internet  
    if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
    }  
//whether ip is from the remote address  
    else{  
            $ip = $_SERVER['REMOTE_ADDR'];  
    }  
    return $ip; 
  }
  $get_ip = getIPAddress();
  $total=0;
  $cart_qry="select * from tblcart where ip_address='$get_ip'";
  $res_qry=mysqli_query($con,$cart_qry);
  $invoice=mt_rand();
  //echo $invoice;
  $status='pending';
  $count_pro=mysqli_num_rows($res_qry);
  while($row_price=mysqli_fetch_array($res_qry)){
    $pro_id=$row_price['product_id'];
    $pro_qry="select * from tblproducts where product_id=$pro_id";
    $run_qry=mysqli_query($con,$pro_qry);
    while($row_pro=mysqli_fetch_array($run_qry)){
        $pro_price=array($row_pro['product_price']);
        $pro_value=array_sum($pro_price);
        $total+=$pro_value;
    }
  }
  //getting qty

  $get_cart="select * from tblcart";
  $run_cart=mysqli_query($con,$get_cart);
  $get_item_qty=mysqli_fetch_array($run_cart);
  $qtntity=$get_item_qty['qty'];
  if($qtntity==0){
    $qtntity=1;
    $subtotal=$total;
  }
  else{
    $qtntity=$qtntity;
    $subtotal=$total*$qtntity;
  }
  $insert_or="insert into tblorder values(NULL,$u_id,$subtotal,$invoice,$count_pro,NOW(),'$status')";
  $res_ins=mysqli_query($con,$insert_or);
  if($res_ins){
    echo "<script>alert('Order are Submitted Successfully')</script>";
    echo "<script>window.open('profile.php','_self')</script>";
  }

  // order pending

  $insert_pending_or="insert into order_pending values(NULL,$u_id,$invoice,$pro_id,$qtntity,'$status')";
  $res_pend_ins=mysqli_query($con,$insert_pending_or);

  //delete items form cart
  $empty_cart="Delete from tblcart where ip_address='$get_ip'";
  $res_del=mysqli_query($con,$empty_cart);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>order</title>
</head>
<body>
    
</body>
</html>