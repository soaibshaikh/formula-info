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
            <?php include 'navbar.php'; ?>


            <main class="main">
                <div class="admin-dashboard bg-secondary-subtle">
                    <div class="header-section" style="height: 150px; margin-bottom:20px; align-items:end;">
                        <h1>Product Details of Id  <?php echo $row["id"]?></h1>
                    </div>
                    <div class="container text-center">
                        <div class="row">
                            <div class="col-8 mx-auto">
                                <div id="carouselExamplePrductDetail" class="carousel slide">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="<?php echo $row['image1']; ?>" class="d-block w-100  img-fluid" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="<?php echo $row['image2']; ?>" class="d-block w-100  img-fluid" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="<?php echo $row['image3']; ?>" class="d-block  w-100" alt="...">
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExamplePrductDetail" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExamplePrductDetail" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-10 mx-auto">
                                <div class="card">
                                    <h3><?php echo $row["name"]  ?></h3>
                                    <p class="price">$<?php echo $row["price"]  ?></p>
                                    <p><?php echo $row["description"]  ?></p>
                                    <div class="d-flex flex-row mb-3 justify-content-center">
                                        <div class="p-2">
                                            <!-- Button trigger modal -->
                                            <button data-id="<?php echo $row['id']; ?>" type="button" class="btn btn-danger delete-button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                Delete Product
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                            <a href="product_delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger confirm-delete">Delete Product</a>
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

                $('.delete-button').on('click', function(e) {
                    var id = $(this).attr('data-id');
                    $('.confirm-delete').attr('data-id', id);

                });
                $(".confirm-delete").on('click', function(e) {
                    var id = $(this).attr('data-id');
                    console.log(id);
                    location.href = "hapusperusahaan.php?id=" + id;
                });
            </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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