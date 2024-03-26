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
    <title>Update Product | Formula1</title>
    <link rel="stylesheet" href="index.css" />
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php include 'navbar.php'; ?>


    <main class="main">
        <div class="admin-dashboard bg-secondary-subtle">
            <div class="header-section">
                <h1>Update Prodcut</h1>
            </div>
            <div class="container">



                <form action="update_product.php" method="POST" style="margin: 20px auto;"
                    enctype="multipart/form-data">
                    <!-- Include a hidden id  -->

                    <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">

                    <!-- product name -->
                    <div class="row mb-3">
                        <label for="productName" class="col-sm-2 col-form-label">Product Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="productName" name="productName"
                                value="<?php echo $row['name']; ?>" required>
                        </div>
                    </div>

                    <!-- product price -->
                    <div class="row mb-3">
                        <label for="productPrice" class="col-sm-2 col-form-label">Product Price</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="productPrice" name="productPrice"
                                value="<?php echo $row['price']; ?>" required>
                        </div>
                    </div>

                    <!-- product image 1 -->
                    <div class="row mb-3">
                        <label for="productImage1" class="col-sm-2 col-form-label">Product Image 1</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="productImage1" accept="image/*"
                                name="productImage1" >
                        </div>
                    </div>

                    <!-- product image 2 -->
                    <div class="row mb-3">
                        <label for="productImage2" class="col-sm-2 col-form-label">Product Image 2</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="productImage2" accept="image/*"
                                name="productImage2" >
                        </div>
                    </div>

                    <!-- product image 3 -->
                    <div class="row mb-3">
                        <label for="productImage3" class="col-sm-2 col-form-label">Product Image 3</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="productImage3" accept="image/*"
                                name="productImage3" >
                        </div>
                    </div>

                    <!-- product description -->
                    <div class="row mb-3">
                        <label for="productDescription" class="col-sm-2 col-form-label">Product Description</label>
                        <div class="col-sm-10">
                            <textarea id="productDescription" class="form-control" name="productDescription"
                                required><?php echo $row['description']; ?></textarea>
                        </div>
                    </div>
                    <div class="d-grid gap-2 col-6 mx-auto">

                        <button type="submit" name="update_product" class="btn btn-primary">Update Product</button>
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
    } else {
        echo "Product not found";
    }
} else {
    echo "Product ID is missing";
}
?>

<?php
// Include database connection
require_once('database.php'); // Adjust the path as per your directory structure

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_id']) && !empty($_POST['product_id'])) {
    //  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {

    // Retrieve form data
    $productId = $_POST['product_id'];
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $productDescription = $_POST['productDescription'];

    // File upload handling for product images
    $targetDir = "../uploads/"; // Adjust the path to your uploads directory
    // $targetFile1 = $targetDir . basename($_FILES["productImage1"]["name"]);
    // $targetFile2 = $targetDir . basename($_FILES["productImage2"]["name"]);
    // $targetFile3 = $targetDir . basename($_FILES["productImage3"]["name"]);

    // Move uploaded files to the target directory
    // move_uploaded_file($_FILES["productImage1"]["tmp_name"], $targetFile1);
    // move_uploaded_file($_FILES["productImage2"]["tmp_name"], $targetFile2);
    // move_uploaded_file($_FILES["productImage3"]["tmp_name"], $targetFile3);

    // Insert product details into the database
    // $sql = "INSERT INTO products (name, price, image1, image2, image3, description) VALUES ('$productName', '$productPrice', '$targetFile1', '$targetFile2', '$targetFile3', '$productDescription')";

    // Update product details in the database
    // $sql = "UPDATE products SET name = '$productName', price = '$productPrice' , image1 = '$targetFile1' , image2 = '$targetFile2' , image3 = '$targetFile3', description = '$productDescription' WHERE id = $productId";

    // $result = mysqli_query($conn, $sql);
     
    // Check which fields are provided in the form and construct the update query accordingly
    $update_query_parts = array();
    if (isset($_POST['productName']) && !empty($_POST['productName'])) {
        $product_name = $_POST['productName'];
        $update_query_parts[] = "name = '$product_name'";
    }

    if (isset($_POST['productPrice']) && !empty($_POST['productPrice'])) {
        $product_price = $_POST['productPrice'];
        $update_query_parts[] = "price = '$product_price'";
    }
    
    if (isset($_POST['productDescription']) && !empty($_POST['productDescription'])) {
        $product_description = $_POST['productDescription'];
        $update_query_parts[] = "description = '$product_description'";
    }

    //images
    if (isset($_FILES["productImage1"]["name"]) && !empty($_FILES["productImage1"]["name"])) {
        $targetFile1 = $_FILES["productImage1"]["name"];
        // Move uploaded files to the target directory
        move_uploaded_file($_FILES["productImage1"]["tmp_name"], $targetFile1);
        $update_query_parts[] = "image1 = '$targetFile1'";
    }

    if (isset($_FILES["productImage2"]["name"]) && !empty($_FILES["productImage2"]["name"])) {
        $targetFile2 = $_FILES["productImage2"]["name"];
        // Move uploaded files to the target directory
        move_uploaded_file($_FILES["productImage2"]["tmp_name"], $targetFile2);
        $update_query_parts[] = "image2 = '$targetFile2'";
    }

    if (isset($_FILES["productImage3"]["name"]) && !empty($_FILES["productImage3"]["name"])) {
        $targetFile3 = $_FILES["productImage3"]["name"];
        // Move uploaded files to the target directory
        move_uploaded_file($_FILES["productImage3"]["tmp_name"], $targetFile3);
        $update_query_parts[] = "image3 = '$targetFile3'";
    }
    
    // Construct the final update query
    $update_query = "UPDATE products SET " . implode(", ", $update_query_parts) . " WHERE id = $productId";
    

    if ($conn->query($update_query) === TRUE) {
        // Display flash message upon successful submission
        echo "<script>alert('Product updated successfully!');</script>";
        // die("<span class='success'>Product added successfully!</span>");
        header("Location: products.php?update=yes");
        exit();
        // unset($_POST['add_product']);
    } else {
        echo "Error updating product: " . $conn->error;

        // echo "Error: " . $sql . "<br>" . $conn->error;
        // unset($_POST['add_product']);
    }

    // Close connection
    // $conn->close();
} else {
    echo "Invalid request";
}
?>