<?php
require_once('config.php');
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
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>



    <title>Liyanage Group</title>
</head>

<body>
    <div>
        <?php


        ?>
    </div>

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
                        <a class="nav-link active navi" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link smoothScroll" href="index.php">Explore</a>
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

        <form class="form-right" method="POST">
            <h2 class="text-uppercase">Join with us</h2>
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <label>First Name</label>
                    <input type="text" name="firstname" id="firstname" class="input-field" required>
                </div>
                <div class="col-sm-6 mb-3">
                    <label>Last Name</label>
                    <input type="text" name="lastname" id="lastname" class="input-field" required>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <label>E-mail</label>
                    <input type="text" name="email" id="email" class="input-field" required>
                </div>
                <div class="col-sm-6 mb-3">
                    <label>Phone No</label>
                    <input type="text" name="phone" id="phone" class="input-field" required>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <label>Address Line 1</label>
                    <input type="text" name="address1" id="address1" class="input-field" required>
                </div>
                <div class="col-sm-6 mb-3">
                    <label>Address Line 2</label>
                    <input type="text" name="address2" id="address2" class="input-field" required>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <label>City</label>
                    <input type="text" name="city" id="city" class="input-field" required>
                </div>
                <div class="col-sm-6 mb-3">
                    <label>Postal Code</label>
                    <input type="text" name="postal" id="postal" class="input-field" required>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <label>Password</label>
                    <input type="password" name="password" id="password" class="input-field" required>
                </div>

            </div>
            <div class="mb-3">
                <label class="option">I agree to the <a href="#">Terms and Conditions</a>
                    <input type="checkbox" required>
                    <span class="checkmark"></span>
                </label>
            </div>
            <div class="form-field">
                <input type="submit" value="Register" class="btn1" name="register" id="register">
            </div>
        </form>
    </div>



    <!--------------------------------------------------------------------------------------------------------------------->



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
    $(function() {
        $('#register').click(function(e) {
            var valid = this.form.checkValidity();
            if (valid) {
                var firstname = $('#firstname').val();
                var lastname = $('#lastname').val();
                var email = $('#email').val();
                var phone = $('#phone').val();
                var address1 = $('#address1').val();
                var address2 = $('#address2').val();
                var city = $('#city').val();
                var postal = $('#postal').val();
                var password = $('#password').val();


                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: 'process.php',
                    data: {
                        firstname: firstname,
                        lastname: lastname,
                        email: email,
                        phone: phone,
                        address1: address1,
                        address2: address2,
                        city: city,
                        postal: postal,
                        password: password
                    },
                    success: function(data) {
                        Swal.fire(
                            'Successfull',
                            'User Registration',
                            'success'
                        )


                    },
                    error: function(data) {

                        Swal.fire(
                            'Error in saving the details',
                            '',
                            'error'
                        )
                    }
                });

            } else {

            }




        });

    });
    </script>
    <!---------------------------------------------------------------------------------------------------------------------------------------------------------->

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
                            <li><a href="Login.php">Singin </a>
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






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>