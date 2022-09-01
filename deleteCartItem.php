<?php
if( (isset ($_GET["id"]))){
    $uID = $_GET["id"];
    $quantity =$_GET["quantity"];
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "liyanage";
    
    $connect = new  mysqli($host,$user,$password,$db);
    $query = "DELETE FROM `cart` WHERE `CartID`= $uID";
    $result = $connect->query($query);

}
header("location:updatedcart.php");
exit;