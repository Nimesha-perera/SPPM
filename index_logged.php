<?php session_start();
if (!isset($_SESSION['login_user'])) {
    header('Location:login.php');
}
$connect = mysqli_connect("localhost","root","","liyanage");
?>


<!doctype html>
<html lang="en">

<head>


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="style1.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&family=Rubik&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&family=Rubik&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">



    <title>Liyanage Group</title>
</head>

<body>

    <!-----------------------------------------------------* Navbar *--------------------------------------------------------------------------------------------->
    <nav class="navbar navbar-expand-lg">
        <div class="container">

            <a class="navbar-brand" href="#"><img src="images/Logo.jpg" alt="logo" style="height: 80px;"></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active navi" href="index_logged.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link smoothScroll" href="#explore">Explore</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Register.php">Join</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php"
                            onclick="return confirm('Are you sure to logout?');">Logout</a>
                    </li>
                    <a class="navbar-brand" href="updatedcart.php"><img src="imagesN/cart.png" alt="logo"
                            style="height: 28px;"></a>
                    <a class="navbar-brand" href="view_profile.php"><img src="imagesN/user.png" alt="logo"
                            style="height: 28px;"></a>

                </ul>
                <form class="d-flex">
                    <input class=" px-2 search" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn0 " type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>


    <!-----------------------------------------------------* Navbar End *--------------------------------------------------------------------------------------------->



    <!-----------------------------------------------------* Main Section *--------------------------------------------------------------------------------------------->
    <section class="main">

        <div class="container py-5">
            <div class="row py-5">
                <div class="col-lg-7 pt-5 ">
                    <h1 class="pt-5">YOUR SEARCHES END HERE</h1>
                    <p>A place where you get everything</p>
                    <div class="col text-center">
                        <button class="btn1 mt-3">Explore
                            the store</button>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-----------------------------------------------------* Main Section End *--------------------------------------------------------------------------------------------->

    <section class="product" id="product">
                <div class="container py-5">

                    <div class="row">
                        <?php

            $query = "SELECT * FROM products limit 4";
            $result = mysqli_query($connect, $query);

            while ($row = mysqli_fetch_array($result)) {

            ?>

                        <div class="col-lg-3 text-center">
                            <div class="card border-0 bg-light mb-2">
                                <div class="card-body">


                                    <form method="get" action="ProductView.php?id=<?= $row['id'] ?>">
                                        <img src="upload\<?= $row['image'] ?>" class="image-fluid"
                                            style="height: 300px;">



                                </div>
                            </div>
                            <h6><?= $row['productname'] ?></h6>

                            <p>Rs. <?= $row['productprice'] ?>.00</p>

                            <button type="button" class="btncart btn-sm">
                                <span class="glyphicon glyphicon-shopping-cart"></span> <a
                                    href="ProductView.php?id=<?php echo $row["id"]; ?>">View Product</a>
                            </button>
                        </div>

                        <?php }
            ?>

            </section>
    <!---------------------------------------------------------------------------------------------------------------------------------------------->
    <section class="fruit py-4">
        <div id="fruits" class="section dark_bg layout_padding left_white">
            <div class="container">
                <div class="row py-2">
                    <div class="col-md-12">
                        <div class="heading py-8">
                            <h1 class="white_font full text_align_center">A range of fresh</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 margin_top_30">
                        <div class="full fr">
                            <img class="img-responsive" src="images/apple.png" alt="#" />
                        </div>

                    </div>
                    <div class="col-md-4 margin_top_30">
                        <div class="full fr">
                            <img class="img-responsive" src="images/banana.png" alt="#" />
                        </div>

                    </div>
                    <div class="col-md-4 margin_top_30">
                        <div class="full fr">
                            <img class="img-responsive" src="images/orange.png" alt="#" />
                        </div>

                    </div>

                </div>


            </div>
        </div>

        </div>
    </section>



    <!--------------------------------------------------------------------------------------------------------------------------------------------------->
    <section class="about">
        <div class="container">
            <div class="row">

            </div>
        </div>
    </section>
    <!---------------------------------------------------------------------------------------------------------------------------------------------------------->
    <section class="about">
        <div class="container py-5 text-center">
            <div class="row">
                <div class="col-lg-8 m-auto">
                    <h1>How fresh is now? Fresh!</h1>
                </div>
            </div>
        </div>
    </section>

    <!---------------------------------------------------------------------------------------------------------------------------------------------------------->


    <Section id="explore">
        <div class="container-fluid">
            <div class="px-lg-5">

                <!-- For demo purpose -->

                <!-- End -->

                <div class="row">
                    <!-- Gallery item -->
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-4 zoom">
                        <a href="Grocery-logged.php">
                            <div class="bg-white rounded shadow-sm"><img src="images/Groceries.jpg" alt=""
                                    class="img-fluid card-img-top">
                                <div class="p-4 card-pro">
                                    <h5> <a href="Grocery-logged.php" class="menu">Groceries</a></h5>

                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- End -->

                    <!-- Gallery item -->
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-4 zoom">
                        <a href="Meat-logged.php">
                            <div class="bg-white rounded shadow-sm"><img src="images/meat.jpg" alt=""
                                    class="img-fluid card-img-top">
                                <div class="p-4 card-pro">
                                    <h5> <a href="Meat-logged.php" class="menu">Meat</a></h5>

                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- End -->

                    <!-- Gallery item -->
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-4 zoom">
                        <a href="Household-logged.php">
                            <div class="bg-white rounded shadow-sm"><img
                                    src="https://bootstrapious.com/i/snippets/sn-gallery/img-3.jpg" alt=""
                                    class="img-fluid card-img-top">
                                <div class="p-4 card-pro">
                                    <h5> <a href="Household-logged.php" class="menu">Household</a></h5>

                                </div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
            <!-- End -->

            <!-- Gallery item -->

            <!-- End -->

            <!-- Gallery item -->
            <div class="px-lg-5">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-4">

                    </div>


                    <div class="col-xl-3 col-lg-4 col-md-6 mb-4 zoom">
                        <a href="Fruit-logged.php">
                            <div class="bg-white rounded shadow-sm"><img src="images/Fruits.jpg" alt=""
                                    class="img-fluid card-img-top">
                                <div class="p-4 card-pro">
                                    <h5> <a href="Fruit-logged.php" class="menu">Fruits</a></h5>

                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- End -->

                    <!-- Gallery item -->
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-4 zoom">
                        <a href="Vegetables-logged.php">

                            <div class="bg-white rounded shadow-sm"><img src="images/Vegetables.jpg" alt=""
                                    class="img-fluid card-img-top">
                                <div class="p-4 card-pro">
                                    <a href="Vegetables-logged.php" class="menu">Vegetables</a>

                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- End -->

                    <!-- Gallery item -->
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-4 zoom">
                        <a href="Beverages-logged.php">

                            <div class="bg-white rounded shadow-sm"><img src="images/Bevarages.jpg" alt=""
                                    class="img-fluid card-img-top">
                                <div class="p-4 card-pro">
                                    <a href="Beverages-logged.php" class="menu">Bevarages</a>

                                </div>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
            <!-- End -->
        </div>
    </Section>
    <!---------------------------------------------------------------------------------------------------------------------------------------------------------->
    <script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
    <df-messenger chat-title="Liyanage" agent-id="3ad38590-6894-4940-a9d3-d952463d3fff" language-code="en">
    </df-messenger>
    <!----------- Footer ------------>

    <footer class="footer-bs">
        <div class="row">
            <div class="col-md-3 footer-brand animated fadeInLeft">
                <h2>We,</h2>
                <h5>11-2456245</h5>
                <h5>Liyanage@gmail.com</h5>
                <h5>Monday to Sunday 9AM-10PM </h5>

            </div>
            <div class="col-md-4 footer-nav animated fadeInUp">
                <h4>Menu —</h4>
                <div class="col-md-6 foot">
                    <ul class="pages">
                    <li><a href="contactus_logged.php">Contact us </a>
                            <p>We're here, Let's talk</p>
                        </li>
                        <li><a href="abous_us_logged.html">About Us </a>
            <p>Get to know us</p>
        </li>
                        <li><a href="Login.php">Singin </a>
                            <p>Access to the store</p>
                        </li>
                        <li><a href="Register.php">Signup </a>
                            <p>Access to the store</p>
                        </li>
                        <li><a href="index-logged.php">Explore </a>
                                <p>Access to the store</p>
                            </li>

                    </ul>
                </div>

            </div>
            <div class="col-md-2 footer-social animated fadeInDown social">
                <h4>Follow Us</h4>
                <ul>
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Instagram</a></li>

                </ul>
            </div>
            <div class="col-md-3 footer-ns animated fadeInRight">
                <h4>Your needs</h4>
                <p>Just search</p>
                <p>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button"><span
                                class="glyphicon glyphicon-envelope"></span></button>
                    </span>
                </div><!-- /input-group -->
                </p>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>