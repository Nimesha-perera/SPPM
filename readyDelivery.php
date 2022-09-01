<?php
if( isset ($_GET["orderID"])){
    $oID = $_GET["orderID"];
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "liyanage";
    
    
    $connect = new  mysqli($host,$user,$password,$db);
    $query = "UPDATE `checkout` SET status='Ready for the Delivery' WHERE `inx`= $oID ";
    $result = $connect->query($query);

}

header("location:orderstat.php");
exit;