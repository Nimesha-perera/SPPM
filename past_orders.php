<?php

session_start();
#$userID = 24;
$user_check = $_SESSION['login_user'];
$connect = mysqli_connect("localhost", "root", "", "liyanage");

$ID = "SELECT userID FROM `user` WHERE email='$user_check'"; 
    $resID = mysqli_query($connect, $ID);
    $resultID = mysqli_num_rows($resID);
    
    if($resultID >0){
      while($row = mysqli_fetch_assoc($resID)){
        $userID = $row["userID"];
        #echo $row["userID"];
      }
    }

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
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">

    <title>Past Orders</title>
    <style>
    .account_list a:link {
        text-decoration: none;
    }

    .account_list a:visited {
        text-decoration: none;
        color: black;
    }

    .account_list a:hover {
        text-decoration: underline;
        color: #2baf63;
    }
    df-messenger {
   --df-messenger-bot-message: #2baf63;
   --df-messenger-button-titlebar-color: #0d5029;
   --df-messenger-chat-background-color: #fafafa;
   --df-messenger-font-color: white;
   --df-messenger-send-icon: #878fac;
   --df-messenger-user-message: #479b3d;
  }
    </style>

<body>
    <!-- header starts here-->
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
                        <a class="nav-link nav-link smoothScroll" href="index_logged.php">Explore</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Register.php">Join</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
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
    <!-- header ends here-->

    <div class="bg" style="background-color: #F5F5F5">
        <div class="mt-0 mb-5 col-lg-10 col-md-12 offset-lg-1">
            <div class="m-0 page-heading mb-4 row">
                <div class="col-lg-3 col-sm-12" style="padding-top: 40px;">
                    <span style="font-size:21px;">My <strong>Account</strong></span>
                </div>
            </div>
            <div class="m-0 row">
                <div class="col-lg-3 col-sm-12">
                    <div class="account_list">
                        <a href="view_profile.php">Profile Edit ></a>
                    </div>
                    <div class="account_list">
                        <a href="change_pwd.php">Change Password ></a>
                    </div>
                    <div class="account_list">
                        <a href="past_orders.php" style="color: #2baf63;">Past Orders ></a>
                    </div>
                    <div class="account_list">
                        <a href="upcoming_orders.php">Upcoming Orders ></a>
                    </div>
                    <div class="account_list">
                        <a href="track_order.php">Track My Order ></a>
                    </div>
                </div>

                <div class="col-lg-9 col-sm-12">
                    <div class="account-content-holder">
                        <div class="m-0 row">
                            <div class="card"
                                style="border-color: #2baf63; border-bottom-left-radius: 40px 40px; border-top-right-radius: 40px 40px;">
                                <div class="card-body">
                                    <div class="col-12 section-heading mb-3" style="font-weight: bold;">Past Orders
                                    </div>
                                    <hr>
                                    <div class="container mt-3">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Order No & Summary</th>
                                                    <th>Amount</th>
                                                    <th></th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                        $query = "SELECT DISTINCT inx,subtot FROM checkout WHERE customerID='$userID' AND status='Completed'";
                        $result = mysqli_query($connect, $query);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                                                <tr>
                                                    <td><?php echo $row['inx'] ?></td>
                                                    <td><?php echo $row['subtot'] ?></td>                                                
                        <?php

                $query1 = "SELECT DISTINCT summary FROM checkout WHERE customerID='$userID' AND status='Completed'";
                $result1 = mysqli_query($connect, $query1);
                while ($row = mysqli_fetch_array($result1)) {
                    ?>
                            <td>
                                <?php $array = json_decode($row["summary"],true);
                                echo $array[0] ?></td>
                                
                                
                </tr>

                              
                        <?php
}
?>
                        <?php
                        }
                        ?>
                                            </tbody>
                                        </table>
                                    </div>


                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
<df-messenger class="chatbot"
  chat-title="Liyanage Group Super Market"
  agent-id="3ad38590-6894-4940-a9d3-d952463d3fff"
  language-code="en"
></df-messenger>
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
                            <li><a href="Login.html">Singin </a>
                                <p>Access to the store</p>
                            </li>
                            <li><a href="Register.html">Signup </a>
                                <p>Access to the store</p>
                            </li>
                            <li><a href="index.html">Explore </a>
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