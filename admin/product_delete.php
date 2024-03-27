<?php
session_start();

if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
}
?>

<?php
// Include database connection file
include 'database.php'; // Assuming you've created this file to establish database connection

// Check if product ID is provided in the URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $product_id = $_GET['id'];

    // Fetch product details from the database
    $sql = "DELETE  FROM products WHERE id = $product_id";
    $result = $conn->query($sql);

    if ($conn->query($sql) === TRUE) {
        // Product found, display edit form
        // $row = $result->fetch_assoc();
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
                        <h1>Prodcut with Id <?php echo $product_id ?> Deleted successfully.</h1>
                    </div>
                    <div class="row">
                        <div class="col-2  mx-auto">
                        <a href="products.php" class="btn btn-primary">Go to Products</a>
                        </div>
                    </div>
                    <div class="container" style="min-height: 50px;"></div>
                </div>
            </main>
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Product !</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure to delete product?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <a href="product_delete.php?id=<?php echo $row['id'];?>"  class="btn btn-danger confirm-delete">Delete Product</a>
                        </div>
                    </div>
                </div>
            </div>


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
    } else {
        echo "Product not found or already deleted";
        echo " <div class='row'>
        <div class='col-2  mx-auto'>
        <a href='products.php' class='btn btn-primary'>Go to Products</a>
        </div>
    </div>";
    }
} else {
    echo "Product ID is missing";

}
?>