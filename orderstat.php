<?php
session_start();


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Requests</title>
    <script type="text/javascript" src="Scripts/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="Scripts/bootstrap.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
    .text-font {
        font-size: 35px;
        font-weight: bolder;
    }

    .container-fluid {

        background-color: #2baf63;
    }

    .btn-primary {
        background-color: #2baf63;
    }

    .height {
        height: 100vh;
    }

    .error {
        color: red;
        font-size: large;

    }

    .success {
        color: green;
        font-size: large;

    }

    .error1 {
        color: red;
        font-size: large;

    }

    .success1 {
        color: green;
        font-size: large;

    }

    .error2 {
        color: red;
        font-size: large;

    }

    .success2 {
        color: green;
        font-size: large;

    }

    .hide {
        display: none;
    }

    .container {
        width: 100%;
        font-family: sans-serif;
        letter-spacing: 1px;
    }

    .container h2 {
        background: #0062cc;
        color: #fff;
        width: 200px;
        font-size: 24px;
        padding: 5px;
        height: 40px;

    }

    .container h2::after {
        content: '';
        border-top: 40px solid #0062cc;
        border-right: 40px solid transparent;
        position: relative;
        left: 48px;
        top: 34px;
    }

    .row {
        

    }

    img {
        width: 100%;

    }

    .product-bottom .fa {
        font-size: 10px;
    }

    .product-bottom .h3 {
        font-size: 20px;
        font-weight: bold;

    }

    .product-bottom .h4 {
        font-size: 15px;
        padding-bottom: 10px;
    }

    .overlay {
        display: block;
        opacity: 0;
        position: absolute;
        top: 20%;
        margin-left: 0;
        width: 70px;
    }

    .product-top:hover .overlay {
        opacity: 1;
        margin-left: 5%;
        transition: 0.5s;
    }

    .overlay .fa {
        cursor: pointer;
        background-color: #fff;
        color: #000;
        height: 35px;
        width: 35px;
        font-size: 20px;
        padding: 7px;
        margin: 5%;
        margin-bottom: 5%;

    }

    .overlay .btn-secondary {
        background: transparent !important;
        border: none !important;
        box-shadow: no !important;

    }
    </style>

</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2 height ">
                <p class="pt-5 pb-5 text-center">
                    <a href="orderstat.php" class="text-decoration-none"><span
                            class="text-light text-font">Admin</span></a>
                </p>




                <hr class="bg-light ">
                <p class="pt-2 pb-2 text-center">
                    <a href="products-add.php" class="text-decoration-none"><span class="text-light">View
                            Orders</span></a>
                </p>
                <hr class="bg-light ">

                <p class="pt-2 pb-2 text-center">
                    <a href="viewproducts.php" class="text-decoration-none"><span class="text-light">View
                            Products</span></a>
                </p>

                <hr class="bg-light ">
                <p class="pt-2 pb-2 text-center">
                    <a href="addproduct.php" class="text-decoration-none"><span class="text-light">Add
                            Products</span></a>
                </p>

                <hr class="bg-light ">
            </div>



            <div class="col-sm-10 bg-light">
                <div class="row">
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-8">
                        <h1 class="text-center pt-4 pb-5"><strong>Order Requests</strong></h1>
                        <hr class="w-25 mx-auto">
                    </div>
                    <div class="col-sm-2">
                        <p class="pt-5 text-center">
                            <a href="logout.php" class="btn btn-outline-primary">Logout</a>
                        </p>
                    </div>
                </div>
                <div class="container mx-auto">

                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Order ID</th>
                                <th scope="col">Order Status</th>
                                <th scope="col">Customer ID</th>
                                <th scope="col">Sub Total</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $host = "localhost";
                            $user = "root";
                            $password = "";
                            $db = "liyanage";


                            $connect = new  mysqli($host, $user, $password, $db);
                            $query = "SELECT DISTINCT inx,status,CustomerID,subtot FROM `checkout`";
                            $result = $connect->query($query);

                            if (!$result) {
                                die("Invalid query" . $connect->error);
                            }
                            $resultcheck = mysqli_num_rows($result);

                            if ($connect->connect_error) {
                                die("Connecton Failed: . $connect -> connect_error");
                            }
                            while ($row = $result->fetch_assoc()) {


                                echo "
                        <td>" . $row["inx"] . "</td>
                        <td>" . $row["status"] . "</td>
                        <td>" . $row["CustomerID"] . "</td>
                        <td>" . $row["subtot"] . "</td>
                       
                       

                        
                        <td> 
                        <a class = 'btn btn-warning btn-sm 'href = 'ordersummary.php?orderID=$row[inx]' >View Ordered Products</a>
                        <a class = 'btn btn-primary btn-sm 'href = 'readyDelivery.php?orderID=$row[inx]' >Ready for the delivery</a>
                        <a class = 'btn btn-success btn-sm 'href = 'completeOrder.php?orderID=$row[inx]'> Complete order</a>

                        </td>
                        </tr>
                        ";
                            }


                            ?>
                        </tbody>
                    </table>




                </div>

            </div>
        </div>

    </div>


</body>

</html>