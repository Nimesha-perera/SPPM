<?php
if( (isset ($_GET["id"]) ||( $_GET["userid"] )||( $_GET["quantity"]))){
    $uID = $_GET["userid"];
    $pid = $_GET["id"];
    $quantity =$_GET["quantity"];
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "liyanage";
    $count = $quantity+1;
    echo " $count";
    
    $connect = new  mysqli($host,$user,$password,$db);
    $query = "UPDATE `cart` SET Quantity= $count WHERE `ProductID`= $pid AND `CustomerID` = $uID";
    $result = $connect->query($query);

}
else{
    echo "error";
}
header("location: updatedcart.php");
exit;