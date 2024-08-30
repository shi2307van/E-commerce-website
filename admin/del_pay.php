<?php

include('../admin/includes/connect.php');
if(isset($_REQUEST['del_pay'])){
    $delete_pay=$_REQUEST['del_pay'];
    $del_qury="delete from tblpayment where pay_id=$delete_pay";
    $res_del=mysqli_query($con,$del_qury);

    if($res_del){
        echo"<script>alert('Payment is been Deleted Successfully ')</script>";
        echo"<script>window.open('Navbar.php','_self')</script>";
    }
}
?>