<?php
session_start();
$user_check = $_SESSION['login_user'];

#echo $user_check;
$connect = mysqli_connect("localhost","root","","liyanage");

$id = "";
if(isset($_GET["id"])){
  $id = $_GET["id"];
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

  <link href="styleS.css" rel="stylesheet">
  <link rel="stylesheet" href="Stylesheet.css">
  <link rel="stylesheet" href="viewproduct.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&family=Rubik&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <script src="quantity.js"></script>

</style>

  <title>Liyanage Group</title>
</head>

<body>

  <!-----------------------------------------------------* Navbar *--------------------------------------------------------------------------------------------->
  <nav class="navbar navbar-expand-lg">
    <div class="container">

      <a class="navbar-brand" href="#"><img src="images/Logo.jpg" alt="logo" style="height: 80px;"></a>
      

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav m-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active navi" href="index_logged.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link smoothScroll" href="#product">Explore</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Register.php">Join</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Logout.php">Logout</a>
          </li>
          <a class="navbar-brand" href="updatedcart.php"><img src="imagesN/cart.png" alt="logo" style="height: 28px;"></a>
          <a class="navbar-brand" href="view_profile.php"><img src="imagesN/user.png" alt="logo" style="height: 28px;"></a>
        </ul>
        <form class="d-flex">
          <input class=" px-2 search" type="search" placeholder="Search" aria-label="Search">
          <button class="btn0 " type="submit" >Search</button>
        </form>
        
      </div>
    </div>
    

  </nav>

  <?php
}

$_SESSION["id"] =  $id;
$sql = "SELECT * FROM products WHERE id = $id";
$result = mysqli_query($connect,$sql);
?>

  <!-----------------------------------------------------* Navbar End *--------------------------------------------------------------------------------------------->

<!----------------------------Search Bar-------------------------------------->
<div class="searchbar">
<div class="container">
<div class="input-group mb-3">
  <div class="input-group-text p-0">
      <select class="form-select form-select-lg shadow-none bg-light border-0">
          <option>Categories</option>
          <option>Vegetables</option>
          <option>Fruits</option>
          <option>Grocery</option>
          <option>Meat</option>
          <option>Beverages</option>
          <option>Hoysehold</option>
      </select>
  </div>
  <input type="text" class="form-control" placeholder="Search Products">
  <button type="button" class="searchbut">Search</button>
</div>
</div>
</div>

<!----------------------------End of the Search Bar-------------------------------------->
<br>
<div class="container">        
  <table class="table-responsive w-100 p-3" >
    <tbody>
      <tr>
        <div class="cat">
          <td><img src="imagesN/vegetable_icon.png" alt="Product" style="height: 30px;"><a href="Vegetables.php">Vegetables</a></td>
          <td><img src="imagesN/friut_icon.png" alt="Product" style="height: 30px;"><a href="Fruit.php">Fruits</a></td>
          <td><img src="imagesN/grocery_icon.png" alt="Product" style="height: 30px;"><a href="Grocery.php">Grocery</a></td>
          <td><img src="imagesN/meat_icon.png" alt="Product" style="height: 30px;"><a href="Meat.php">Meat</a></td>
          <td><img src="imagesN/beverage_icon.png" alt="Product" style="height: 30px;"><a href="Beverages.php">Beverages</a></td>
          <td><img src="imagesN/household_icon.png" alt="Product" style="height: 30px;"><a href="Household.php">Household</a></td>
      </div>
      </tr>         
    </tbody>
  </table>
</div>

<!-----------------product View---------------------------->
<div class="container" id="product" >
<div class="card mb-3"  style="border-color: #2baf63; border-bottom-left-radius: 40px 40px; border-top-right-radius: 40px 40px;">
  <div class="row g-0">

   <?php
   
   if ($result) {
    foreach ($result as $row) {
        
     ?>
     
     
    <div class="col-md-4">
      <img src="upload\<?= $row['image']?>" class="img-fluid rounded-start" alt="product" width="100%">
    </div>
    <div class="col-md-8">
     <div class="card-body">
      <form method="POST" action="" > 
              <h5 class="card-title"><?= $row['productname']?></h5>
              <p class="card-text"><?= $row['description']?></p>
              <input type="text" style="color:white;border-color: transparent;" name="proid" id="proid" value="<?= $row['id']?>">
              <h6 class="card-text" id="price"  name="price">Rs. <?= $row['productprice']?>.00</h6>
              
              <input type="number" name="quan"  id="quan" min="0" max="<?= $row['quantity']?>" style="margin-left: 30px;margin-top: 30px;width:25%;">
              
              <?php
              if($row["quantity"] == 0){
                echo '<h4 style="color:red;padding-left: 30px;">Out of Stock</h4>';
              }
              else{
                echo '<h4 style="color:green;padding-left: 30px;">In Stock</h4>';
              }

              ?>
             

              <button class="addtocart" name="save">ADD TO CART</button>
                      
              
              <?php     
        

      }
    }


    $ID = "SELECT userID FROM `user` WHERE email='$user_check'"; 
    $resID = mysqli_query($connect, $ID);
    $resultID = mysqli_num_rows($resID);
    
    if($resultID >0){
      while($row = mysqli_fetch_assoc($resID)){
        $userID = $row["userID"];
        #echo $row["userID"];;
      }
    }

    
    $ProductDet = "SELECT productprice FROM products WHERE id = '$id'";
    $resProduct = mysqli_query($connect, $ProductDet);
    $resultproduct = mysqli_num_rows($resProduct);
    
    if($resultproduct >0){
      while($row = mysqli_fetch_assoc($resProduct)){
        ?>
        <input type="text" style="color:white;border-color: transparent;" name="price" value="<?php echo $row["productprice"]; ?>">
        
        <?php
        $price = $row["productprice"];

        #echo $price;
      }
    }


    $ProductDet = "SELECT productname FROM products WHERE id = '$id'";
    $resProduct = mysqli_query($connect, $ProductDet);
    $resultproduct = mysqli_num_rows($resProduct);
    
    if($resultproduct >0){
      while($row = mysqli_fetch_assoc($resProduct)){
        ?>
        <input type="text" style="color:white;border-color: transparent;" name="pname" value="<?php echo $row["productname"]; ?>">
        
        <?php
        $pname = $row["productname"];
        error_reporting(0);
                            
        $productname =$_POST["proname"];
        $query = "SELECT DISTINCT nickname,feedback FROM feedback WHERE productName='$pname'";
        $result = mysqli_query($connect,$query);
                    

        #echo $price;
      }
    }

        ?>
 
  
</form>
<form action="" method="POST">
  
</form>
<?php


if (isset($_POST['save'])) 
{

    $quantity = $_POST["quan"];
    $productname =$_POST["pname"];
    $status = 1;
    $p = $_POST["price"];
    $productid = $_POST["proid"];
    $ppid = intval($productid);

    if($quantity != 0)
{
  $data = "INSERT into cart (CustomerID, ProductName, Quantity, Price, status, ProductID) VALUES ( '$userID',  '$productname', '$quantity', '$p', '$status', '$ppid' )"; 
  $insert_run = mysqli_query($connect, $data);

  $update_quantity = "UPDATE `products` SET `quantity` = quantity-$quantity WHERE `products`.`productname` = '$productname'"; 
  $update = mysqli_query($connect, $update_quantity);

  if ($insert_run && $update) 
  {   
    #echo "reg success";
    #header('Location: updatedcart.php');
    #exit;  
    
  } else 
  {
    #echo "unseccess";
    #echo $connect->error;
    exit;
  }
  
}
else{
  echo '<span style="color:red;text-align:center;padding-top:50px;padding-left:40px;">Please add a quantity!</span>';
}
}

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
    $(function() {
        $('#save').click(function(e) {
            var valid = this.form.checkValidity();
            if (valid) {
                

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

 
    </div>
  </div>
</div>
</div>
</div>

<!-----------------------------Feedback section------------------------->

<div class="bg" >
  <div class="mt-0 mb-5 col-lg-10 col-md-12 offset-lg-1">
    
    <div class="col-lg-3 col-sm-12" style="padding-top: 40px;">
        <span style="font-size:21px;"><strong>Give us your valuable feedback</strong></span>
   
</div>
<div class="m-0 row">

        
            <div class="account-content-holder">
                <div class="m-0 row">
                    <div class="card" style="border-color: #2baf63;  ">
                        <div class="card-body" >
                    <div class="col-12 section-heading mb-3" style="font-weight: bold;">Share your idea about this product with us.</div><hr>
                    <div class="row mt-2">
                        
                        <form action="" method="POST">
                        <label class="form-label">Your Nickname(This name will display to others.)</label>
                        <input type="text" name="nickname" id="nickname" class="form-control">
                        <label class="form-label">Enter your feedback here.</label>
                        <input type="text" name="feedback" id="feedback" class="form-control">
                        
                            <br>
                       <button class="btn btn-success" style="width: 200px; height: 40px;" name="submit">Send my feedback</button><br><br>
                       <?php

$check =$_SESSION["id"];
$ProductDet = "SELECT productname FROM products WHERE id = '$check'";
$resProduct = mysqli_query($connect, $ProductDet);
$resultproduct = mysqli_num_rows($resProduct);

if($resultproduct >0){
  while($row = mysqli_fetch_assoc($resProduct)){
    ?>
    <input type="text" name="proname" style="color:transparent;border-color: transparent;" name="pname" value="<?php echo $row["productname"]; ?>">
    
    <?php
    

    #echo $price;
  }
}

if (isset($_POST['submit'])) 
{
 
  $_SESSION["id"] =  $id;
  $feedback = $_POST["feedback"];
  $productname =$_POST["proname"];
  $nickname = $_POST["nickname"];

    
  $insert_feedback = "INSERT INTO feedback ( UserID, productName, feedback,nickname) VALUES ( '$userID', '$productname', '$feedback','$nickname')"; 
  $insert_feed = mysqli_query($connect, $insert_feedback);

 

  if ($insert_feed ) 
  {   
    
    #echo "reg success";
    #header('Location: updatedcart.php');
    #exit;  
    
  } else 
  {
    #echo "unseccess";
    #echo $connect->error;
    exit;
  }
  
}
?>
  </form>
                    </div>                  
        </div>
        
       


    
        <div class="card-body" > 
                    <div class="col-12 section-heading mb-3" style="font-weight: bold;">Reviews</div><hr>
                    <?php
                           
                    
                    
                    while ($row = mysqli_fetch_array($result)) {
                      
                      ?>
                    <div class="row mt-2">
                      
                   
                    <p style="color:#2baf63;font-weight:600;font-size:15pt"><?php echo $row['nickname'];?></p>
             <p style="font-weight:400;font-size:14pt"><?php echo $row['feedback'];?></p>
                    </div> 
                    <?php
                    
                    }
                    ?>
        </div>
        

        </div>
  </div>
</div>
</div>
  </div>
</div>



 <br>
 <br>

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
        <h4>Menu </h4>
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
              <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-envelope"></span></button>
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