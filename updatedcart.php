<?php
session_start();
$user_check = $_SESSION['login_user'];
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="styleS.css" rel="stylesheet">
    <link rel="stylesheet" href="Stylesheet.css">
    <link rel="stylesheet" href="viewproduct.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&family=Rubik&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="quantity.js"></script>


    <!-- Box icons -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />

    <!-- Custom StyleSheet -->

    <link rel="stylesheet" href="cartstyle.css" />

    <title>Liyanage Group</title>

</head>
<style>
    input[type="text"]
{
    font-size:16px;
}
    </style>
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
                        <a class="nav-link nav-link smoothScroll" href="index_logged.php">Explore</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Register.php">Join</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                    <a class="navbar-brand" href="#"><img src="imagesN/cart.png" alt="logo" style="height: 28px;"></a>
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


    <!-- Cart Items -->
    <br>

    <br>
    <div class="container Cart">

        <table>

            <tr>

                <th>Product</th>

                <th>Quantity</th>

                <th>Subtotal</th>

            </tr>


            <?php
            // if(isset ($_GET["username"])){}

            $host = "localhost";
            $user = "root";
            $pswd = "";
            $db = "liyanage";
            $subtot = 0;


            $connect = new mysqli($host, $user, $pswd, $db);
            
            $ID = "SELECT userID FROM `user` WHERE email='$user_check'"; 
            $resID = mysqli_query($connect, $ID);
            $resultID = mysqli_num_rows($resID);
    
            if($resultID >0){
             while($row = mysqli_fetch_assoc($resID)){
                $userID = $row["userID"];
                #echo $row["userID"];;
            }
            }
            
            $query1 = "SELECT * FROM cart where `status`='1' && CustomerID = '$userID'";
            $result = $connect->query($query1);
            if (!$result) {
                die("invalid query . $connect->error");
            }

            $result_check = mysqli_num_rows($result);

            if ($connect->connect_error) {
                die("Connection Failed . $connect->error");
            }
            while ($row = $result->fetch_assoc()) {
                $quantity = $row['Quantity'];
                $price = $row["Price"];
                $sub = $quantity * $price;
                $subtot = $subtot + $sub;
                echo "
            <tr>
            <td>
  
              <div class='cart-info'>
                <div>
                  <p> " . $row['ProductName'] . "</p>
  
                  <span>" . $row["Price"] . "</span> <br />
  
                  <a class = 'btn btn-danger btn-sm' href='deleteCartItem.php?id=$row[CartID]'>remove</a>
  
                </div>
              </div>
  
            </td>
            <td>$quantity
            <a class = 'btn btn-primary btn-sm' href='updateQuantity.php?userid=$row[CustomerID]&quantity=$quantity&id=$row[ProductID]'>+</a>
            <a class = 'btn btn-danger btn-sm' href='mincart.php?userid=$row[CustomerID]&quantity=$quantity&id=$row[ProductID]'>-</a>
            </td>         
            <td>" . $sub . "</td>
  
          </tr>
  ";
            }

            ?>



        </table>

        <div class="total-price">

            <table>

                <tr>
                    <?php
                    $tax = $subtot * 11 / 100;
                    $fulltot = $subtot + $tax;
                    echo "
            
            <td>Subtotal</td>

            <td>" . $subtot . "</td>";

                    ?>



                </tr>


                <?php
                echo "
            <tr>
            <td>Tax</td>

            <td> " . $tax . "</td>

          </tr>

          <tr>

            <td>Total</td>

            <td>" . $fulltot . "</td>

          </tr>

            

           

            
        </table>
        

        <a href='proceedtocheckout.php?subtot=$fulltot' class='checkout btn'>Proceed To Checkout</a>
        ";
                ?>
        </div>

    </div>
    <?php

$query = "SELECT * FROM user WHERE userID='$userID'";
$result = mysqli_query($connect, $query);
while ($row = mysqli_fetch_array($result)) {
  
?>
<div class="container">
<div class="col-12 section-heading mb-3" style="font-weight: bold;">Delivery
                                            Information</div>
                                        <hr>
<div class="col-md-12 mb-3">
    <label clas="form-label">First Name</label>
    <input type="text" id="address" name="address" class="form-control"
     readonly value="<?php echo $row["firstname"]; ?>">
    <span id="address-error" style="color: red; font-size: 12px;"></span>
</div>
<div class="col-md-12 mb-3">
    <label clas="form-label">Last Name</label>
    <input type="text" id="address" name="address" class="form-control"
     readonly value="<?php echo $row["lastname"]; ?>">
    <span id="address-error" style="color: red; font-size: 12px;"></span>
</div>
<div class="col-md-12 mb-3">
    <label clas="form-label">Delivery Address</label>
    <input type="text" id="address" name="address" class="form-control"
    readonly value="<?php echo $row["address1"]; ?>">
    <span id="address-error" style="color: red; font-size: 12px;"></span>
</div>
<div class="col-md-12 mb-3">
    <label clas="form-label">Contact Number</label>
    <input type="text" id="address" name="address" class="form-control"
     readonly value="<?php echo $row["phone"]; ?>">
    <span id="address-error" style="color: red; font-size: 12px;"></span>
</div>
</div>
                        <?php
}
?>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>


    <!-- Latest Products -->




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
                        <li><a href="contactus_logged.php">Contact us </a>
                            <p>We're here, Let's talk</p>
                        </li>
                        <li><a href="abous_us_logged.html">About Us </a>
            <p>Get to know us</p>
        </li>
                            <li><a href="login.php">Singin </a>
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

    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>