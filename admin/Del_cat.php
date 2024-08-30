<?php

include('../admin/includes/connect.php');
if(isset($_REQUEST['delet_cat'])){
    $delete_cat=$_REQUEST['delet_cat'];
    $del_qury="delete from tblcategories where categories_id=$delete_cat";
    echo $del_qury;
    $res_del=mysqli_query($con,$del_qury);

    if($res_del){
        echo"<script>alert('Category is been Deleted Successfully ')</script>";
        echo"<script>window.open('Navbar.php','_self')</script>";
    }
}
?>