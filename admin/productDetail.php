<?php

session_start();
// print_r($_SESSION);
// echo 'eer';
if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
}


// Include database connection file
include 'database.php'; // Assuming you've created this file to establish database connection

// Check if product ID is provided in the URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $product_id = $_GET['id'];

    // Fetch product details from the database
    $sql = "SELECT * FROM products WHERE id = $product_id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Product found, display edit form
        $row = $result->fetch_assoc();
?>

        <!DOCTYPE html>
        <!-- Coding By CodingNepal - codingnepalweb.com -->
        <html lang="en">

        <head>
            <meta charset="UTF-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <title>Product Detail | Formula1</title>
            <link rel="stylesheet" href="index.css" />
            <!-- Fontawesome CDN Link -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
            <!-- bootstrap link -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        </head>

        <body>
            <style>
                body {
    font-family: 'Roboto Condensed', sans-serif;
    background-color: #f5f5f5
}

.hedding {
    font-size: 20px;
    color: #ab8181`;
}

.main-section {
    position: absolute;
    left: 50%;
    right: 50%;
    transform: translate(-50%, 5%);
}

.left-side-product-box img {
    width: 100%;
}

.left-side-product-box .sub-img img {
    margin-top: 5px;
    width: 83px;
    height: 100px;
}

.right-side-pro-detail span {
    font-size: 15px;
}

.right-side-pro-detail p {
    font-size: 25px;
    color: #a1a1a1;
}

.right-side-pro-detail .price-pro {
    color: #E45641;
}

.right-side-pro-detail .tag-section {
    font-size: 18px;
    color: #5D4C46;
}

.pro-box-section .pro-box img {
    width: 100%;
    height: 200px;
}

@media (min-width:360px) and (max-width:640px) {
    .pro-box-section .pro-box img {
        height: auto;
    }
}
            </style>
            <?php include 'navbar.php'; ?>


            <main class="main">
                <div class="admin-dashboard bg-secondary-subtle">
                    <div class="header-section">
                        <h1>Detail Prodcut</h1>
                    </div>
                    <div class="container">
                        <div class="col-lg-8 border p-3 main-section bg-white">
                            <div class="row hedding m-0 pl-3 pt-0 pb-3">
                                Product Detail Design Using Bootstrap 4.0
                            </div>
                            <div class="row m-0">
                                <div class="col-lg-4 left-side-product-box pb-3">
                                    <img src="http://nicesnippets.com/demo/pd-image1.jpg" class="border p-3">
                                    <span class="sub-img">
                                        <img src="http://nicesnippets.com/demo/pd-image2.jpg" class="border p-2">
                                        <img src="http://nicesnippets.com/demo/pd-image3.jpg" class="border p-2">
                                        <img src="http://nicesnippets.com/demo/pd-image4.jpg" class="border p-2">
                                    </span>
                                </div>
                                <div class="col-lg-8">
                                    <div class="right-side-pro-detail border p-3 m-0">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <span>Who What Wear</span>
                                                <p class="m-0 p-0">Women's Velvet Dress</p>
                                            </div>
                                            <div class="col-lg-12">
                                                <p class="m-0 p-0 price-pro">$30</p>
                                                <hr class="p-0 m-0">
                                            </div>
                                            <div class="col-lg-12 pt-2">
                                                <h5>Product Detail</h5>
                                                <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                    quis nostrud exercitation ullamco laboris.</span>
                                                <hr class="m-0 pt-2 mt-2">
                                            </div>
                                            <div class="col-lg-12">
                                                <p class="tag-section"><strong>Tag : </strong><a href="">Woman</a><a href="">,Man</a></p>
                                            </div>
                                            <div class="col-lg-12">
                                                <h6>Quantity :</h6>
                                                <input type="number" class="form-control text-center w-100" value="1">
                                            </div>
                                            <div class="col-lg-12 mt-3">
                                                <div class="row">
                                                    <div class="col-lg-6 pb-2">
                                                        <a href="#" class="btn btn-danger w-100">Add To Cart</a>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <a href="#" class="btn btn-success w-100">Shop Now</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 text-center pt-3">
                                    <h4>More Product</h4>
                                </div>
                            </div>
                            <div class="row mt-3 p-0 text-center pro-box-section">
                                <div class="col-lg-3 pb-2">
                                    <div class="pro-box border p-0 m-0">
                                        <img src="http://nicesnippets.com/demo/pd-b-image1.jpg">
                                    </div>
                                </div>
                                <div class="col-lg-3 pb-2">
                                    <div class="pro-box border p-0 m-0">
                                        <img src="http://nicesnippets.com/demo/pd-b-images2.jpg">
                                    </div>
                                </div>
                                <div class="col-lg-3 pb-2">
                                    <div class="pro-box border p-0 m-0">
                                        <img src="http://nicesnippets.com/demo/pd-b-images3.jpg">
                                    </div>
                                </div>
                                <div class="col-lg-3 pb-2">
                                    <div class="pro-box border p-0 m-0">
                                        <img src="http://nicesnippets.com/demo/pd-b-images4.jpg">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="container" style="min-height: 50px;"></div>
                </div>
            </main>


            <script src="script.js"></script>
            <script>
                if (window.history.replaceState) {
                    window.history.replaceState(null, null, window.location.href);
                }
            </script>
        </body>

        </html>
<?php
    } else {
        echo "Product not found";
    }
} else {
    echo "Product ID is missing";
}
?>