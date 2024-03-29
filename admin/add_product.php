<?php
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
}
?>

<?php
// echo $_SERVER["REQUEST_METHOD"] ;
// echo $_POST['add_product'];
if($_SERVER["REQUEST_METHOD"] != "POST" ){
?>

<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Product | Formula1</title>
    <link rel="stylesheet" href="index.css" />
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php include 'navbar.php'; ?>


    <main class="main">
        <div class="admin-dashboard bg-secondary-subtle">
            <div class="header-section">
                <h1>Add Prodcut</h1>
            </div>
            <div class="container">
                <form action="add_product.php" method="POST" style="margin: 20px auto;" enctype="multipart/form-data">
                    <!-- Include a hidden field for the token -->

                    <!-- product name -->
                    <div class="row mb-3">
                        <label for="productName" class="col-sm-2 col-form-label">Product Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="productName" name="productName" required>
                        </div>
                    </div>

                    <!-- product price -->
                    <div class="row mb-3">
                        <label for="productPrice" class="col-sm-2 col-form-label">Product Price</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="productPrice" name="productPrice" required>
                        </div>
                    </div>

                    <!-- product image 1 -->
                    <div class="row mb-3">
                        <label for="productImage1" class="col-sm-2 col-form-label">Product Image 1</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="productImage1" accept="image/*" name="productImage1" required>
                        </div>
                    </div>

                    <!-- product image 2 -->
                    <div class="row mb-3">
                        <label for="productImage2" class="col-sm-2 col-form-label">Product Image 2</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="productImage2" accept="image/*" name="productImage2" required>
                        </div>
                    </div>

                    <!-- product image 3 -->
                    <div class="row mb-3">
                        <label for="productImage3" class="col-sm-2 col-form-label">Product Image 3</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="productImage3" accept="image/*" name="productImage3" required>
                        </div>
                    </div>

                    <!-- product description -->
                    <div class="row mb-3">
                        <label for="productDescription" class="col-sm-2 col-form-label">Product Description</label>
                        <div class="col-sm-10">
                            <textarea id="productDescription" class="form-control" name="productDescription" required></textarea>
                        </div>
                    </div>
                    <div class="d-grid gap-2 col-6 mx-auto">

                        <button type="submit" name="add_product" class="btn btn-primary">Add Product</button>
                    </div>
                </form>
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

}?>
<?php
// Include database connection
require_once('database.php'); // Adjust the path as per your directory structure

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_product'])) {
    //  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {

    // Retrieve form data
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $productDescription = $_POST['productDescription'];

    // File upload handling for product images
    $targetDir = "../uploads/"; // Adjust the path to your uploads directory
    $targetFile1 = $targetDir . basename($_FILES["productImage1"]["name"]);
    $targetFile2 = $targetDir . basename($_FILES["productImage2"]["name"]);
    $targetFile3 = $targetDir . basename($_FILES["productImage3"]["name"]);

    // Move uploaded files to the target directory
    move_uploaded_file($_FILES["productImage1"]["tmp_name"], $targetFile1);
    move_uploaded_file($_FILES["productImage2"]["tmp_name"], $targetFile2);
    move_uploaded_file($_FILES["productImage3"]["tmp_name"], $targetFile3);

    // Insert product details into the database
    $sql = "INSERT INTO products (name, price, image1, image2, image3, description) VALUES ('$productName', '$productPrice', '$targetFile1', '$targetFile2', '$targetFile3', '$productDescription')";

    // $result = mysqli_query($conn, $sql);

    if ($conn->query($sql) === TRUE) {
        // $_SESSION['status'] = "<Type Your success message here>";

        // if (isset($_SESSION['status'])) {
?>
        <!DOCTYPE html>
        <!-- Coding By CodingNepal - codingnepalweb.com -->
        <html lang="en">

        <head>
            <meta charset="UTF-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <title>Product Delete | Formula1</title>
            <link rel="stylesheet" href="index.css" />
            <!-- Fontawesome CDN Link -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
            <!-- bootstrap link -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        </head>

        <body>
            <?php include 'navbar.php'; ?>


            <main class="main">
                <div class="admin-dashboard bg-secondary-subtle">
                    <div class="header-section">
                        <h1>Prodcut Added successfully.</h1>
                    </div>
                    <div class="row">
                        <div class="col-2  mx-auto">
                            <a href="products.php" class="btn btn-primary">Go to Products</a>
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
                // const myModal = document.getElementById('myModal')
                // const myInput = document.getElementById('myInput')

                // myModal.addEventListener('shown.bs.modal', () => {
                //     myInput.focus()
                // })
                // $('#staticBackdrop').appendTo("body") 
            </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        </body>

        </html>

<?php
        
        // echo "<script>alert('Product added successfully!');</script>";
        // die("<span class='success'>Product added successfully!</span>");
        unset($_POST['add_product']);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        // unset($_POST['add_product']);
    }

    // Close connection
    // $conn->close();
}
?>