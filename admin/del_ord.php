<?php

include('../admin/includes/connect.php');
if(isset($_REQUEST['del_ord'])){
    $delete_ord=$_REQUEST['del_ord'];
    $del_qury="delete from tblorder where order_id=$delete_ord";
    $res_del=mysqli_query($con,$del_qury);

    if($res_del){
        echo"<script>alert('Order is been Deleted Successfully ')</script>";
        echo"<script>window.open('Navbar.php','_self')</script>";
    }
}
?>