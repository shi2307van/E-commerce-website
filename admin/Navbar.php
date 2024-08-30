<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="./css/Navbar.css">
   
   <link rel="stylesheet" href="/bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <title>Admin|Navbar</title>
    <style>
        .wel{
            float: right;
            margin-right:150px;
            font-size: 25px;
            color: white;
            text-decoration: none;
        }
        .header{
            background-color: rgb(97, 138, 194);
            line-height: 70px;
            padding-left:30px 
        }
      
    </style>
</head>
<body>
   <header class="header">
    <a class="a1" href="">Admin Dashboard</a>
        <?php
        session_start();
         if(!isset($_SESSION['username'])){
            echo"<a href='' class='wel'> Welcome Guest</a>";
           }
           else{
            echo" <a href='' class='wel' >Welcome ".$_SESSION['username']."</a> ";
           }
        ?>
        <!-- -->
   
   </header>
   <aside>
    <ul class="uili">
        <li>
            <a href="Navbar.php?view_pro"><span>View Products</span></a>
        </li>
        <li>
            <a href="Navbar.php?view_categories"><span>View Categories</span></a>
        </li>
        <li>
            <a href="Navbar.php?insert_pro"><span>Insert Products</span></a>
        </li>
        <li>
            <a href="Navbar.php?insert_categories"><span>Insert Categories</span></a>
        </li>
        <li>
            <a href="Navbar.php?all_ord"><span>Orders</span></a>
        </li>
        <li>
            <a href="Navbar.php?payment"><span>All Payments</span></a>
        </li>
        <li>
            <a href="Navbar.php?user"><span> User</span></a>
        </li>
        <li>
            <a href="./Logout.php"><span> Logout</span></a>
        </li>
    </ul>
   </aside>  
   <div class="container pcon">
    <?php
  
    if(isset($_REQUEST['insert_categories'])){
        include('ICategories.php');
    }
    if(isset($_REQUEST['insert_pro'])){
        include('IProduct.php');
    }
    if(isset($_REQUEST['view_pro'])){
        include('vproducts.php');
    }
    if(isset($_REQUEST['edit_pro'])){
        include('edit_pro.php');
    }
    if(isset($_REQUEST['delete_pro'])){
        include('delete_pro.php');
    }
    if(isset($_REQUEST['view_categories'])){
        include('VCategories.php');
    }
    if(isset($_REQUEST['edit_cat'])){
        include('Edit_cat.php');
    }
    if(isset($_REQUEST['delet_cat'])){
        include('Del_cat.php');
    }
    if(isset($_REQUEST['all_ord'])){
        include('Order.php');
    }
    if(isset($_REQUEST['del_ord'])){
        include('del_ord.php');
    }
    if(isset($_REQUEST['payment'])){
        include('Payment.php');
    }
    if(isset($_REQUEST['del_pay'])){
        include('del_pay.php');
    }
    if(isset($_REQUEST['user'])){
        include('User.php');
    }
    if(isset($_REQUEST['del_us'])){
        include('del_user.php');
    }
    ?>
   </div>
</body>
</html>