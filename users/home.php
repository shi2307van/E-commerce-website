<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   
    <title>Home</title>
 
</head>
<body>
    <div class="navbar">
        <?php include_once "navbar.php";?>
    </div>
    <div class="home">
        <div class="container">
            <br><br><br><br><br><br>
            <h5 >NEW ARRAIVALES</h5>
            <h1> <span> Best Price </span> This Year</h1>
            <p>Shoomatic Offers Your Very Comfortable  time <br> On Walking and Exercies</p>
            <button> Shop Now</button>
        </div>
    </div>

    <div id="brand" class="container">
        <div class="row m-0 py-5">
            <img class="img-fluid col-lg-2 col-md-4 ml-5 col-6" src="./img/acer.jpg" alt="">
            <img class="img-fluid col-lg-2 col-md-4 ml-5 col-6" src="./img/apple.png" alt="">
            <img class="img-fluid col-lg-2 col-md-4 ml-5 col-6" src="./img/dell.png" alt="">
            <img class="img-fluid col-lg-2 col-md-4 ml-5 col-6" src="./img/hp.gif" alt="">
        </div>
    </div>

    <div id="featured" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
            <h3>Our Featured</h3>
            <hr class="mx-auto">
            <p>Here you can check out new Products with fair price on computer shop.</p>
        </div>
        <div class="row mx-auto container-fluid">

            <div class="product text-center col-lg-3 col-md-4 col-12">
                <img class=" mb-5 ml-auto" src="./img/imghp.jpg" alt="" height="300px" width="300px">
                <div class="star mt">
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name">Laptop</h5>
                <h4 class="p-price">$1000.00</h4>
                <button class="buy-btn">Buy Now</button>
            </div>

            <div class="product text-center col-lg-3 col-md-4 col-12">
                <img class=" mb-5 ml-auto" src="./img/cpu.jpg"  height="300px" width="300px" alt="">
                <div class="star">
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name">CPU</h5>
                <h4 class="p-price">$190.00</h4>
                <button class="buy-btn">Buy Now</button>
            </div>

            <div class="product text-center col-lg-3 col-md-4 col-12">
                <img class=" mb-5 ml-auto" src="./img/printer.jpg" alt=""  height="300px" width="300px">
            
                <div class="star">
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name">Printer</h5>
                <h4 class="p-price">$300.00</h4>
                <button class="buy-btn">Buy Now</button>
            </div>

            <div class="product text-center col-lg-3 col-md-4 col-12">
                <img class=" mb-5 ml-auto" src="./img/imgmouse.jpg" alt=""  height="300px" width="300px">
                <div class="star">
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name">Mouse</h5>
                <h4 class="p-price">$50.00</h4>
                <button class="buy-btn">Buy Now</button>
            </div>
            
        </div>
    </div>

    <div class="footer">
    <?php include_once "footer.html";?>
    </div>
</body>
</html>