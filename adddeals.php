<?php



if (isset($_POST[''])) {
    $productname = $_POST['productname'];
    $price = $_POST['price'];
    $deal = $_POST['deal'];
    $image = $_FILES['image']['name'];

    $query = "INSERT INTO product ('productname', 'price', 'deal', 'image') VALUES ('$productname', $price, $deal, $image)";
    $query_run = mysqli_query($connection, $query);
    
}