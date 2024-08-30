<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="contactus.css">
    <link rel="stylesheet" href="./bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Home|Contact Us</title>
    <style>
        body{
        background-image: url('pexels-travis-blessing-1363876.jpg');
        background-size: cover;
    }
    </style>
</head>
<body>
<div class="navbar">
        <?php include_once "navbar.php";?>
    </div>
   <div class="contact">
        <div class="content">
            <h2>Contact Us </h2><br>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officia iste sequi labore odio aperiam deserunt sit aliquid, pariatur quis debitis, </p>
        </div>
       
        <div class="container">
            <div class="contactInfo">
                <div class="box">
                    <div class="icon"><i class="fa-solid fa-location-dot"></i></div>
                    <div class="text">
                        <h3>Address</h3>
                        <p>119,Priyanka Green Park <br>,Bhestan,Surat,<br>394150</p>
                    </div>
                </div>

                <div class="box">
                    <div class="icon"><i class="fa-solid fa-phone"></i></div>
                    <div class="text">
                        <h3>Phone</h3>
                        <p>902-3844-654</p>
                    </div>
                </div>

                <div class="box">
                    <div class="icon"><i class="fa-solid fa-envelope"></i></div>
                    <div class="text">
                        <h3>Email</h3>
                        <p>shivanishinde540@gmail.com</p>
                    </div>
                </div>
            </div>
            <div class="contactForm">
                <form action="">
                    <h2>Send Message</h2>
                    <div class="inputBox">
                        <input type="text" name="" required>
                        <span>Full Name</span>
                    </div>
                    <div class="inputBox">
                        <input type="email" name="" required>
                        <span>Email</span>
                    </div>
                    <div class="inputBox">
                        <textarea name="" id="" cols="20" rows="3" required></textarea>
                        <span>Type your Message</span>
                    </div>
                    <div class="inputBox">
                        <input type="submit" name="" id="btnCon" value="Send">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="footer">
        <?php include_once "footer.html";?>
    </div>  
</body>
</html>