<?php
// Start the session
session_start();
?>

<?php
// Set session variables
$_SESSION["UserID"] = "1";
?>

<?php

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

  <link href="styleS.css" rel="stylesheet">
  <link rel="stylesheet" href="Stylesheet.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&family=Rubik&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<style>
  .main {
    background: linear-gradient(rgba(0, 0, 0, 0.5),
            rgba(0, 0, 0, 0.5)), url(imagesN/cocacola.jpg);
    background-size: cover;
    height: 80vh;
    width: 100%;
    background-position: 50% 50%;
}
</style>

  <title>Liyanage Group</title>
</head>

<body>

  <!-----------------------------------------------------* Navbar *--------------------------------------------------------------------------------------------->
  <nav class="navbar navbar-expand-lg">
    <div class="container">

      <a class="navbar-brand" href="#"><img src="imagesN/Logo.jpg" alt="logo" style="height: 80px;"></a>
      

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav m-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active navi" href="index.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link smoothScroll" href="#product">Explore</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Register.html">Join</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Login.html">Signin</a>
          </li>
          <a class="navbar-brand" href="updatedcart.html"><img src="imagesN/cart.png" alt="logo" style="height: 28px;"></a>
          <a class="navbar-brand" href="view_profile.html"><img src="imagesN/user.png" alt="logo" style="height: 28px;"></a>
        </ul>
        <form class="d-flex">
          <input class=" px-2 search" type="search" placeholder="Search" aria-label="Search">
          <button class="btn0 " type="submit">Search</button>
        </form>
        
      </div>
    </div>
    

  </nav>

  <p>its working</p>

  <!-----------------------------------------------------* Navbar End *--------------------------------------------------------------------------------------------->



  <!-----------------------------------------------------* Main Section *--------------------------------------------------------------------------------------------->
  <section class="main">

    <div class="container py-5">
      <div class="row py-5">
        <div class="col-lg-7 pt-5 ">
          <h1 class="pt-5">The Beverage Movement</h1>
          <p>Buy your Beverages here</p>
          <div class="col text-center">
            <button class="btn1 mt-3" ><a class="smoothScroll" href="#product">Explore the products</a>  </button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-----------------------------------------------------* Main Section End *--------------------------------------------------------------------------------------------->
  
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
  <input type="text" class="form-control" placeholder="Search Products" name="search_data">
  <button type="submit" class="searchbut" name="search_data_product">Search</button>
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

<!-----------------product list-->

<section class="product" id="product">
  <div class="container py-5">

    <div class="row">
    <?php

$query = "SELECT * FROM products WHERE Category='Beverage'";
$result = mysqli_query($connect,$query);


while ($row = mysqli_fetch_array($result)) {
  
  ?>

      <div class="col-lg-3 text-center">
        <div class="card border-0 bg-light mb-2">
          <div class="card-body">

            
            <form method="get" action="ProductView.php?id=<?=$row['Pid']?>">
            <img src="upload\<?= $row['image']?>" class="image-fluid" style="height: 300px;">

            
            
          </div>
        </div>
        <h6><?= $row['Pname']?></h6>
        
          <p>Rs. <?= $row['Price']?>.00</p>
          
          <button type="button" class="btncart btn-sm">
          <span class="glyphicon glyphicon-shopping-cart"></span> <a href="ProductView.php?id=<?php echo $row["Pid"]; ?>">View Product</a>
        </button>
      </div>
      
          <?php }
          ?>

</section>
 
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
            <li><a class="smoothScroll" href="#product">Explore </a>
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
