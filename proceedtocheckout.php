<?php
session_start();
$user_check = $_SESSION['login_user'];

if(isset($_GET["subtot"])){
    $fulltot = $_GET["subtot"];
}
$host = "localhost";
$user ="root";
$pswd = "";
$db = "liyanage";
//$subtot = 0;


$connect = new mysqli($host,$user,$pswd,$db);
$query1 = "SELECT * FROM cart";
$result = $connect->query($query1);

$ID = "SELECT userID FROM `user` WHERE email='$user_check'"; 
    $resID = mysqli_query($connect, $ID);
    $resultID = mysqli_num_rows($resID);
    
    if($resultID >0){
      while($row = mysqli_fetch_assoc($resID)){
        $userID = $row["userID"];
        #echo $row["userID"];;
      }
    }

if(!$result){
    die("invalid query . $connect->error");
  
  }

  $result_check= mysqli_num_rows($result);
  $number = rand(0,1000);
  if($connect->connect_error){
    die("Connection Failed . $connect->error");
  }
 
  while($row = $result->fetch_assoc()){

    $customer = $row["CustomerID"];
    $product = $row["ProductName"];
    $quantity = $row["Quantity"];
    $price = $row["Price"];
    $cart = $row["CartID"];

    $cart_array = array(
    
     $product,
    $quantity,
      $price
    );
    $serialized_cartdata = json_encode($cart_array);
    $status = 1;

if($customer == $userID){

  $sql = "INSERT INTO checkout(inx , CustomerID, summary, status, subtot) value ('$number','$customer','$serialized_cartdata', '$status', '$fulltot')";
  $sql2= "UPDATE `cart` SET `status`='0' WHERE `CartID`=$cart";
  mysqli_query($connect, $sql);
  mysqli_query($connect, $sql2);

}else{
  echo "error";
}
   
}

  $sql1 = "SELECT summary FROM checkout";
$result = mysqli_query($connect, $sql1);
 
while($data = mysqli_fetch_array($result))
{
 // convert JSON to array
 
   $array = json_decode($data["summary"],true);
   print_r($array);
}
header("location:updatedcart.php");
exit;



