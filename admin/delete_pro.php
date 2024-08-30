
    <?php
    include('./includes/connect.php');
      if(isset($_REQUEST['delete_pro'])){
        $delete_id=$_REQUEST['delete_pro'];
        //delete query
        $delete_pro="delete from tblproducts where product_id=$delete_id";
        $res_del=mysqli_query($con,$delete_pro);
        echo"<script>alert('Product Deleted Successfully')</script>";
        echo"<script>window.open('Navbar.php','_self')</script>";
    }
    ?>
