<?php

include('../admin/includes/connect.php');
if(isset($_REQUEST['del_us'])){
    $delete_us=$_REQUEST['del_us'];
    $del_qury="delete from tbluser where user_id=$delete_us";
    echo $del_qury;
    $res_del=mysqli_query($con,$del_qury);

    if($res_del){
        echo"<script>alert('User is been Deleted Successfully ')</script>";
        echo"<script>window.open('Navbar.php','_self')</script>";
    }
}
?>