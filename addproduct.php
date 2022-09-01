<?php
require_once('addp.php');
session_start();

$conn = mysqli_connect("localhost", "root", "", "liyanage");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <style>
    body {
        font-family: 'Roboto', sans-serif;
    }

    .text-font {
        font-size: 35px;
        font-weight: bolder;
    }

    .container-fluid {
        background-color: #ffffff;
    }

    .paneltext {
        color: #ffffff;
    }

    .headertxt {
        margin-top: 5%;
        color: #000;
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

    select {
        -webkit-appearance: none;
    }

    select>option {
        text-align: center;
    }

    #categories2 {
        background-color: #2baf63;
        color: white;
        border: none;
        align-items: center;
    }

    .textinstr {
        color: #2baf63;
    }

    .col-sm-10 {
        /* background:
            linear-gradient(rgba(0, 0, 0, 0.7),
                rgba(0, 0, 0, 0.7)), url(images/bg2.jpg);*/
        background-color: #ffffff;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 100%;
        background-size: cover;
    }

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

        margin-top: 5%;
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
                    <a href="admin-panel.php" class="text-decoration-none"><span
                            class="text-light text-font">Admin</span></a>
                </p>




                <hr class="bg-light ">
                <p class="pt-2 pb-2 text-center">
                    <a href="orderstat.php" class="text-decoration-none"><span class="text-light">View
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
                        <p class="text-center pt-5">
                            <mg class="rounded" src="" width="150px" height="140px">
                        </p>
                    </div>
                    <div class="col-sm-8">
                        <h1 class="text-center headertxt"><strong>Add Products</strong></h1>
                        <hr class="w-25 mx-auto">
                    </div>
                    <div class="col-sm-2">
                        <p class="pt-5 text-center">
                            <a href="logout.php" class="btn btn-outline-primary">Logout</a>
                        </p>
                    </div>

                    <div class="col-sm-2">
                        <p class="pt-5 text-center">

                        </p>
                    </div>
                </div>
                <div class="container mx-auto">
                    <form action="addp.php" id="the-form" class="form-control w-50 mx-auto"
                        enctype="multipart/form-data" method="post">
                        <label class="pt-4 pb-2 text-center">Enter product name</label>
                        <input type="text" class="form-control" required id="productname" name="productname"
                            placeholder="Enter Product name">
                        <label class="pt-4 pb-2 text-center">Enter brand name</label>
                        <input type="text" class="form-control" required id="brandname" name="brandname"
                            placeholder="Enter brand name">
                        <label class="pt-4 pb-2 text-center">Enter product price</label>
                        <input type="text" class="form-control" required id="productprice" name="productprice"
                            placeholder="Enter Product price">
                        <label class="pt-4 pb-2 text-center">Enter quantity</label>
                        <input type="text" class="form-control" required id="quantity" name="quantity"
                            placeholder="Enter quantity">
                        <label class="pt-4 pb-2 text-center">Enter description</label>
                        <input type="textarea" class="form-control" required id="description" name="description"
                            placeholder="Enter description">
                        <label class="pt-4 pb-2 text-center" for="categories">Choose a category</label>
                        <select class="form-control" id="category" name="category">
                            <option value="">Choose your category</option>
                            <option value="Vegetables">Vegetables</option>
                            <option value="Fruits">Fruits</option>
                            <option value="Beverages">Beverages</option>
                            <option value="Household">Household</option>
                            <option value="Meat">Meat</option>
                            <option value="Grocery">Grocery</option>
                        </select>
                        <br>
                        <p class="textinstr "><strong>Upload product images</strong></p>
                        <input type="file" required name="image" class="form-control" multiple>
                        <p>
                        </p><br>
                        <!---div class="container w-25 mx-auto"--->
                        <!----div class="hide"><img class="mx-auto" style="height: 50px; width: 50px;"src="/test123/products-images/ajax-loader.gif"></div---->
                        <!--/div--->
                        <br>
                        <button type="submit" class="btn btn-primary form-control" id="btnSubmit" name="btnSubmit"
                            value="post" onclick="myFunction()">Add product </button>

                        <script>
                        function myFunction() {
                            alert("ITEM ADDED");
                        }
                        </script>

                        <br><br>
                        <div class="error"></div>
                        <div class="success"></div>
                    </form>
                    <br><br>
                </div>
            </div>
        </div>
    </div>
</body>

</html>