<?php
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
}
// if (isset($_GET['update']) && !empty($_GET['update'])) {
//     // unset($_GET['update']);
//     echo "<script>alert(Product".$_GET['update']." updated successfully!');</script>";
// }
?>



<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard | Formula1</title>
    <link rel="stylesheet" href="index.css" />
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <style>
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            width: 300px;
            height: 620px;
            margin: auto;
            text-align: center;
            font-family: arial;
        }

        .card img {
            width: 250px;
            height: 350px;
            margin: auto;
        }

        .price {
            color: grey;
            font-size: 22px;
        }

        /* .card a {
            border: none;
            outline: 0;
            text-decoration: none;
            width: 100%;
            padding: 12px;
            color: white;
            background-color: lightgreen;
            text-align: center;
            cursor: pointer;
            width: 100%;
            font-size: 14px;
        } */

        /* .card .product-detail {
            background-color: lightcoral;
        } */

        .card a:hover {
            opacity: 0.7;
        }
    </style>
    <?php include 'navbar.php'; ?>


    <main class="main">
        <div class="admin-dashboard">
            <div class="header-section">
                <h1>Our Products</h1>
            </div>
            <div class="container">
                <div class="row ">

                    <?php
                    // Include database connection file
                    include 'database.php'; // Assuming you've created this file to establish database connection

                    // Fetch products from the database
                    $sql = "SELECT * FROM products"; // Assuming 'products' is your table name
                    $result = $conn->query($sql);

                    // Check if there are any products
                    if ($result->num_rows > 0) {
                        // echo "<h2>Products</h2>";
                        // echo "<table border='1'>";
                        // echo "<tr><th>ID</th><th>Name</th><th>Price</th><th>Description</th><th>Image</th></tr>";

                        // Output data of each product
                        while ($row = $result->fetch_assoc()) {
                            // echo "<tr>";
                            // echo "<td>" . $row["id"] . "</td>";
                            // echo "<td>" . $row["name"] . "</td>";
                            // echo "<td>$" . $row["price"] . "</td>";
                            // echo "<td>" . $row["description"] . "</td>";
                            // echo "<td><img src='" . $row["image1"] . "' alt='Product Image' style='width:100px;height:100px;'></td>"; // Adjust width and height as needed
                            // echo "</tr>";
                    ?>

                            <div class="col-12 my-2  py-2  bg-secondary">
                                <div class="row">
                                    <div class="col-1">
                                        <p>Product Id : <?php echo $row["id"]  ?></p>

                                    </div>
                                    <div class="col-3">

                                        <img src=<?php echo $row["image1"]  ?> alt=<?php echo $row["name"]  ?> style="width:100%">
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col">
                                            <h3><?php echo $row["name"]  ?></h3>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                            <p><?php echo $row["description"]  ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                            <p class="price">$<?php echo $row["price"]  ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="row">
                                            <div class="col">
                                            <div class="p-1"><a class="btn btn-warning" href=<?php echo 'update_product.php?id=' . $row["id"] ?>>Update Product</a></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                            <div class="p-1"><a class="btn btn-primary" href=<?php echo 'productDetail.php?id=' . $row["id"] ?>>Product Detail</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }

                        // echo "</table>";
                    } else {
                        echo "No products available";
                    }

                    // Close database connection
                    $conn->close();
                    ?>

                </div>

            </div>
        </div>
    </main>


    <script src="script.js"></script>
</body>

</html>