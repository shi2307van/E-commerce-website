<?php
  include('../admin/includes/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/cart.css">
    <link rel="stylesheet" href="./bootstrap-4.3.1-dist/css/bootstrap.min.css">
   
    <title>Home | Product</title>
</head>
    <body>
        <div class="navbar">
            <?php include_once "navbar.php";?>
        </div>
        <table>
             <tr>
             <div class="container">
                    <div class="row">
                        <form action="" method="post">
                        <table class="table table-bordered text-center tbl">
                           
                                <!-- php code to display dynamic data -->
                                <?php
                                      $get_ip_add = getIPAddress();
                                      $total=0;
                                      $cart_query = "select * from tblcart where ip_address='$get_ip_add'";
                                      $result_cat=mysqli_query($con,$cart_query);
                                      $result_count=mysqli_num_rows($result_cat);
                                      if($result_count>0){
                                        echo" <thead>
                                        <tr>
                                            <th>Product Titel</th>
                                            <th>Product Image</th>
                                            <th>Quantity</th>
                                            <th>Total Price</th>
                                            <th>Remove</th>
                                            <th colspan='2'>Operations</th>
                                        </tr>
                                    </thead>
                                    <tbody>";
                                      
                                      while($row = mysqli_fetch_array($result_cat)){
                                        $pro_id=$row['product_id'];
                                        $selectPro="select * from tblproducts where product_id='$pro_id'";
                                        $result_pro=mysqli_query($con,$selectPro);
                                        while($row_pro_pr=mysqli_fetch_array($result_pro)){
                                            $pro_price=array($row_pro_pr['product_price']);
                                            $price_table=$row_pro_pr['product_price'];
                                            $prd_titel=$row_pro_pr['product_title'];
                                            $pro_img=$row_pro_pr['prod_img1'];
                                            $pro_value=array_sum($pro_price);
                                            $total+=$pro_value;
                                       
                                ?>
                                <tr>
                                    <td><?php echo $prd_titel;?></td>
                                    <td><img src="./img/<?php echo $pro_img;?>" class="cart_img"></td>
                                    <td><input type="text" name="qty" class="form-input w-50"></td>
                                    <?php
                                        $get_ip_add = getIPAddress();
                                        if(isset($_REQUEST['update_cart'])){
                                            $qty=$_REQUEST['qty'];
                                            $update_cart="update tblcart set qty=$qty where ip_address='$get_ip_add'";
                                            $result_update=mysqli_query($con,$update_cart);
                                            $total=$total*$qty;
                                        }
                                    ?>
                                    <td><?php echo $price_table;?>/-</td>
                                    <td><input type="checkbox" name="removeitem[]" value="<?php echo $pro_id ?>"></td>
                                    <td>
                                        <input type="submit" class="btn btn-success " value="Update Cart" name="update_cart">
                                        <input type="submit" class="btn btn-danger " value="Remove Cart " name="delete_cart">
                                    </td>
                                </tr>
                                <?php
                                 }
                            }
                            }
                            else{
                                echo "<h2 class='text-center text-danger'>Cart is Empty</h2>";
                            }
                                ?>
                            </tbody>
                        </table>
                        <div>
                        <?php
                             $get_ip_add = getIPAddress();
                            
                             $cart_query = "select * from tblcart where ip_address='$get_ip_add'";
                             $result_cat=mysqli_query($con,$cart_query);
                             $result_count=mysqli_num_rows($result_cat);
                             if($result_count>0){
                                echo" <h4 class='px-3 mb-5'>Subtotal:<strong class='text-info'>$total/-</strong></h4>
                                <a href='./product.php' class='btn btn-info ml-5'>Continue Shopping</a>
                                <a href='./checkout.php' class='btn btn-secondary ml-5'>CheckOut</a>";
                             }
                             else{
                                echo"<a href='./product.php' class='btn btn-info'>Continue Shopping</a>";
                             }
                        ?>
                           
                        </div>
                        </form>
                    <?php
                        function delete_cart_item(){
                            global $con;
                            if(isset($_REQUEST['delete_cart'])){
                                foreach($_REQUEST['removeitem']as$removeid){
                                    echo $removeid;
                                    $delete_query="delete from tblcart where product_id=$removeid";
                                    $run_delete=mysqli_query($con,$delete_query);
                                    if($run_delete){
                                        echo"<script>window.open('cart.php','_self')</script>";
                                    }
                                }
                            }
                        }
                        delete_cart_item();  
                    ?>
                    
                    </div>
                </div>
                
            </tr>
            
            <tr>
                <div class="footer">
                    <?php include_once "footer.html";?>
                </div>  
            </tr>
        </table>
    </body>
</html>



