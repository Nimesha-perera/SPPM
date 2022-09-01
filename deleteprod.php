<?php

$conn = mysqli_connect("localhost", "root", "", "liyanage");
if (isset($_POST['deletebtn'])) {
    $id = $_POST['deleteid'];

    $query = "DELETE  FROM products WHERE  id='$id' ";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        header('Location: viewproducts.php');
    } else {
        header('Location: viewproducts.php');
    }
}