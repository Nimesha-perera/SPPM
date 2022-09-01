<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="style1.css" rel="stylesheet">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&family=Rubik&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <script src="js/sweetalert.min.js"></script>

    <title>Liyanage Group</title>
</head>

<body>

    <!---------nav bar--------->
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
                        <a class="nav-link active navi" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active nav-link smoothScroll" href="index.php">Explore</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Register.php">Join</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php" class="dropdown-toggle" data-toggle="dropdown">Signin</a>

                    </li>

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
    <div class="wrapper">

        <form class="form-right" action="" method="POST">
            <h2 class="text-uppercase">Get in to the Store</h2>
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <label>E-mail</label>
                    <input type="text" name="email" id="email" class="input-field" required>
                </div>
                <div class="col-sm-6 mb-3">
                    <label>Password</label>

                    <input type="password" name="password" id="password" class="input-field" required>
                </div>

            </div>
            <div class="row">

            </div>
            <div class="mb-3">
                <a href="#">Forgot password</a>


            </div>

            <div class="col text-center">
                <button type="submit" value="login" class="btn1" name="login" id="login">Login</button>
            </div>
        </form>
    </div>

    <!---------------------------------------------------------------------------------------------------------------------------------------------------------->
    <?php
    if ($_POST) {
        $connect = mysqli_connect("localhost", "root", "", "liyanage");

        $email = $_POST['email'];
        $password = $_POST['password'];
        $admin = 'admin@gmail.com';

        $sql = "SELECT * FROM user WHERE email = '$email' AND 
    password = '$password' LIMIT 1";

        $reult = mysqli_query($connect, $sql);

        if (mysqli_num_rows($reult) == 1) {
            session_start();
            $_SESSION['login_user'] = $email;
            // echo $email;
            header("Location: index_logged.php");
        } elseif ($email == 'liyanage@gmail.com' && $password == 'liyanage123') {
            header("Location: orderstat.php");
        } else {
            echo '<script>swal("","Enter correct email and password","error");</script>';
        }
    }


    ?>
    <!----------- Footer ------------>
    <div>
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
                        <li><a href="contactus.php">Contact us </a>
                            <p>We're here, Let's talk</p>
                        </li>
                        <li><a href="abous_us.html">About Us </a>
            <p>Get to know us</p>
        </li>
                            <li><a href="login.php">Singin </a>
                                <p>Access to the store</p>
                            </li>
                            <li><a href="Register.php">Signup </a>
                                <p>Access to the store</p>
                            </li>
                            <li><a href="index.php">Explore </a>
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

    </div>

    <!--------------------------------------------------------------------------------------------------------------------------->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
        integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</body>

</html>